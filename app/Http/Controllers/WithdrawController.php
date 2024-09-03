<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Detail Penarikan Profit'
        ];

        return view('withdraw.index', $data);
    }
}
