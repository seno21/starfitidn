<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Abouts extends Model
{
    public $incrementing = false; // UUID tidak auto-increment
    protected $keyType = 'string';

    public function about()
    {
        return DB::table('abouts')
            ->where('active', 1)
            ->first();
    }
}
