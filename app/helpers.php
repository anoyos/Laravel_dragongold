<?php 

if (! function_exists('lang_id')) {
    function lang_id($lang_name) {
        return App\Language::where('code', $lang_name)->pluck('id')->first();
    }
}