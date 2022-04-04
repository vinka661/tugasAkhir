<?php

namespace App\Http\Controllers;
use App\JadwalPosyandu;
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
        $jadwalPosyandu = JadwalPosyandu::all();
        return view('guest.jadwal', ['jadwalPosyandu' => $jadwalPosyandu]);
    }

    public function penyuluhan()
    {
        return view('guest.penyuluhan');
    }
}
