<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $event = new Events();
        $transaksi = new Transaksi();
        // $user = new User();


        $data = [
            'title' => 'Welcome to Admin Dashboard',
            'event' => $event->totalEvent(),
            'transaksi' => $transaksi,
            // 'user' => $user->totalUser()
        ];

        return view('dashboard', $data);
    }
}
