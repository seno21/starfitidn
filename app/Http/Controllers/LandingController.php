<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    // Method Event Landing - FrontEnd
    public function allEvent()
    {
        $events = new Events();
        $auth = new Auth();

        $data = [
            'events' => $events->allEvent(),
            'auth' => $auth,
        ];


        return view('frontend.event', $data);
    }



    // Methode Event Dashboard - BackEnd
    public function index()
    {
        $events = new Events();
        $auth = new Auth();

        $data = [
            'events' => $events->showEventLanding(),
            'auth' => $auth,
        ];


        return view('frontend.landing', $data);
    }
}
