<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function create(Request $request)
    {
        $data = [
            'title' => 'Welcome to Gallery'
        ];

        return view('gallery.create', $data);
    }
}
