<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Tikets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $events = $events->where('slug', $id)->first();
        $userLogin = Auth::user();

        $detailUser = array();

        if (isset($userLogin->id)) {
            $detailUser = DB::table('users as us')
                ->leftjoin('detail_users as du', 'du.id_user', 'us.id')
                ->where('us.id', $userLogin->id)
                ->select('du.*', 'us.id as id_user', 'us.email')
                ->first();
        }

        $today = \Carbon\Carbon::now();
        $eventDate = \Carbon\Carbon::parse($events->waktu_pelaksanaan);

        if ($today->greaterThanOrEqualTo($eventDate)) {
            $tickets = array();
        } else {
            $tickets = Tikets::where('id_event', $id)->where('active', 1)->orderBy('tgl_mulai')->get();
        }
        $transaksis = DB::table('transaksi')->where('active', 1)->where('id_event', $id)->first();

        $data = [
            'event' => $events,
            'tikets' => $tickets,
            'detailUsers' => $detailUser,
            'transaksi' => $transaksis,
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
