<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Tikets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Parsedown;
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
                        <form method="POST" action="' . route('event.eom.remove', $event->id) . '" style="display:inline;">
                            ' . csrf_field() . '
                            <button type="submit" class="btn btn-sm btn-danger" id="btnDel"><i class="mdi mdi-delete"></i></button>
                        </form>';
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

        // toast('Event Berhasil Dibuat', 'success');

        return redirect()->route('event.eom.index')->with('success', 'Event berhasil dibuat');
    }

    public function edit($id)
    {
        $events = new Events();

        $data = [
            'title' => 'Edit Event',
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

        // toast('Event Berhasil Diperbarui', 'success');


        return redirect()->route('event.eom.index')->with('success', 'Event Berhasil Diperbarui');
    }


    public function remove($id)
    {
        // Set active to 0
        $event = Events::find($id);

        $event->active = 0;
        $event->save();


        return redirect()->route('event.eom.index');
    }

    public function removeTiket(Request $request, $id)
    {
        // Set active to 0
        $event = Tikets::find($id);

        $event->active = 0;
        $event->save();


        return redirect()->route('event.eom.show', $event->id_event);
    }

    public function show(Request $request, $id)
    {
        $tikets = new Tikets();
        $tikets = $tikets->showTikets($id);

        $event = Events::find($id);
        $today = \Carbon\Carbon::now();
        $eventDate = \Carbon\Carbon::parse($event->waktu_pelaksanaan);

        $data = [
            'title' => 'Tiket Event',
            'id_event' => $id,
            'event' => $event,
        ];

        if ($request->ajax()) {
            return DataTables::of($tikets)
                ->addIndexColumn()
                ->addColumn('action', function ($tiket) use ($eventDate, $today) {
                    if ($eventDate->greaterThanOrEqualTo($today)) {
                        return '
                        <button
                            type="button"
                            class="btn btn-sm btn-success edit-tiket"
                            data-id="' . $tiket->id . '"
                            data-nama_promo="' . $tiket->nama_promo . '"
                            data-kategori="' . $tiket->kategori . '"
                            data-quota="' . $tiket->quota . '"
                            data-tgl_mulai="' . $tiket->tgl_mulai . '"
                            data-tgl_selesai="' . $tiket->tgl_selesai . '"
                            data-harga="' . $tiket->harga . '">
                            <i class="mdi mdi-pencil-box-outline"></i>
                        </button>
                        <form method="POST" action="' . route('event.eom.removeTiket', $tiket->id) . '" style="display:inline;">
                            ' . csrf_field() . '
                            <button type="submit" class="btn btn-sm btn-danger" id="btnDelete"><i class="mdi mdi-delete"></i></button>
                        </form>';
                    }
                    // Jika waktu_pelaksanaan sudah melewati hari ini, kembalikan string kosong sehingga tidak ada tombol yang ditampilkan
                    return '';
                })
                ->make(true);
        }

        return view('event.show', $data);
    }


    public function updateTiket(Request $request, $id)
    {
        $tiket = Tikets::find($id);

        // Validasi data
        $request->validate([
            'tiket' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tgl_mulai' => 'required|date',
            'tgl_selesai' => 'required|date',
            'harga' => 'required|numeric',
        ]);

        // Update data tiket
        $tiket->id_event = $request->id_event;
        $tiket->nama_promo = $request->tiket;
        $tiket->kategori = $request->kategori;
        $tiket->tgl_mulai = $request->tgl_mulai;
        $tiket->tgl_selesai = $request->tgl_selesai;
        $tiket->quota = $request->quota ? intval($request->quota) : null;
        $tiket->harga = intval(str_replace('.', '', $request->harga));
        $tiket->save();

        // Redirect kembali ke halaman event dengan pesan sukses
        return redirect()->route('event.eom.show', $tiket->id_event)->with('success', 'Tiket berhasil diperbarui');
    }


    public function insertTiket(Request $request)
    {
        $request->validate([
            'tiket' => 'required|max:255',
            'kategori' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'harga' => 'required|numeric',
        ]);


        $tikets = new Tikets();

        $tikets->id_event = $request->id_event;
        $tikets->nama_promo = $request->tiket;
        $tikets->kategori = $request->kategori;
        $tikets->tgl_mulai = $request->tgl_mulai;
        $tikets->tgl_selesai = $request->tgl_selesai;
        $tikets->quota = $request->quota ? intval($request->quota) : null;
        $tikets->harga = intval(str_replace('.', '', $request->harga));
        $tikets->active = 1;
        $tikets->save();

        // dd($request, $tikets);


        // toast('Tiket Berhasil Dibuat', 'success');
        return redirect()->back()->with('success', 'Tiket Berhasil Dibuat');
    }
}
