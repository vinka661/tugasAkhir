<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class berandaController extends Controller
{
    public function beranda()
    {
        return view('layout.master');
    }
}
