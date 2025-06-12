<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

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
        return $pdf->stream("rapor cetakbib.pdf");
    }
}
