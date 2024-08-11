<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'events' => Events::all(),
        ];


        return view('frontend.landing', $data);
    }
}
