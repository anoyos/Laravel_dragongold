<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\Currency;
use App\Deposit;
use App\Balance;
use CoinPayments\CoinpaymentsAPI;
use App\Events\Deposit as DepositEvent;

class DepositController extends Controller {

    public function lists(Request $request) {
        $curr = $request->get('ps');
        $user = $request->get('user');
        $transactions = Transaction::latest()->where([['user_id', $user],['currency_id', $curr],['type', 'deposit']])->with('deposit')->get();
        $data = [];
        
        
        foreach ($transactions as $tx) {
            $item = [
                'data' => [
                    'id' => $tx->id,
                    'amount' => $tx->amount,
                    'sub_type' => $tx->deposit->type,
                    'batch_num' => $tx->deposit->hash,
                    'status' => $tx->deposit->status,
                    'confirmations' => $tx->deposit->confirmations,
                    'created_at' => $tx->created_at,
                ],
            ];
            $data[] = $item;
        }
        return ['success' => true, 'data' => $data,];
    }

    public function create(Request $request) {
        if ($request->post('type') === 'invest') {
            return $this->createInvest($request);
        } elseif ($request->post('type') === 'reinvest') {
            return $this->createReinvest($request);
        }

        return [ 'success' => false, 'error' => ['message' => 'Unable to make deposit']];
    }
    
    
    public function cancel(Request $request, $id) {
        $transaction = Transaction::find($id);
        $deposit = $transaction->deposit;
        $transaction->status = $deposit->status = 'canceled';
        $deposit->save();
        $transaction->save();
        return ['success' => true];
    }

    protected function createInvest(Request $request) {
        $api = [];
        $type = $request->post('type');
        $amount = $request->post('amount');
        $user = $request->get('user');

        $currency = Currency::find($request->post('ps'));
        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));

        $transaction = Transaction::create([
            'user_id' => $user,
            'currency_id' => $currency->id,
            'amount' => $amount,
            'type' => 'deposit',
            'description' => "Deposit $amount  {$currency->symbol}",
            'status' => 'pending',
        ]);

        $response = $coinPayments->CreateSimpleTransaction($amount, $currency->symbol, config('services.coinpayments.mail'), route('ipn.coinpayments'));

        if ($response['error'] == 'ok') {

            $deposit = Deposit::create([
                'user_id' => $user,
                'transaction_id' => $transaction->id,
                'type' => $type,
                'reference' => $response['result']['txn_id'],
                'address' => $response['result']['address'],
                'confirmations' => 0,
                'confirmations_needed' => $response['result']['confirms_needed'],
                'status' => 'pending',
            ]);
            
            $deposit->expired_at = $deposit->created_at->add($response['result']['timeout'], 'seconds');
            $deposit->save();
            

            $payment = [
                'id' => $transaction->id,
                'is_fiat' => $currency->is_fiat?true:false,
                'created_at' => $deposit->created_at->format('Y-m-d H:i:s'),
                'expired_at' => $deposit->expired_at->format('Y-m-d H:i:s'),
                'status' => 'pending',
                'currency' => $currency->symbol,
                'confirmations' => 0,
                'ps' => $currency->sname(),
            ];

            $form = [
                'crypto_amount' => $amount,
                'address' => $response['result']['address'],
                'additional_field' => null,
            ];


            $api = [
                'success' => true,
                'data' => ['payment' => $payment, 'form' => $form],
                'meta' => [
                    'type' => $type
                ],
            ];
            
            event(new DepositEvent($transaction, $transaction->user, $currency->name, "$amount {$currency->symbol}", 'invest'));
        } else {
            $api = [
                'success' => false,
                'error' => ['message' => $response['error']],
            ];
        }

        return $api;
    }

    public function createReinvest(Request $request) {
        $api = [];
        $curr = $request->post('ps');
        $type = $request->post('type');
        $amount = $request->post('amount');
        $user = $request->get('user');
        
        $balance = Balance::where('user_id', $user)->where('currency_id', $curr)->with(['user', 'currency'])->first();
        
        if($balance->amount >= $amount && $amount >= $balance->currency->min){
            // create a transaction for this purpose
            $transaction  = Transaction::create([
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
                'is_fiat' => $balance->currency->is_fiat?true:false,
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
        }else{
            $api = [ 'success' => false, 'error' => ['message' => 'Insufficient Balance']];
        }
        
        return $api;
        
        
    }
}
