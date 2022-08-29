<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Currency;
use App\Country;
use App\Balance;
use App\Social;
use Avatar;
use App\Log;
use Cookie;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/office/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'referrer' => ['nullable', 'string', 'max:255', 'exists:users,username'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'pin' => ['required', 'array', 'size:4'],
            'country' => ['required', 'integer'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $referrer = empty($data['referrer'])? Cookie::get('referrer'):$data['referrer'];
        
        if(!empty($referrer)){
            $referrer = User::where('username', $referrer)->first();
                $data['referrer'] = ($referrer) ? $referrer['id']: config('auth.user');
        }else{
            $data['referrer'] = config('auth.user');
        }
        
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'username' => $data['username'],
            'referrer' => $data['referrer'],
            'password' => Hash::make($data['password']),
            'pin' => Hash::make(implode('',$data['pin'])),
            'status' => 1,
            'country_id' => $data['country'],
            'language_id' => session('localeid', 1),
        ]);
    }
    
    public function showRegistrationForm() {
        $countries = Country::all();
        return view('auth.register', compact('countries'));
    }
    
    public function registered(Request $request, $user) {
        $currencies = Currency::all();
        foreach($currencies as $curr){
            Balance::create(['user_id' => $user->id, 'currency_id' => $curr->id, 'amount' => 0.0]);
        }
        
        Social::create(['user_id' => $user->id, 'name' => 'Telegram']);
        Social::create(['user_id' => $user->id, 'name' => 'Whatsapp']);
        Social::create(['user_id' => $user->id, 'name' => 'Viber']);

        Log::create(['user_id' => $user->id, 'address' => $request->ip()]);
        Avatar::create($user->name)->save('user_assets/images/avatar/' . $user->username .'.png', 100);
    }
}
