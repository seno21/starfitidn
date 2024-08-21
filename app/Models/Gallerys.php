<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallerys extends Model
{
    use HasFactory, HasUlids;

    public function allGallery()
    {
        return DB::table('gallerys')
            ->where('active', 1)
            ->limit(8)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
