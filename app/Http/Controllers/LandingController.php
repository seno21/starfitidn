<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Tikets;
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

    public function showEvent($id)
    {
        $events = new Events();
        $events = $events->find($id);

        $today = \Carbon\Carbon::now();
        $eventDate = \Carbon\Carbon::parse($events->waktu_pelaksanaan);

        if($today->greaterThanOrEqualTo($eventDate)){
            $tickets = array();
        }else{
            $tickets = Tikets::where('id_event', $id)->where('active', 1)->orderBy('tgl_mulai')->get();
        }

        $data = [
            'event' => $events,
            'tikets' => $tickets,
        ];

        return view('frontend.detailevent', $data);
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
