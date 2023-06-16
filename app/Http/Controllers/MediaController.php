<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    public function media()
    {
        $files = File::files(public_path('images/media'));

        return view('media', compact('files'));
    }
    public function uploadMedia(Request $request)
    {
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $image) {
                uploadMedia($image, 'images/media/');
            }
        }
        Flash::success('Images uploaded successfull');
        return redirect(url('media'));
    }

    public function removeMedia($img)
    {
        removeImage($img, 'images/media/');
        Flash::success('Images removed successfully');
        return redirect(url('media'));
    }
}
