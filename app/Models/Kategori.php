<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory, HasUuids;

    public function showKategori($id_event)
    {
        return DB::table('kategoris')->where('kategoris.id_event', $id_event)->where('kategoris.active', 1)->get();
    }
}
