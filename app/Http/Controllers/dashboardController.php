<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('layout.master');
    }
}
