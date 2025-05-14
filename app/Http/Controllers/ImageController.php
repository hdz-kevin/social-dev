<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $upload = $request->file('file');
        $imgName = Str::uuid() . "." . $upload->extension();
        $imgPath = public_path('uploads') . "/" . $imgName;

        Image::read($upload)
                ->cover(1000, 1000)
                ->toPng()
                ->save($imgPath);

        return response()->json(['image' => $imgName]);
    }
}
