<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    public function index()
    {

        $data = [
            'title' => 'List Event',
            'events' => Events::All(),
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

        // dd($request->file('poster')->getClientOriginalName());

        $request->validate([
            'acara' => 'required|max:255',
            'waktu' => 'required',
            'lokasi' => 'required|max:255',
            'telepon' => 'required|numeric|digits_between:11,13',
            'deskripsi' => 'required|max:1000',
            'poster' => 'required|mimes:jpeg,jpg,png|image|max:1024'
        ]);

        // return $request->file('poster')->store('poster');
        // alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');

        $event = new Events();

        $event->nama_event = $request->acara;
        $event->waktu_pelaksanaan = $request->waktu;
        $event->lokasi  = $request->lokasi;
        $event->kontak = $request->telepon;
        $event->poster = $request->file('poster')->store('poster-img');
        $event->penyelenggara = $request->penyelenggara;
        $event->kategori = $request->kategori;
        $event->status = $request->status;
        $event->deskripsi = $request->deskripsi;
        $event->active = 1;
        $event->save();

        // Alert::success('Success Title', 'Success Message');
        alert('Success Title', 'Success Message');

        return redirect()->route('event.eom.index');
    }
}
