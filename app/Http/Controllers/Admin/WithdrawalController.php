<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Balance;
use Session;
use CoinPayments\CoinpaymentsAPI;
use App\Events\WithdrawError;
use App\Events\WithdrawAuto;

class WithdrawalController extends Controller {

    public function index() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/withdrawals", 'name' => "All Withdrawals"]
        ];

        $withdrawals = Transaction::with(['currency', 'user'])->where('type', 'withdraw')->get();

        return view('admin.withdrawal.index', compact('breadcrumbs', 'withdrawals'));
    }

    public function status(Request $request, $status) {
        $title = ucfirst($status) . ' Withdrawals';
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/withdrawals", 'name' => "Withdrawals"],
            ['link' => "/admin/withdrawals/$status", 'name' => $title]
        ];
        $withdrawals = Transaction::with(['currency', 'user'])->where([['type', 'withdraw'], ['status', $status]])->get();
        
        $view = $status === 'pending'? 'admin.withdrawal.pending':'admin.withdrawal.status';

        return view($view, compact('breadcrumbs', 'withdrawals', 'title'));
    }

    public function detail($transaction_id){
        $withdrawal = Transaction::with(['currency', 'user', 'withdraw'])->find($transaction_id);
        $title = 'Withdrawal Detail';

        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/withdrawals", 'name' => "Withdrawals"],
            ['link' => "/admin/withdrawal/detail/$transaction_id", 'name' => $withdrawal->withdraw->reference]
        ];

        return view('admin.withdrawal.detail', compact('breadcrumbs', 'withdrawal', 'title'));
    }

    public function approve(Request $request) {

        $id = $request->post('transaction');

        $transaction = Transaction::find($id);

        if ($this->processWithdraw($transaction)) {
            Session::flash('success', 'Withdrawal approved succesfully');
        } else {
            Session::flash('error', 'Unable to process withdrawal');
        }
        return redirect()->route('admin.withdrawal.pending');
    }

    public function cancel(Request $request) {
        $id = $request->post('transaction');

        Transaction::where('id', $id)->update(['status' => 'canceled']);
        Session::flash('success', 'Withdrawal canceled succesfully');
        return redirect()->route('admin.withdrawal.pending');
    }

    protected function processWithdraw(Transaction $transaction) {

        $currency = $transaction->currency;
        $address = $transaction->withdraw->address;

        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));
        $response = $coinPayments->GetCoinBalances();

        if ($response['error'] !== 'ok') {
            return $this->logError("Unable to get CP Balances: {$response['error']}");
        }
        $balances = $response['result'];
        if (!array_key_exists($currency->symbol, $balances)) {
            return $this->logError("No fund in CP for {$currency->name}");
        }
        $cpBalance = $balances[$currency->symbol];

        if ($transaction->amount >= $cpBalance) {
            return $this->logError("Insufficient fund in CP for {$currency->name}");
        }

        $balance = Balance::where([['currency_id', '=', $currency->id], ['user_id', '=', $transaction->user->id]])->first();

        if ($balance->amount < $transaction->amount) {
            $transaction->status = 'canceled';
            $transaction->save();
            return $this->logError("User has insufficient fund for {$currency->name}");
        }

        $withdrawRequest = $coinPayments->CreateWithdrawal([
            'amount' => $transaction->amount,
            'currency' => $currency->symbol,
            'address' => $address,
            'ipn_url' => route('ipn.withdraw'),
            'auto_confirm' => 1,
            'add_tx_fee' => 1
        ]);

        if ($withdrawRequest['error'] == 'ok') {
            $balance->amount -= $transaction->amount;
            $balance->save();
            $result = $withdrawRequest['result'];
            $transaction->status = $result['status'] == 1 ? 'active' : 'pending';
            $transaction->withdraw->reference = $result['id'];
            $transaction->save();

            event(new WithdrawAuto($transaction, $transaction->user, $currency->name));
        } else {
            $error = json_encode($withdrawRequest);
            return $this->logError("Unable to create withdrawal of {$transaction->amount} {$currency->symbol} for "
                            . "{$transaction->user->name}, Transaction #{$transaction->id} | CP Message: {$error}");
        }
        return true;
    }

    protected function logError($error) {
        event(new WithdrawError('Withdraw Error Notification', $error, config('services.coinpayments.mail')));
        return false;
    }

}
