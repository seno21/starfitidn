<?php

namespace App\Http\Controllers;

use App\Models\events;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Event'
        ];

        return view('event.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Event'
        ];

        return view('event.create', $data);
    }

    public function store(Request $request)
    {
        // $event = new events();

        dd($request->acara);
    }
}
