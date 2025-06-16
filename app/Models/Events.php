<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Events extends Model
{
    use HasFactory, HasUuids;

    // Method untuk landing event - FrontEnd
    public function allEvent()
    {
        return DB::table('events')
            ->orderBy('waktu_pelaksanaan')
            ->where('events.active', 1)
            ->get();
    }


    // Method untuk Admin event dashboard - BackEnd
    public function showIndex()
    {
        return DB::table('events')->where('events.active', 1)->get();
    }

    public function showEventLanding()
    {
        return DB::table('events')
            ->limit(4)
            ->orderBy('created_at', 'desc')
            ->where('events.active', 1)
            ->get();
    }

    public function totalEvent()
    {
        return DB::table('events')
            ->count();
    }
}
