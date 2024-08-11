<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welcome to Admin Dashboard'
        ];

        return view('dashboard', $data);
    }
}
