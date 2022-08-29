<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use DB;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Schema::defaultStringLength(191);
        config([
            'global' => DB::table('settings')->get()
                    ->keyBy('key')
                    ->transform(function ($setting) {
                        return $setting->value;
                    })->toArray()
        ]);
        
    }

}
