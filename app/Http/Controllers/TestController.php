<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CoinPayments\CoinpaymentsAPI;
use App\Currency;
use DB;
use Auth;
use App\Transaction;
use App\Notifications\UserRegister;
use Cookie;
use App\Referral;
use App\Balance;
use Carbon\Carbon;
use App\Deposit;
use App\Jobs\CheckDeposit;


class TestController extends Controller {

    public function scrape() {

     $users = \App\User::all();
     $tt = [];
     foreach($users as $user){
         $tt[] = \App\Helpers\TransactionHelper::totalInvested($user);
         
     }
     return $tt;
    }

    public function loaddata($page) {
        $client = new Client;
        $response = $client->get('https://gains.systems/affiliates/representatives?page=' . $page . '', [
            'headers' => [
                'Referer' => 'https://gains.systems/affiliates',
                'X-Requested-With' => 'XMLHttpRequest',
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.142 Safari/537.36',
            ],
            'form_params' => [
//                'page' => $page,
                'country' => '',
            ],
        ]);
        $all = json_decode($response->getBody(), true);
        $add = 0;
        foreach ($all['data'] as $u) {

            $user = $user = DB::table('goldusers')->where('email', $u['contact']['email'])->first();
            if (!$user) {
                $add++;
                DB::table('goldusers')->insert([
                    'username' => urlencode($u['login']),
                    'email' => $u['contact']['email'],
                    'telegram' => $u['contact']['telegram'],
                    'whatsapp' => $u['contact']['whatsapp'],
                    'viber' => $u['contact']['viber'],
                    'country' => $u['country']['name'],
                ]);
            }
        }
        echo count($all['data']) . ' - ' . $add;
    }
    
