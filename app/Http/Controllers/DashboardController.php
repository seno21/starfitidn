<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $event = new Events();
        $transaksi = new Transaksi();
        // $user = new User();
        $eventId = $request->input('event');

        $data = [
            'title' => 'Welcome to Admin Dashboard',
            'event' => $event->totalEvent($eventId),
            'allEvents' => $event->allEvent(),
            'pesertaHariIni' => $transaksi->pesertaToday($eventId),
            'totalPendaftar' => $transaksi->totalPendaftar($eventId),
            'eventId' => $eventId
            // 'user' => $user->totalUser()
        ];

        return view('dashboard', $data);
    }
}
