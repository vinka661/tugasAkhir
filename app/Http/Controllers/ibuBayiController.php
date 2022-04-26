<?php

namespace App\Http\Controllers;
use App\JadwalPosyandu;
use App\Konsultasi;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ibuBayiController extends Controller
{
    public function jadwalPosyandu()
    {
        $jadwalPosyanduBayi = JadwalPosyandu::all();
        return view('ibuBayi.jadwalPosyandu.index', ['jadwalPosyanduBayi' => $jadwalPosyanduBayi]);
    }

    public function konsultasi()
    {
        $konsultasi = konsultasi::with('user')->get();
        return view('ibuBayi.konsultasi.index', ['konsultasi' => $konsultasi]);
    }

    public function createKonsultasi()
    {
        return view('ibuBayi.konsultasi.create');
    }

    public function storeKonsultasi(Request $request)
    {
        Konsultasi::create([
            'konsul' => $request->konsul,
            'id' => $request->nama_ibu,
        ]);
        return redirect('konsultasiIbu')->with('success','Data konsultasi online berhasil ditambahkan');
    }
}
