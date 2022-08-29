<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Deposit;
use App\Transaction;
use CoinPayments\CoinpaymentsAPI;
use App\Notifications\DepositIncomplete;
use Session;
class DepositController extends Controller {

    public function index() {
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/deposits", 'name' => "All Deposits"]
        ];

        $deposits = Transaction::with(['currency', 'user', 'deposit'])->where('type', 'deposit')->get();

        return view('admin.deposit.index', compact('breadcrumbs', 'deposits'));
    }
    
    public function status(Request $request, $status) {
        $title = ucfirst($status) . ' Deposits';
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/deposits", 'name' => "Deposits"],
            ['link' => "/admin/deposits/$status", 'name' => $title]
        ];
        
        $deposits = Transaction::with(['currency', 'user', 'deposit'])->where([['type', 'deposit'], ['status', $status]])->get();

        return view('admin.deposit.status', compact('breadcrumbs', 'deposits', 'title'));
    }
    
    public function resolvePayment(Request $request) {
        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));
        
        $transaction = Transaction::find($request->post('transaction'));
        
        $topay =  $transaction->amount - $request->post('paid');
        $curr = $transaction->currency->symbol;
        
        $withdrawRequest = $coinPayments->CreateWithdrawal([
            'amount' => $topay, 'currency' => $curr,
            'address' => $transaction->deposit->address,
            'ipn_url' => route('ipn.withdraw'), 'auto_confirm' => 1, 'add_tx_fee' => 1
        ]);
        
        if ($withdrawRequest['error'] == 'ok') {
            $transaction->user->notify(new DepositIncomplete($transaction, $request->post('paid'), $curr));
            $transaction->amount = $transaction->amount - $topay;
            $transaction->save();
            $transaction->deposit->assisted = $topay;
            $transaction->deposit->save();
            Session::flash('success', "$topay $curr successful sent to complete transaction process");
        }else{
            $error = json_encode($withdrawRequest);
            Session::flash('error', "Unable to complete transaction of {$transaction->amount} {$curr} for "
                    . "{$transaction->user->name}, Transaction #{$transaction->deposit->reference} | CP Message: {$error}");
        }
        
    }

    public function detail($transaction_id){
        $deposit = Transaction::with(['currency', 'user', 'deposit'])->find($transaction_id);
        $title = 'Deposit Detail';

        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/deposits", 'name' => "Deposits"],
            ['link' => "/admin/deposits/detail/$transaction_id", 'name' => $deposit->deposit->reference]
        ];

        return view('admin.deposit.detail', compact('breadcrumbs', 'deposit', 'title'));
    }

    public function assisted(Request $request) {
        $title = 'Assisted Deposits';
        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/deposits", 'name' => "Deposits"],
            ['link' => "/admin/deposits/assisted", 'name' => $title]
        ];
        
        $deposits = Deposit::with('transaction')->whereNotNull('assisted')->get();

        return view('admin.deposit.assisted', compact('breadcrumbs', 'deposits', 'title'));
    }
}
