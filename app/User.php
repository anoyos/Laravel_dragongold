<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Translation\HasLocalePreference;

class User extends Authenticatable implements MustVerifyEmail, HasLocalePreference {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'pin', 'username', 'referrer', 'mobile', 'status', 'language_id', 'country_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'pin'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function balances() {
        return $this->hasMany('App\Balance');
    }
    
    public function referrer() {
        return $this->belongsTo('App\User', 'referrer');
    }

    public function getNameAttribute() {
        return "{$this->fname} {$this->lname}";
    }

    public function getWalletAddress($currency) {
        return $this->balances->where('currency_id', $currency)->pluck('wallet')->first();
    }

    public function socials() {
        return $this->hasMany('App\Social');
    }
    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    /**
     * Get the user's preferred locale.
     *
     * @return string
     */
    public function preferredLocale() {
        return Language::find($this->languge_id);
    }

    public function getRouteKeyName(){
        return 'username';
    }

}