    public function testcredit() {
        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));
        
        $response = $coinPayments->GetTxInfoSingle('CPDH6ONUEQTBNQNDYC1DJDSMV9');
        return  $response;
    }

    public function testmail() {
                DB::table('settings')->insert(['key' => 'video', 'value' => "hello"]);

//        \Mail::to('johnnycares4toda@gmail.com')->send(new \App\Mail\TestMail());
        return Cookie::get('referrer');
    }
    
    public function testNotification() {
        \App\Jobs\CheckIncompleteDeposit::dispatch();
        
        return 'done';
    }
    public function testNote() {
        
        return (new UserRegister())->toMail(Auth::user());
    }

    public function loadcountry() {
        //$audio = "{&quot;music&quot;:[{&quot;path&quot;:&quot;audio\/music\/David-Pietras-–-Leave-You-Here.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/David-Pietras-–-Leave-You-Here.mp3&quot;,&quot;title&quot;:&quot;David-Pietras-–-Leave-You-Here&quot;},{&quot;path&quot;:&quot;audio\/music\/Yotto-–-Kantsu.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Yotto-–-Kantsu.mp3&quot;,&quot;title&quot;:&quot;Yotto-–-Kantsu&quot;},{&quot;path&quot;:&quot;audio\/music\/Matt-Fax-–-Hide-_Barzek-remix_.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Matt-Fax-–-Hide-_Barzek-remix_.mp3&quot;,&quot;title&quot;:&quot;Matt-Fax-–-Hide-_Barzek-remix_&quot;},{&quot;path&quot;:&quot;audio\/music\/Ben-Bhmer-–-Sonnenallee-_ft.-Hifi-Brother_.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Ben-Bhmer-–-Sonnenallee-_ft.-Hifi-Brother_.mp3&quot;,&quot;title&quot;:&quot;Ben-Bhmer-–-Sonnenallee-_ft.-Hifi-Brother_&quot;},{&quot;path&quot;:&quot;audio\/music\/Ben-Bhmer-–-Dive-_ft.-Margret_.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Ben-Bhmer-–-Dive-_ft.-Margret_.mp3&quot;,&quot;title&quot;:&quot;Ben-Bhmer-–-Dive-_ft.-Margret_&quot;},{&quot;path&quot;:&quot;audio\/music\/Eelke-Kleijn-–-Home.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Eelke-Kleijn-–-Home.mp3&quot;,&quot;title&quot;:&quot;Eelke-Kleijn-–-Home&quot;},{&quot;path&quot;:&quot;audio\/music\/Anderholm-–-Nocturne.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Anderholm-–-Nocturne.mp3&quot;,&quot;title&quot;:&quot;Anderholm-–-Nocturne&quot;},{&quot;path&quot;:&quot;audio\/music\/Jeremy-Olander-ft.-Kamaliza-–-Zanzibar-_Sthlm-_.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Jeremy-Olander-ft.-Kamaliza-–-Zanzibar-_Sthlm-_.mp3&quot;,&quot;title&quot;:&quot;Jeremy-Olander-ft.-Kamaliza-–-Zanzibar-_Sthlm-_&quot;},{&quot;path&quot;:&quot;audio\/music\/Spencer-Brown-–-Airplane-Tekno.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Spencer-Brown-–-Airplane-Tekno.mp3&quot;,&quot;title&quot;:&quot;Spencer-Brown-–-Airplane-Tekno&quot;},{&quot;path&quot;:&quot;audio\/music\/Luttrell-–-Intergalactic-Plastic.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Luttrell-–-Intergalactic-Plastic.mp3&quot;,&quot;title&quot;:&quot;Luttrell-–-Intergalactic-Plastic&quot;},{&quot;path&quot;:&quot;audio\/music\/Sebastian-Weikum-_-Amaletto-–-Volar-_Weepee-remix_.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Sebastian-Weikum-_-Amaletto-–-Volar-_Weepee-remix_.mp3&quot;,&quot;title&quot;:&quot;Sebastian-Weikum-_-Amaletto-–-Volar-_Weepee-remix_&quot;},{&quot;path&quot;:&quot;audio\/music\/Huminal-–-Petrichor.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/music\/Huminal-–-Petrichor.mp3&quot;,&quot;title&quot;:&quot;Huminal-–-Petrichor&quot;}],&quot;system&quot;:[{&quot;path&quot;:&quot;audio\/system\/welcome.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/system\/welcome.mp3&quot;,&quot;title&quot;:&quot;&quot;},{&quot;path&quot;:&quot;audio\/system\/mia-intro.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/system\/mia-intro.mp3&quot;,&quot;title&quot;:&quot;&quot;},{&quot;path&quot;:&quot;audio\/system\/team\/growth_0.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/system\/team\/growth_0.mp3&quot;,&quot;title&quot;:&quot;&quot;},{&quot;path&quot;:&quot;audio\/system\/unread-news.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/system\/unread-news.mp3&quot;,&quot;title&quot;:&quot;&quot;},{&quot;path&quot;:&quot;audio\/system\/end\/2.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/system\/end\/2.mp3&quot;,&quot;title&quot;:&quot;&quot;},{&quot;path&quot;:&quot;audio\/system\/have-good-day.mp3&quot;,&quot;src&quot;:&quot;https:\/\/gains.systems\/audio\/system\/have-good-day.mp3&quot;,&quot;title&quot;:&quot;&quot;}]}";
        $audio = '{"music":[{"path":"audio/music/David-Pietras-–-Leave-You-Here.mp3","src":"https://gains.systems/audio/music/David-Pietras-–-Leave-You-Here.mp3","title":"David-Pietras-–-Leave-You-Here"},{"path":"audio/music/Yotto-–-Kantsu.mp3","src":"https://gains.systems/audio/music/Yotto-–-Kantsu.mp3","title":"Yotto-–-Kantsu"},{"path":"audio/music/Matt-Fax-–-Hide-_Barzek-remix_.mp3","src":"https://gains.systems/audio/music/Matt-Fax-–-Hide-_Barzek-remix_.mp3","title":"Matt-Fax-–-Hide-_Barzek-remix_"},{"path":"audio/music/Ben-Bhmer-–-Sonnenallee-_ft.-Hifi-Brother_.mp3","src":"https://gains.systems/audio/music/Ben-Bhmer-–-Sonnenallee-_ft.-Hifi-Brother_.mp3","title":"Ben-Bhmer-–-Sonnenallee-_ft.-Hifi-Brother_"},{"path":"audio/music/Ben-Bhmer-–-Dive-_ft.-Margret_.mp3","src":"https://gains.systems/audio/music/Ben-Bhmer-–-Dive-_ft.-Margret_.mp3","title":"Ben-Bhmer-–-Dive-_ft.-Margret_"},{"path":"audio/music/Eelke-Kleijn-–-Home.mp3","src":"https://gains.systems/audio/music/Eelke-Kleijn-–-Home.mp3","title":"Eelke-Kleijn-–-Home"},{"path":"audio/music/Anderholm-–-Nocturne.mp3","src":"https://gains.systems/audio/music/Anderholm-–-Nocturne.mp3","title":"Anderholm-–-Nocturne"},{"path":"audio/music/Jeremy-Olander-ft.-Kamaliza-–-Zanzibar-_Sthlm-_.mp3","src":"https://gains.systems/audio/music/Jeremy-Olander-ft.-Kamaliza-–-Zanzibar-_Sthlm-_.mp3","title":"Jeremy-Olander-ft.-Kamaliza-–-Zanzibar-_Sthlm-_"},{"path":"audio/music/Spencer-Brown-–-Airplane-Tekno.mp3","src":"https://gains.systems/audio/music/Spencer-Brown-–-Airplane-Tekno.mp3","title":"Spencer-Brown-–-Airplane-Tekno"},{"path":"audio/music/Luttrell-–-Intergalactic-Plastic.mp3","src":"https://gains.systems/audio/music/Luttrell-–-Intergalactic-Plastic.mp3","title":"Luttrell-–-Intergalactic-Plastic"},{"path":"audio/music/Sebastian-Weikum-_-Amaletto-–-Volar-_Weepee-remix_.mp3","src":"https://gains.systems/audio/music/Sebastian-Weikum-_-Amaletto-–-Volar-_Weepee-remix_.mp3","title":"Sebastian-Weikum-_-Amaletto-–-Volar-_Weepee-remix_"},{"path":"audio/music/Huminal-–-Petrichor.mp3","src":"https://gains.systems/audio/music/Huminal-–-Petrichor.mp3","title":"Huminal-–-Petrichor"}],"system":[{"path":"audio/system/welcome.mp3","src":"https://gains.systems/audio/system/welcome.mp3","title":""},{"path":"audio/system/mia-intro.mp3","src":"https://gains.systems/audio/system/mia-intro.mp3","title":""},{"path":"audio/system/team/growth_0.mp3","src":"https://gains.systems/audio/system/team/growth_0.mp3","title":""},{"path":"audio/system/unread-news.mp3","src":"https://gains.systems/audio/system/unread-news.mp3","title":""},{"path":"audio/system/end/2.mp3","src":"https://gains.systems/audio/system/end/2.mp3","title":""},{"path":"audio/system/have-good-day.mp3","src":"https://gains.systems/audio/system/have-good-day.mp3","title":""}]}';
        $data = json_decode(urldecode(stripslashes($audio)), true);

        return $data;
    }
    
    
    public function testcoin() {
        $prk = config('services.coinpayments.privatekey');
        $puk = config('services.coinpayments.publickey');
        $coinPayments = new CoinpaymentsAPI($prk, $puk);
        
        $response = $coinPayments->CreateSimpleTransaction('1.5', 'BTC', 'james@james.com',route('ipn.coinpayments'));
        $response['ipn'] = route('ipn.coinpayments');
        
        return $response;
    }
    
    public function testcoins() {
        $prk = config('services.coinpayments.privatekey');
        $puk = config('services.coinpayments.publickey');
        $coinPayments = new CoinpaymentsAPI($prk, $puk);
        
        $prices = $coinPayments->GetUSDRates();
        
        $response = [];
        $currency = Currency::all();
        
        foreach ($currency as $curr){
            $data = [
                'id' => $curr->id,
                'name' => $curr->sname(),
                'deposit' => true,
                'currency' => $curr->is_fiat?'usd':$curr->symbol,
                'is_fiat' => $curr->is_fiat?true:false,
                'additional_field' => null,
            ];
            
            $limits = [
                'invest' => ['min' => $curr->min, 'max' => $curr->max],
                'reinvest' => ['min' => $curr->min, 'max' => $curr->max],
            ];
            $meta = [
                'exchange' => $prices[$curr->symbol],
                'balance' => "0.0"
            ];
            
            $color = $curr->color ? ' icon-' . $curr->color : '';
            $item = [
                'label' => '<span class="icon' . $color . '"><img src="'. asset('user_assets/images/'. $curr->sname(). '.png') 
                    . '" alt="' . $curr->code() . '"></span><p>' . $curr->name . '</p>',
                'value' => [
                    'data' => $data,
                    'limits' => $limits,
                    'meta' => $meta,
                ],
            ];
            
            $response[] = $item;
        }
        
        
        return $response;
    }

    
    public function testtrans(Request $request) {
        $coinPayments = new CoinpaymentsAPI(config('services.coinpayments.privatekey'), config('services.coinpayments.publickey'));
        $response = $coinPayments->CreateMerchantTransfer(0.0000008 ,'BTC', config('services.coinpayments.refkey'), 1);
        return $response;
    }
    public function load_balances(){
        $user = auth()->user();
        $currencies = Currency::all();
        foreach($currencies as $curr){
            \App\Balance::create(['user_id' => $user->id, 'currency_id' => $curr->id, 'amount' => 0.0]);
        }
        return 'done';
    }
    
    public function testRefer() {
        
        $amount = 0.7;
        $currency = Currency::find(2);
        $user = Auth::user();
        $uplinks = [];
        $current  = $user->referrer()->first();
        $i = 1;
        while(!empty($current) && $i <= 5){
            $bonus = config('global.affiliate_l' . $i);
            $win = $amount * $bonus / 100;
            
            $transaction = Transaction::create([
                'user_id' => $current->id,
                'currency_id' => $currency->id,
                'amount' => $win,
                'type' => 'referral',
                'description' => "Referral Bonus of $win {$currency->symbol} on {$user->name} $amount {$currency->symbol} Deposit [$bonus %]",
                'status' => 1,
            ]);
                
            
            Referral::create([
                'user_id' => $user->id,
                'transaction_id' => $transaction->id,
                'uplink' => $current->id,
                'level' => $i,
                'status' => 'active',
            ]);
            
            
            $uplinks[] = $current;
            $current = $current->referrer()->first();
            $i++; // to limit uplink to 5
        }
        
        
        
        return $uplinks;
    }

}
