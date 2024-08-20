<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\Invoice;
use Xendit\Invoice\InvoiceApi;
use Xendit\XenditSdkException;
use Xendit\Exceptions\ApiException;

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

    public function cancel(Request $request)
    {
        $transaksi = DB::table('transaksi')
            ->where('id_tiket', $request->id)
            ->where('active', 1)
            ->where('id_user', Auth::user()->id)
            ->first();

        if ($transaksi) {
            DB::table('transaksi')
                ->where('id', $transaksi->id)
                ->update(['active' => 0]);
        } else {
            // Handle the case where no transaction is found
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        return response()->json([
            'success' => true,
        ]);
    }

    public function checkout()
    {
        // Initialize Xendit with the API key
        Configuration::setXenditKey(env('XENDIT_SECRET_KEY'));

        // Create an instance of the InvoiceApi class
        $apiInstance = new InvoiceApi();

        // Prepare the invoice creation request
        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => 'invoice-' . uniqid(),
            'description' => 'Sistem kalau udah dipakai itu harus dibayar, jangan bilangnya ga dipake tapi hari H full akses',
            'amount' => 25000000,
            'invoice_duration' => 172800, // Invoice is valid for 48 hours
            'currency' => 'IDR',
            'reminder_time' => 1,
            'success_redirect_url' => route('home') // Reminder will be sent after 1 hour
        ]);

        try {
            // Create the invoice
            $result = $apiInstance->createInvoice($create_invoice_request);

            // Redirect the user to the payment URL
            dd($result);
            return redirect($result['invoice_url']);
        } catch (XenditSdkException $e) {
            // Handle any SDK exceptions
            echo 'SDK Exception when creating invoice: ', $e->getMessage(), PHP_EOL;
            echo 'Full Error: ', json_encode($e->getFullError()), PHP_EOL;
        } catch (\App\Http\Controllers\ApiException $e) {
            // Handle API exceptions
            echo 'API Exception when creating invoice: ', $e->getMessage(), PHP_EOL;
            echo 'Full Error: ', json_encode($e->getResponseObject()), PHP_EOL;
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
