<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use CoinPayments\CoinpaymentsAPI;
use App\Balance;
use App\Deposit;
use App\Transaction;
class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        
        $today = 0;
        $balance = 0;
        $totalDeposits = 0;
        $totalCredits = 0;
        
        $balances = Balance::where('user_id', Auth::id())->where('amount', '!=', 0)->with('currency')->get();
        $transactions = Transaction::latest()->where('status', 'active')
                ->where('user_id', Auth::id())
                ->with('currency')->limit(10)->get();
        
        foreach($balances as $b){
            $balance +=  $b->amount * $b->currency->usdrate;
        }
        foreach($transactions as $trans){
            if($trans->type == 'deposit'){
                $totalDeposits += $trans->amount  * $trans->currency->usdrate;
            }elseif($trans->type == 'credit'){
                $today += $trans->created_at->isToday() ? $trans->amount  * $trans->currency->usdrate : 0;
                $totalCredits += $trans->amount  * $trans->currency->usdrate;
            }
        }
        
        return view('users.dashboard', compact('transactions','balance','totalDeposits', 'totalCredits', 'today'));
    }

    public function settings() {
        $user = Auth::user();
        return view('users.settings', compact('user'));
    }

    public function statistics() {
        $user = Auth::user();
        return view('users.statistics', compact('user'));
    }
    
    public function support(){
        return view('users.support');
    }
    
    public function news(){
        return view('users.news');
    }

    public function webinars(){
        return view('users.webinars');
    }

    public function updateProfile(Request $request){
        $user = Auth::user();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->username = $request->username;
        $user->email= $request->email;

        $user->save();

        Session::flash('success', 'Profile updated.');

        //redirect with flash data to post.show
        return redirect()->route('settings');
    }

     protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users']
        ]);
    }

    public function updateWallet(Request $request){
        $wallets = $request->wallets;

        /* Get the payment system for this user */
        $ps = auth()->user()->balances;

        foreach ($ps as $p) {
            $p->wallet = $request->wallets[$p->currency_id];
            $p->save();
        }

        Session::flash('success', 'Wallet Address successfully updated.');

        //redirect with flash data to post.show
        return redirect()->route('settings');
    }

    public function updatePassword(Request $request) {
        $old_password = $request->input('old_password');
        $new_password = $request->input('password');
        $confirm_pass = $request->input('conf_password');

        if ($new_password != $confirm_pass) {
            Session::flash('error', 'Password Mismatched.');
        }

        $user_password = auth()->user()->password;

        if (Hash::check($old_password, $user_password)) {

            auth()->user()->update([
                'password' => bcrypt($request->input('password')),
            ]);

            Session::flash('success', 'Password Changed successfully');
        } else {
            Session::flash('error', 'Your old password is not correct');
        }

        return redirect()->back();
    }

    public function updateSocial(Request $request){
        $telegram = $request->telegram;
        $whatsapp = $request->whatsapp;
        $viber = $request->viber;
        $social_links = [0 => $telegram, 1 => $whatsapp, 2 => $viber];

        // dd($social_links);

        $socials = auth()->user()->socials;

        $i = 0;
        foreach ($socials as $social) {
            $social->link = $social_links[$i];
            $social->save();

            $i++;
        }

        Session::flash('success', 'Social Link successfully updated.');

        //redirect with flash data to post.show
        return redirect()->route('settings');
    }
}
