<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    public function store(Request $request){

        $imagen = $request->file('file');

        $nombreImagen = Str::uuid().'.'.$imagen->extension();

        $imagenServer = Image::make($imagen);
        $imagenServer->fit(1000,1000);

        $imagenpath = public_path('uploads').'/'.$nombreImagen;

        $imagenServer->save($imagenpath);

        return response()->json(['imagen' => $nombreImagen]);
    }
}
