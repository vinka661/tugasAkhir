<?php

namespace App\Http\Controllers;
use App\JadwalPosyandu;
use App\Konsultasi;
use App\User;
use App\BayiBalita;
use App\Timbang;
use App\Imunisasi;
use App\JenisVaksinImunisasi;
use DB;
use Validator;
use Carbon\Carbon;
use Chart;
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

    public function createKonsultasi($id)
    {
        $konsultasi = DB::table('users')
                        ->join('konsultasi', 'konsultasi.id', '=', 'users.id')
                        ->where('users.id', $id)
                        ->get();
        return view('ibuBayi.konsultasi.create', compact('konsultasi'));
    }

    public function storeKonsultasi(Request $request)
    {
        Konsultasi::create([
            'konsul' => $request->konsul,
            'id' => $request->id,
        ]);
        return redirect('konsultasiIbu')->with('success','Data konsultasi online berhasil ditambahkan');
    }

    public function hasilPerkembangan()
    {
        $id = Auth::id();
        $date = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        $hasilPerkembangan = DB::table('users')
                            ->join('bayi_balita', 'bayi_balita.id', '=', 'users.id')
                            ->join('timbang', 'timbang.id_bb', '=', 'bayi_balita.id_bb')
                            ->where('users.id', $id)
                            ->whereMonth('timbang.tgl_timbang', '>=', $date)
                            ->whereYear('timbang.tgl_timbang', '>=', $year)
                            ->distinct()
                            ->get();
        // $hasilPerkembangan = BayiBalita::with('timbang.user')->get();
        // return view('ibuBayi.hasilPerkembangan.index', array('user' => Auth::user()), compact("hasilPerkembangan"), ['hasilPerkembangan' => $hasilPerkembangan]);
        return view('ibuBayi.hasilPerkembangan.index', compact('hasilPerkembangan', 'id'));
    }

    public function showKms($id_bb)
    {
        $data = DB::table('users')
                ->join('bayi_balita', 'bayi_balita.id', '=', 'users.id')
                ->join('timbang', 'timbang.id_bb', '=', 'bayi_balita.id_bb')
                ->where('bayi_balita.id_bb', $id_bb)->first();
        $data1 = DB::table('bayi_balita')
                ->leftjoin('imunisasi', 'bayi_balita.id_bb', '=', 'imunisasi.id_bb')
                ->leftjoin('jenis_vaksin', 'imunisasi.id_vaksin_imunisasi', '=', 'jenis_vaksin.id_vaksin_imunisasi')
                ->where('bayi_balita.id_bb', $id_bb)->get();
        $data2 = DB::table('bayi_balita')
                ->join('vitamin', 'bayi_balita.id_bb', '=', 'vitamin.id_bb')
                ->where('bayi_balita.id_bb', $id_bb)->get();
        // Grafik umur 1 - 24 bulan
        $t = DB::table('bayi_balita as b')
                ->leftjoin('timbang as t', 'b.id_bb', '=', 't.id_bb')
                ->select('b.id_bb', 'b.nama_bayi', 'b.umur', 't.berat_badan', 't.tinggi_badan', 't.tgl_timbang')
                ->where('b.id_bb', $id_bb)
                ->get();

        $grafik = Timbang::where('id_bb', $id_bb)->pluck('berat_badan');


        // $grafik = array(61);
        // for ($i=0; $i < 61; $i++) { 
        //     $grafik[$i] = null;
        // }
        // $grafik[0] = $data->berat_badan;
        // foreach ($t as $some) {
        //     $grafik[$some->umur] = $some->berat_badan;
        // }

        // dd($grafik);
        return view('ibuBayi.hasilPerkembangan.kms', compact('data', 'data1', 'data2', 'grafik'));
    }

    


}
