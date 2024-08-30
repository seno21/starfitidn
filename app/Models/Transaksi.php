<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class Transaksi extends Model
{
    use HasFactory;

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
                'detail_users.tempat_lahir'
            )
            ->join('users', 'users.id', 'transaksi.id_user')
            ->join('detail_users', 'detail_users.id_user', 'transaksi.id_user')
            ->where('transaksi.status_pembayaran', 'PAID')
            ->where('transaksi.active', 1)
            ->where('transaksi.id_event', $id_event)
            ->get();

        return $query;
    }
}
