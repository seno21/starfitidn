<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Gallerys;
use App\Models\Tikets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    // Method Event Landing - FrontEnd
    public function allGallery()
    {
        $gallerys = new Gallerys();

        $data = [
            'gallerys' => $gallerys->allGalleryPage(),
        ];


        return view('frontend.gallery', $data);
    }




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

    public function showEvent($slug)
    {
        $events = new Events();
        $events = $events->where('slug', $slug)->first();
        $userLogin = Auth::user();
        // dd($events);

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
            $tickets = DB::table('tikets')
                ->leftJoin('kategoris', 'kategoris.id', '=', 'tikets.kategori')
                ->leftJoin(
                    DB::raw('(SELECT id_tiket, COUNT(id) as total_tiket_terbeli
                         FROM transaksi
                         WHERE status_pembayaran = "PAID"
                         GROUP BY id_tiket) as tr'),
                    'tikets.id',
                    '=',
                    'tr.id_tiket'
                )
                ->select('kategoris.*', 'tikets.*', DB::raw('IFNULL(tr.total_tiket_terbeli, 0) as total_tiket_terbeli'))
                ->where('tikets.id_event', $events->id)
                ->where('tikets.active', 1)
                ->orderBy('tikets.tgl_mulai', 'asc')
                ->orderBy('kategoris.nama_kategori', 'asc')
                ->get();
            // Gunakan first() karena ini menghasilkan satu nilai

        }
        $transaksis = DB::table('transaksi')
            ->where('active', 1)
            ->where('id_event', $events->id);
        if (isset($userLogin->id)) {
            $transaksis = $transaksis->where('id_user', $userLogin->id);
        }
        $transaksis = $transaksis->first();


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
        $gallerys = new Gallerys();

        // dd($gallerys->all());

        $data = [
            'events' => $events->showEventLanding(),
            'auth' => $auth,
            'gallerys' => $gallerys->allGallery(),
        ];


        return view('frontend.landing', $data);
    }
}
