<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\CoinPaymentError;
use App\Deposit;
use App\Events\DepositComplete;

class PaymentController extends Controller {

    public function ipnCoinPayments(Request $request) {
        if (!$this->validateRequest($request)) {
            return ['success' => false];
        }

        $trx = $request->post('txn_id');
        $amt = $request->post('amount1');
        $curr = $request->post('currency1');
        $status = $request->post('status');

        $confirms = $request->post('received_confirms');

        $deposit = Deposit::where('reference', $trx)->first();

        if ($deposit) {
            $transaction = $deposit->transaction;
            $currency = $transaction->currency;

            if ($currency->symbol !== $curr) {
                $this->logError("Error: {$curr} was returned by IPN but {$currency->symbol} was used for the transaction [Transaction ID: {$transaction->id} | CP: {$trx} ]");
                return ['success' => false];
            }

            if ($transaction->amount > $amt) {
                $this->logError("Error: {$amt} {$curr} was returned by IPN but {$transaction->amount} {$currency->symbol} was sregistered for the transaction [Transaction ID: {$transaction->id} | CP: {$trx} ]");
                return ['success' => false];
            }

            if ($status > 0 && $deposit->status !== 'active') {
                // payment is complete or queued for nightly payout, success
                $deposit->confirmations = $confirms;
                $deposit->status = $transaction->status = 'confirming';

                if ($status >= 100 && $deposit->confirmations_needed == $confirms) {
                    $deposit->status = $transaction->status = 'active';
                    event(new DepositComplete($deposit));
                }
                
                $deposit->save();
                $transaction->save();
            } else if ($status < 0) {
                $this->logError("Payment Error  - Status: $status on Transaction: #{$deposit->reference} ");
                //payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent
            } else {
                //payment is pending, you can optionally add a note to the order page
            }
            
        } else {
            $this->logError('Unable to find Transaction on the system');
        }
        return 'IPN OK';
    }
    
    public function withdraw(Request $request) {
        
    }

    protected function validateRequest(Request $request) {

        if ($request->post('ipn_mode') != 'hmac') {
            $this->logError('IPN Mode is not HMAC');
            return false;
        }
        if (empty($request->server('HTTP_HMAC'))) {
            $this->logError('No HMAC signature sent.');
            return false;
        }
        $req = file_get_contents('php://input');
        if ($req === FALSE || empty($req)) {
            $this->logError('Error reading POST data');
            return false;
        }
        if ($request->post('merchant') !== trim(config('services.coinpayments.merchant'))) {
            $this->logError('No or incorrect Merchant ID passed');
            return false;
        }
        $hmac = hash_hmac("sha512", $req, trim(config('services.coinpayments.ipnkey')));
        if (!hash_equals($hmac, $request->server('HTTP_HMAC'))) {
            $this->logError('HMAC signature does not match' . "N: {$hmac} OLD: {$request->server('HTTP_HMAC')}");
            return false;
        }
        return true;
    }

    protected function logError($error) {
        // send mail or log into the database
        $mail = config('services.coinpayments.mail');
        event(new CoinPaymentError('CoinPayment IPN Error Notification', $error, $mail));
        return true;
    }

}
