<?php

namespace App\Http\Controllers;
use App\JadwalPosyandu;
use App\Konsultasi;
use App\User;
use Illuminate\Http\Request;

class ibuBayiController extends Controller
{
    public function jadwalPosyandu()
    {
        $jadwalPosyanduBayi = JadwalPosyandu::all();
        return view('ibuBayi.jadwalPosyandu.index', ['jadwalPosyanduBayi' => $jadwalPosyanduBayi]);
    }

    public function konsultasi()
    {
        $user = User::all();
        $konsultasi = Konsultasi::all();
        return view('ibuBayi.konsultasi.index');
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
