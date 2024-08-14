<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    public function index(Request $request)
    {

        $data = [
            'title' => 'List Event',
        ];

        if ($request->ajax()) {
            $event = new Events();
            $events = $event->showIndex();

            return DataTables::of($events)
                ->addIndexColumn()
                ->addColumn('action', function ($event) {
                    return '<a href="' . route('event.eom.show', $event->id) . '" class="btn btn-sm btn-primary"><i class="mdi mdi-ticket"></i></a>
                        <a href="' . route('event.eom.edit', $event->id) . '" class="btn btn-sm btn-success"><i class="mdi mdi-pencil-box-outline"></i></a>
                        <a href="" id="btnDelete" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>';
                })->make(true);
        }

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
            'penyelenggara' => 'required',
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
        toast('Event Berhasil Dibuat', 'success');

        return redirect()->route('event.eom.index');
    }

    public function edit($id)
    {
        $events = new Events();

        $data = [
            'title' => 'Create Event',
            'event' => $events->find($id),
        ];

        return view('event.edit', $data);
    }

    public function update(Request $request, $id)
    {


        $request->validate([
            'acara' => 'required|max:255',
            'waktu' => 'required',
            'lokasi' => 'required|max:255',
            'telepon' => 'required|numeric|digits_between:11,13',
            'deskripsi' => 'required|max:1000',
            'penyelenggara' => 'required',
            // 'poster' => 'required|mimes:jpeg,jpg,png|image|max:1024'
        ]);


        $event = Events::find($id);
        // dd($event);

        $event->nama_event = $request->acara;
        $event->waktu_pelaksanaan = $request->waktu;
        $event->lokasi  = $request->lokasi;
        $event->kontak = $request->telepon;


        // jika tidak ada gambar, hapus gambarnya di file lalu timpa namanya di database

        if ($request->file('poster') != null) {
            Storage::delete($event->poster);
            $event->poster = $request->file('poster')->store('poster-img');
        }

        $event->penyelenggara = $request->penyelenggara;
        $event->kategori = $request->kategori;
        $event->status = $request->status;
        $event->deskripsi = $request->deskripsi;
        $event->active = 1;
        $event->save();

        toast('Event Berhasil Diperbarui', 'success');


        return redirect()->route('event.eom.index');
    }


    public function show(Request $request, $id)
    {
        $data = [
            'title' => 'Ticketing Category'
        ];
        return view('event.show', $data);
    }
}
