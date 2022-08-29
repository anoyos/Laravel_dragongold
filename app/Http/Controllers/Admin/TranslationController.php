<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language;

class TranslationController extends Controller {

    public function index() {
        $languages = Language::all();

        $sp = DIRECTORY_SEPARATOR;
        $source = file_get_contents(base_path("resources{$sp}lang{$sp}source.json"));
        $translations = json_decode($source, true);


        return view('admin.translation.index', compact('translations', 'source', 'languages'));
    }

    public function locale(Request $request, $locale) {
        $languages = Language::all();
        $language = $languages->where('code', $locale)->first();
        $sp = DIRECTORY_SEPARATOR;
        $source = file_get_contents(base_path("resources{$sp}lang{$sp}source.json"));
        $translations = json_decode($source, true);

        $localeSource = file_get_contents(base_path("resources{$sp}lang{$sp}{$locale}.json"));
        if ($localeSource === false) {
            $localeSource = $source;
        }
        $localeTranslation = array_merge($translations, json_decode($localeSource, true));


        return view('admin.translation.locale', compact('language', 'translations', 'source', 'languages', 'localeSource', 'localeTranslation'));
    }

    public function localeUpdate(Request $request) {
        return redirect()->back()->with('success', 'Translation saved successfully');
    }

    public function itemUpdate(Request $request, $locale) {
        $sp = DIRECTORY_SEPARATOR;
        $source = file_get_contents(base_path("resources{$sp}lang{$sp}source.json"));
        $localeSource = file_get_contents(base_path("resources{$sp}lang{$sp}{$locale}.json"));
        $translations = json_decode($source, true);
        if ($localeSource === false) {
            $localeSource = $source;
        }
        $localeTranslation = array_merge($translations, json_decode($localeSource, true));

        if (array_key_exists($request->source, $localeTranslation)) {
            $localeTranslation[$request->source] = $request->value;
        }

        file_put_contents(base_path("resources{$sp}lang{$sp}{$locale}.json"), json_encode($localeTranslation));

        return "ok";
    }

}
