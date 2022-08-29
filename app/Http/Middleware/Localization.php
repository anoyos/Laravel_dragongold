<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Cookie;
use App\Language;
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }elseif(!empty(Cookie::get('locale'))){
            session()->put('locale', Cookie::get('locale'));
            $localeid = Language::where('code', Cookie::get('locale'))->first()->id;
            session()->put('localeid', $localeid);
            App::setLocale(Cookie::get('locale'));
        }
        
        return $next($request);
    }
}
