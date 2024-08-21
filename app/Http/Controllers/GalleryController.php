<?php

namespace App\Http\Controllers;

use App\Models\Gallerys;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create()
    {
        $data = [
            'title' => 'Welcome to Gallery'
        ];

        return view('gallery.create', $data);
    }

    public function store(Request $request)
    {

        $request->validate([
            'galeri' => 'required|mimes:jpeg,jpg,png|image|max:1024'
        ]);
        $images = $request->file('galeri');


        foreach ($images as $image) {
            $gambar = $image->store('gallery-img'); //pindah gambar dati temp ke public storage
            $gallerys = new Gallerys();

            $path[] = $gambar;
            $gallerys->nama_foto = $gambar;
            $gallerys->active = 1;
            $gallerys->save();
        }


        return redirect()->with('success', 'Upload foto berhasil');
    }
}
