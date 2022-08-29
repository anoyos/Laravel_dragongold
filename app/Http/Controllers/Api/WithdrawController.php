<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Hash;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Currency;
use App\Deposit;
use App\Withdraw;
use App\Balance;
use App\User;
use CoinPayments\CoinpaymentsAPI;
use App\Events\Deposit as DepositEvent;
use App\Events\WithdrawInit;
use App\Events\WithdrawApproval;
use App\Events\WithdrawError;
use App\Events\WithdrawAuto;

class WithdrawController extends Controller {

    public function lists(Request $request) {
        $curr = $request->get('ps');
        $user = $request->get('user');
        $transactions = Transaction::latest()->where([['user_id', $user],['currency_id', $curr],['type', 'withdraw']])->with('withdraw')->get();
        $data = [];
        foreach ($transactions as $tx) {
            $item = [
                'data' => [
                    'id' => $tx->id,
                    'amount' => $tx->amount,
                    'sub_type' => null, // null or coupon, no coupon in use
                    'batch_num' => $tx->withdraw->hash,
                    'status' => $tx->status,
                    'created_at' => $tx->created_at,
                ],
            ];
            $data[] = $item;
        }
        return ['success' => true, 'data' => $data];
    }

    public function create(Request $request) {
        if ($request->post('type') === 'withdraw') {
            return $this->createWithdraw($request);
        } elseif ($request->post('type') === 'reinvest') {
            return $this->createReinvest($request);
        }

        return ['success' => false, 'error' => ['message' => 'Unable to make withdrawal']];
    }

    protected function authenticate(User $user, $pin) {
        return Hash::check($pin, $user->pin);
    }

    public function createWithdraw(Request $request) {
        $amount = $request->post('amount');
        $user = User::find($request->post('user'));
        $pin = $request->post('pin');
        $currency = Currency::find($request->post('ps'));

        if (!Hash::check($pin, $user->pin)) {
            return ['success' => false, 'error' => ['message' => trans("Invalid PIN")]];
        }

        $balance = Balance::where([['currency_id', $request->post('ps')],['user_id', $user->id]])->first();

        if ($balance->amount < $amount) {
            return ['success' => false, 'error' => ['message' => trans("Insufficient balance")]];
        }
        
        if ($amount < $currency->min) {
            return ['success' => false, 'error' => ['message' => trans("Amount below minimum required for withdrawal")]];
        }
        
        if ($amount > $currency->max) {
            return ['success' => false, 'error' => ['message' => trans("Amount above maximum required for withdrawal")]];
        }
        
        $transaction = Transaction::create([
                    'user_id' => $user->id, 'currency_id' => $currency->id, 'amount' => $amount, 'type' => 'withdraw',
                    'description' => "Withdraw $amount  {$currency->symbol}", 'status' => 'pending',
        ]);

        event(new WithdrawInit($transaction, $user, $currency->name));

        Withdraw::create(['user_id' => $user->id, 'transaction_id' => $transaction->id, 'address' => $balance->wallet]);

        $automax = config('global.auto_max');
        $amountusd = $currency->usdrate * $amount;

        if ($amountusd > $automax) {
            event(new WithdrawApproval($transaction, $user, $currency->name));
        } else {
            $this->processWithdraw($currency, $transaction, $balance);
        }

        return ['success' => true, 'data' => []];
    }

    protected function processWithdraw(Currency $currency, Transaction $transaction, $balance) {
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

        $withdrawRequest = $coinPayments->CreateWithdrawal([
            'amount' => $transaction->amount,
            'currency' => $currency->symbol,
            'address' => $balance->wallet,
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
            $this->logError("Unable to create withdrawal of {$transaction->amount} {$currency->symbol} for "
                    . "{$transaction->user->name}, Transaction #{$transaction->id} | CP Message: {$error}");
        }
        return true;
    }

    protected function createReinvest(Request $request) {
        $api = [];
        $curr = $request->post('ps');
        $type = $request->post('type');
        $amount = $request->post('amount');
        $user = $request->get('user');

        $balance = Balance::where('user_id', $user)->where('currency_id', $curr)->with(['user', 'currency'])->first();

        if ($balance->amount >= $amount && $amount >= $balance->currency->min) {
            // create a transaction for this purpose
            $transaction = Transaction::create([
                        'user_id' => $user,
                        'currency_id' => $curr,
                        'amount' => $amount,
                        'type' => 'deposit',
                        'description' => "Reinvest $amount  {$balance->currency->symbol}",
                        'status' => 'active',
            ]);
            // deduct amount from user balance
            $balance->amount -= $amount;
            $balance->save();

            $deposit = Deposit::create([
                        'user_id' => $user,
                        'transaction_id' => $transaction->id,
                        'type' => $type,
                        'reference' => 'REINVEST' . uniqid(),
                        'address' => '',
                        'confirmations' => 0,
                        'confirmations_needed' => 0,
                        'hash' => '',
                        'status' => 'active',
            ]);

            $payment = [
                'is_fiat' => $balance->currency->is_fiat ? true : false,
                'created_at' => $deposit->created_at,
                'expired_at' => null,
                'status' => 'active',
                'currency' => $balance->currency->symbol,
                'confirmations' => 0,
                'ps' => $balance->currency->sname(),
            ];

            $form = [
                'crypto_amount' => $amount,
                'address' => null,
                'additional_field' => null,
            ];
            $api = [
                'success' => true,
                'data' => ['payment' => $payment, 'form' => $form],
                'meta' => [
                    'type' => $type
                ],
            ];
            event(new DepositEvent($transaction, $transaction->user, $balance->currency->name, "$amount {$balance->currency->symbol}", 'reinvest'));
        } else {
            $api = ['success' => false, 'error' => ['message' => 'Insufficient Balance']];
        }

        return $api;
    }

    protected function logError($error) {
        event(new WithdrawError('Withdraw Error Notification', $error, config('services.coinpayments.mail')));
        return false;
    }

}
