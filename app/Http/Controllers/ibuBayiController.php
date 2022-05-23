<?php

namespace App\Http\Controllers;
use App\JadwalPosyandu;
use App\Konsultasi;
use App\User;
use App\BayiBalita;
use App\Timbang;
use DB;
use Validator;
use Carbon\Carbon;
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

    public function hasilPerkembangan()
    {
        $date = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $hasilPerkembangan = DB::table('users')
                            ->join('bayi_balita', 'bayi_balita.id', '=', 'users.id')
                            ->join('timbang', 'timbang.id_bb', '=', 'bayi_balita.id_bb')
                            ->whereMonth('timbang.tgl_timbang', '>=', $date)
                            ->whereYear('timbang.tgl_timbang', '>=', $year)
                            ->distinct()
                            ->get();
        // $hasilPerkembangan = BayiBalita::with('timbang.user')->get();
        // return view('ibuBayi.hasilPerkembangan.index', array('user' => Auth::user()), compact("hasilPerkembangan"), ['hasilPerkembangan' => $hasilPerkembangan]);
        return view('ibuBayi.hasilPerkembangan.index')->with('hasilPerkembangan', $hasilPerkembangan);
    }


}
