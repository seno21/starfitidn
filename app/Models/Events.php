<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Events extends Model
{
    use HasFactory, HasUuids;

    public function showEventLanding()
    {
        return DB::table('events')
            ->limit(6)
            ->get();
    }
}
