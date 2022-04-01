<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.index');
    }

    public function about()
    {
        return view('guest.about');
    }

    public function jadwal()
    {
        return view('guest.jadwal');
    }

    public function penyuluhan()
    {
        return view('guest.penyuluhan');
    }
}
