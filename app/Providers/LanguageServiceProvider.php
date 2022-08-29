<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Cookie;
class LanguageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Cookie::queue('locale','en',24 * 60);
//        $locale = Cookie::get('locale');
        
//        var_dump($locale);
//        die();
//        App::setLocale('es');
    }
}
