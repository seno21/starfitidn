<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfitController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Profit Event'
        ];

        return view('profit.index', $data);
    }
}
