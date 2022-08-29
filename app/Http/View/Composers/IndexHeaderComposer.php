<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Language;
use App\Audio;

class IndexHeaderComposer {

    public function compose(View $view) {
        $languages = Language::all();
        $view->with('languages', $languages);
        
        $audiom = Audio::where('type', 'music')->get();
        $music = [];
        foreach($audiom as $au){
            $music[] = [
                'path' => "audio/music/{$au->name}.mp3",
                'src' =>  url('/') . "/audio/music/{$au->name}.mp3",
                'title' => $au->name,
            ];
        }
        $music = json_encode(['music' => $music]);
        $view->with('music', $music);
    }

}
