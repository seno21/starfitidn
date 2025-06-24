<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    public function cetakBib($id_transaksi)
    {
        $transaksi = new Transaksi();
        $detailBib = $transaksi->transaksiDetail($id_transaksi);

        $data = [
            'data' => $detailBib
        ];

        $pdf = Pdf::loadView('cetak.cetakBib', $data)->setPaper('a4', 'landscape');
        $pdf->output();

        // Untuk pratinjau di browser:
        return $pdf->stream("cetakbib.pdf");
    }

    public function listBIB(Request $request)
    {
        // Ambil kategori berdasarkan ID
        $kategori = Kategori::find($request->kategori_id);

        // Ambil data peserta berdasarkan kategori
        $listPeserta = DB::table('transaksi')
            ->join('tikets', 'tikets.id', '=', 'transaksi.id_tiket')
            ->join('kategoris', 'kategoris.id', '=', 'tikets.kategori')
            ->join('users', 'users.id', '=', 'transaksi.id_user')
            ->join('events', 'events.id', '=', 'transaksi.id_event')
            ->select('transaksi.no_bib', 'users.name', 'kategoris.nama_kategori', 'events.nama_event')
            ->where('kategoris.id', $request->kategori_id)
            ->get();

        if (count($listPeserta)==0) {
            return view('cetak.notMember',['title' => 'Tidak ada peserta']);
        }

        // Siapkan data untuk view PDF
        $data = [
            'data' => "TESTING",
            'image' => $kategori->img_bib,
            'namaKategori' => $kategori->nama_kategori,
            'namaEvent' => $listPeserta[0]->nama_event,
            'listPeserta' => $listPeserta
        ];

        // Generate dan tampilkan PDF
        $pdf = Pdf::loadView('cetak.cetakBib', $data)->setPaper('a5', 'landscape');

        return $pdf->stream("Cetak BIB - {$kategori->nama_kategori} - {$listPeserta[0]->nama_event}.pdf");
    }
}
