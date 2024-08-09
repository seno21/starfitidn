<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function create()
    {
        $data = [
            'title' => 'Create Event'
        ];

        return view('event.create', $data);
    }
}
