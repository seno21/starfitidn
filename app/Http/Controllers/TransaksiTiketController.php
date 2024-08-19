<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransaksiTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction(); // Mulai transaksi
        try {
            // Perhitungan usia berdasarkan tanggal lahir
            $yearOfBirth = Carbon::parse($request->tgl_lahir)->year;
            $currentYear = Carbon::now()->year;
            $usia = $currentYear - $yearOfBirth;

            // Upsert untuk detail_users
            DB::table('detail_users')->upsert(
                [
                    [
                        'id' => Str::uuid()->toString(),
                        'id_user' => $request->id_user,
                        'no_telp' => $request->no_telp,
                        'nama_lengkap' => $request->nama_lengkap,
                        'nik' => $request->nik,
                        'kontak_darurat' => $request->kontak_darurat,
                        'domisili' => $request->domisili,
                        'usia' => $usia,
                        'ukuran_jersey' => $request->ukuran_jersey,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'tgl_lahir' => $request->tgl_lahir, // Fixed: gunakan $request->tgl_lahir
                        'tempat_lahir' => $request->tempat_lahir
                    ],
                ],
                ['id_user']
            );

            // Hitung fee komisi
            $fee_commision = 0;

            if (intval($request->harga) > 500000) {
                $fee_commision = 10000;
            } else if (intval($request->harga) > 100000) {
                $fee_commision = 5000;
            } else if (intval($request->harga) > 0) {
                $fee_commision = 2500;
            }

            // Data transaksi
            $data = [
                'id' => Str::uuid()->toString(),
                'id_event' => $request->id_event,
                'id_tiket' => $request->id_tiket,
                'id_user' => $request->id_user,
                'qty' => $request->qty,
                'final_payment' => $request->harga,
                'fee_commision' => $fee_commision,
                'payment_fee' => null,
                'clean_fee' => null,
                'mode' => null,
                'no_bib' => null,
                'no_rfid' => null,
                'no_transaksi' => 'TRANS' . Carbon::now()->translatedFormat('dmYHi'),
                'active' => 1,
                'status_pembayaran' => 'pending',
            ];

            // Simpan data transaksi
            DB::table('transaksi')->insert($data);

            // Commit transaksi
            DB::commit();

            return redirect(route('show.event', $request->id_event));
        } catch (\Throwable $th) {
            DB::rollBack(); // Rollback jika terjadi error
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
