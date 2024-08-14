<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tikets extends Model
{
    use HasFactory, HasUuids;

    // Method untuk Admin event dashboard - BackEnd
    public function showTikets($id_event)
    {
        return DB::table('tikets')
            ->where('active', 1)
            ->where('id', $id_event)
            ->get();
    }
}
