<?php

namespace App\Http\Controllers;
use App\JadwalPosyandu;
use App\Penyuluhan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    public function index()
    {
        $penyuluhan = penyuluhan::orderBy('hari','ASC')->take(2)->get(); 
        return view('guest.index', ['penyuluhan' => $penyuluhan]);
    }

    public function about()
    {
        return view('guest.about');
    }

    public function jadwal()
    {
        $date = Carbon::now()->isoFormat('Y-MM-D');
        $jadwalPosyandu = JadwalPosyandu::where('tanggal', '>=', $date)->orderBy('tanggal', 'asc')->get();
        return view('guest.jadwal', ['jadwalPosyandu' => $jadwalPosyandu]);
    }

    public function penyuluhan()
    {
        $penyuluhan = Penyuluhan::all();
        return view('guest.penyuluhan', ['penyuluhan' => $penyuluhan]);
    }
}
