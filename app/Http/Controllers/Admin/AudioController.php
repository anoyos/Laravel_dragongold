<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Audio;
use Session;
use Illuminate\Support\Facades\File;

class AudioController extends Controller {

    public function music() {

        $audios = Audio::where('type', 'music')->get();

        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/audio/music", 'name' => "Music Audio"]
        ];
        return view('admin.audio.music', compact('breadcrumbs', 'audios'));
    }

    public function system() {
        $audios = Audio::where('type', 'system')->get();

        $breadcrumbs = [
            ['link' => "/admin/dashboard", 'name' => "Dashboard"],
            ['link' => "/admin/audio/system", 'name' => "System Audio"]
        ];
        return view('admin.audio.system', compact('breadcrumbs', 'audios'));
    }

    public function save(Request $request) {
        $request->validate([
            'type' => 'required|string',
            'file' => 'required|file|mimes:audio/mpeg,mpga,mp3,wav,aac',
        ]);
        
        
        $music_name = $this->upload($request, $request->type);
        if ($music_name == false) {
            return redirect()->back()->with('error', 'Unable to upload your audio');
        }
        
        Audio::create([
            'name' => $music_name,
            'type' => $request->type
        ]);

        return redirect()->back()->with('success', 'New Audio added succesfully');
    }

    public function delete(Request $request){
        $id = $request->input('audio_id');
        $audio = Audio::find($id);

        File::delete('audio/'.$audio->type.'/'.$audio->name.'.mp3');
        $audio->delete();


        Session::flash('success', 'Audio Deleted succesfully');

        return redirect()->back();
    }

    protected function upload(Request $request, $type) {
        if ($request->hasFile('file')) {

            // Requesting the file from the form 
            $audio = $request->file;

            //Getting the extension of the file
            $extension = $audio->getClientOriginalExtension();
            $file_name = $audio->getClientOriginalName();
            $filename = pathinfo($file_name, PATHINFO_FILENAME);

            $directory = $type . '/';

            //Creating the file name:
            if ($request->has('sub_type')) {
                $sub_type = $request->sub_type == 'main' ? '' : $request->sub_type;
                $audioWext = $sub_type . '/' . $filename . '.' . $extension;
                $audio_name = $sub_type . '/' . $filename;
            } else {
                $audioWext = $filename . '.' . $extension;
                $audio_name = $filename;
            }


            //this is ou upload main function, storing the image in the storage that named upload
            $upload_path = $audio->storeAs($directory, $audioWext, 'audio');

            return $audio_name;
        }
            return false;
    }

}
