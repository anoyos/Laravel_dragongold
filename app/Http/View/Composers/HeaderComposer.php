<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Language;
use App\Audio;
use App\Setting;
use Carbon\Carbon;
use App\User;

class HeaderComposer {

    public function compose(View $view) {
        $languages = Language::all();
        $view->with('languages', $languages);
        $music = [];
        if (empty(session('firsttime'))) {
            $audios = Audio::where('type', 'system')->get();
            foreach ($audios as $au) {
                $music['system'][] = [
                    'path' => "audio/system/{$au->name}.mp3",
                    'src' => url('/') . "/audio/system/{$au->name}.mp3",
                    'title' => '',
                ];
            }
            session()->put('firsttime', true);
        }

        $audiom = Audio::where('type', 'music')->get();
        foreach ($audiom as $au) {
            $music['music'][] = [
                'path' => "audio/music/{$au->name}.mp3",
                'src' => url('/') . "/audio/music/{$au->name}.mp3",
                'title' => $au->name,
            ];
        }

        $view->with('music', json_encode($music));
    }

}
