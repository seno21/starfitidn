<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'id_event',
        'id_tiket',
        'id_user',
        'qty',
        'final_payment',
        'fee_commision',
        'payment_fee',
        'clean_fee',
        'mode',
        'no_bib',
        'no_rfid',
        'no_transaksi',
        'active',
        'status_pembayaran',
    ];

    public function allPeserta($id_event)
    {
        $query = DB::table('transaksi')
            ->select(
                'transaksi.id_user',
                'transaksi.id_tiket',
                'transaksi.id_event',
                'transaksi.status_pembayaran',
                'users.name',
                'users.email',
                'detail_users.no_telp',
                'detail_users.nama_lengkap',
                'detail_users.tgl_lahir',
                'detail_users.jenis_kelamin',
                'detail_users.ukuran_jersey',
                'detail_users.domisili',
                'detail_users.kontak_darurat',
                'detail_users.tempat_lahir',
                'transaksi.no_bib',
                'transaksi.no_rfid',
                'tikets.nama_promo',
                'kategoris.nama_kategori',
            )
            ->join('users', 'users.id', 'transaksi.id_user')
            ->join('detail_users', 'detail_users.id_user', 'transaksi.id_user')
            ->join('tikets', 'tikets.id', 'transaksi.id_tiket')
            ->join('kategoris', 'kategoris.id', 'tikets.kategori')
            ->where('transaksi.status_pembayaran', 'PAID')
            ->where('transaksi.active', 1)
            ->where('transaksi.id_event', $id_event)
            ->get();

        return $query;
    }

    public function pesertaToday($eventId = null)
    {
        $query = DB::table('transaksi')
            ->join('events', 'events.id', 'transaksi.id_event')
            ->where('status_pembayaran', 'PAID')
            ->whereDate('transaksi.created_at', now())
            ->when($eventId, fn($query) => $query->where('id_event', $eventId))
            ->count();

        return $query;
    }

    public function totalPendaftar($eventId = null)
    {
        $query = DB::table('transaksi')
            ->join('events', 'events.id', 'transaksi.id_event')
            ->where('status_pembayaran', 'PAID')
            ->when($eventId, fn($query) => $query->where('id_event', $eventId))
            ->count();

        return $query;
    }

    public function transaksiDetail($id_transaksi)
    {
        $query = DB::table('transaksi')
            ->join('events', 'events.id', 'transaksi.id_event')
            ->join('users', 'users.id', 'transaksi.id_user')
            ->join('tikets', 'tikets.id', 'transaksi.id_tiket')
            ->join('kategoris', 'kategoris.id', 'tikets.kategori')
            ->select('users.name', 'transaksi.no_bib', 'kategoris.img_bib')
            ->where('transaksi.id', $id_transaksi)
            ->first();

        return $query;
    }
}
