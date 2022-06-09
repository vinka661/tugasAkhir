<?php

namespace App\Http\Controllers;
use App\User;
use App\Posyandu;
use App\Penyuluhan;
use App\JadwalPosyandu;
use App\BayiBalita;
use App\VitaminA;
use App\JenisVaksinImunisasi;
use App\Imunisasi;
use App\Konsultasi;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bidanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $bidan = User::where('role', 'Bidan Desa')->get();
        // $bidan = DB::table('posyandu')
        //             ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
        //             ->where('users.role', '=', 'Bidan Desa')
        //             ->get();
        return view('operator.bidan.index', ['bidan' => $bidan]);
    }

    public function edit($id)
    {
        $bidan = User::find($id);
        $posyandu = Posyandu::all();
        return view('operator.bidan.edit', ['bidan' => $bidan, 'posyandu' => $posyandu]);
    }

    public function update(Request $request, $id)
    {
        $bidan = User::find($id);
        $bidan->name = $request->name;
        $bidan->jenis_kelamin = $request->jenis_kelamin;
        $bidan->alamat = $request->alamat;
        $bidan->id_posyandu = $request->posyandu;
        $bidan->save();
        return redirect('bidan')->with('success','Data bidan desa berhasil diedit');
    }

    public function destroy($id)
    {
        $bidan = User::find($id);
        $bidan->delete();
        return redirect('bidan')->with('success','Data bidan desa berhasil dihapus');
    }

    public function penyuluhan()
    {
        $penyuluhan = Penyuluhan::all();
        return view('bidan.penyuluhan.index', ['penyuluhan' => $penyuluhan]);
    }

    public function createPenyuluhan()
    {
        // $kader = DB::table('posyandu')
        //                 ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
        //                 ->join('timbang', 'timbang.id', '=', 'users.id')
        //                 ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
        //                 ->get();

        $user = Auth::user();
        $kader = User::where('id_posyandu', $user->id_posyandu)->where('role', 'Kader')->get();
       // dd($kader);
        return view('bidan.penyuluhan.create', compact('kader'));
    }

    public function storePenyuluhan(Request $request)
    {
        Penyuluhan::create([
            'id' => $request->kader,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'materi' => $request->materi,
        ]);
        return redirect('penyuluhan')->with('success','Jadwal penyuluhan berhasil ditambahkan');
    }

    public function editPenyuluhan($id_penyuluhan)
    {
        $penyuluhan = Penyuluhan::find($id_penyuluhan);
        $kader = User::where('role', 'Kader')->get();
        return view('bidan.penyuluhan.edit', ['penyuluhan' => $penyuluhan, 'kader' => $kader]);
    }

    public function updatePenyuluhan(Request $request, $id_penyuluhan)
    {
        $penyuluhan = Penyuluhan::find($id_penyuluhan);
        $penyuluhan->id = $request->kader;
        $penyuluhan->hari = $request->hari;
        $penyuluhan->tanggal = $request->tanggal;
        $penyuluhan->materi = $request->materi;
        $penyuluhan->save();
        return redirect('penyuluhan')->with('success','Jadwal penyuluhan berhasil diedit');
    }

    public function destroyPenyuluhan($id_penyuluhan)
    {
        $penyuluhan = Penyuluhan::find($id_penyuluhan);
        $penyuluhan->delete();
        return redirect('penyuluhan')->with('success','Jadwal penyuluhan berhasil dihapus');
    }

    public function jadwalPosyandu()
    {
        $jadwalPosyandu = JadwalPosyandu::all();
        return view('bidan.jadwalPosyandu.index', ['jadwalPosyandu' => $jadwalPosyandu]);
    }

    public function createJadwalPosyandu()
    {
        $id = Auth::id();
        $posyandu = DB::table('posyandu')
                        ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                        ->where('users.id', $id)
                        ->get();
        return view('bidan.jadwalPosyandu.create', compact('posyandu'));
    }

    public function storeJadwalPosyandu(Request $request)
    {
        JadwalPosyandu::create([
            'id_posyandu' => $request->posyandu,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
            'agenda' => $request->agenda,
            'tempat' => $request->tempat,
        ]);
        return redirect('jadwalPosyandu')->with('success','Data jadwal posyandu berhasil ditambahkan');
    }

    public function editJadwalPosyandu($id_jadwal)
    {

        $jadwalPosyandu = JadwalPosyandu::find($id_jadwal);
        $posyandu = Posyandu::all();
        return view('bidan.jadwalPosyandu.edit', ['jadwalPosyandu' => $jadwalPosyandu ,'posyandu' => $posyandu]);
    }

    public function updateJadwalPosyandu(Request $request, $id_jadwal)
    {
        $jadwalPosyandu = JadwalPosyandu::find($id_jadwal);
        $jadwalPosyandu->id_posyandu = $request->posyandu;
        $jadwalPosyandu->hari = $request->hari;
        $jadwalPosyandu->jam = $request->jam;
        $jadwalPosyandu->tanggal = $request->tanggal;
        $jadwalPosyandu->agenda = $request->agenda;
        $jadwalPosyandu->tempat = $request->tempat;
        $jadwalPosyandu->save();
        return redirect('jadwalPosyandu')->with('success','Data jadwal posyandu berhasil diedit');
    }

    public function destroyJadwalPosyandu($id_jadwal)
    {
        $jadwalPosyandu = JadwalPosyandu::find($id_jadwal);
        $jadwalPosyandu->delete();
        return redirect('jadwalPosyandu')->with('success','Data jadwal posyandu berhasil dihapus');
    }

    public function vitaminA()
    {
        $imunisasi = Imunisasi::all();
        $vitaminA = VitaminA::all();
        return view('bidan.imunisasiDanvitaminA.index', ['vitaminA' => $vitaminA,'imunisasi' => $imunisasi]);
    }

    public function createVitaminA()
    {
        $id = Auth::id();
        $bayiBalita = DB::table('posyandu')
                        ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                        ->join('timbang', 'timbang.id', '=', 'users.id')
                        ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
                        ->where('users.id', $id)
                        ->get();
        return view('bidan.imunisasiDanvitaminA.vitaminA.create', compact('id', 'bayiBalita'));
    }

    public function storeVitaminA(Request $request)
    {
        VitaminA::create([
            'id_bb' => $request->bayi,
            'kapsul_vitaminA' => $request->kapsul_vitaminA,
            'tanggal_beri_vitaminA' => $request->tanggal_beri_vitaminA,
        ]);
        return redirect('imunisasiDanvitaminA')->with('success','Data Vitamin A berhasil ditambahkan');
    }

    public function editVitaminA($id_vitaminA)
    {

        $vitaminA = VitaminA::find($id_vitaminA);
        $bayiBalita = BayiBalita::all();
        return view('bidan.imunisasiDanvitaminA.vitaminA.edit', ['vitaminA' => $vitaminA ,'bayiBalita' => $bayiBalita]);
    }

    public function updateVitaminA(Request $request, $id_vitaminA)
    {
        $vitaminA = VitaminA::find($id_vitaminA);
        $vitaminA->id_bb= $request->bayi;
        $vitaminA->kapsul_vitaminA = $request->kapsul_vitaminA;
        $vitaminA->tanggal_beri_vitaminA = $request->tanggal_beri_vitaminA;
        $vitaminA->save();
        return redirect('imunisasiDanvitaminA')->with('success','Data Vitamin A berhasil diedit');
    }

    public function destroyVitaminA($id_vitaminA)
    {
        $vitaminA = VitaminA::find($id_vitaminA);
        $vitaminA->delete();
        return redirect('imunisasiDanvitaminA')->with('success','Data Vitamin A berhasil dihapus');
    }

    public function jenisVaksinImunisasi()
    {
        $jenisVaksinImunisasi = JenisVaksinImunisasi::all();
        return view('bidan.jenisVaksinImunisasi.index', ['jenisVaksinImunisasi' => $jenisVaksinImunisasi]);
    }

    public function createJenisVaksinImunisasi()
    {
        
        return view('bidan.jenisVaksinImunisasi.create');
    }

    public function storeJenisVaksinImunisasi(Request $request)
    {
        JenisVaksinImunisasi::create([
            'id_vaksin_imunisasi' => $request->id_vaksin_imunisasi,
            'nama_vaksin' => $request->nama_vaksin,
            
        ]);
        return redirect('jenisVaksinImunisasi')->with('success','Data jenis vaksin imunisasi berhasil ditambahkan');
    }

    public function editJenisVaksinImunisasi($id_vaksin_imunisasi)
    {

        $jenisVaksinImunisasi = JenisVaksinImunisasi::find($id_vaksin_imunisasi);
        return view('bidan.jenisVaksinImunisasi.edit', ['jenisVaksinImunisasi' => $jenisVaksinImunisasi ]);
    }

    public function updateJenisVaksinImunisasi(Request $request, $id_vaksin_imunisasi)
    {
        $jenisVaksinImunisasi = JenisVaksinImunisasi::find($id_vaksin_imunisasi);
        $jenisVaksinImunisasi->id_vaksin_imunisasi= $request->id_vaksin_imunisasi;
        $jenisVaksinImunisasi->nama_vaksin = $request->nama_vaksin;
        $jenisVaksinImunisasi->save();
        return redirect('jenisVaksinImunisasi')->with('success','Data jenis vaksin imunisasi berhasil diedit');
    }

    public function destroyJenisVaksinImunisasi($id_vaksin_imunisasi)
    {
        $jenisVaksinImunisasi = JenisVaksinImunisasi::find($id_vaksin_imunisasi);
        $jenisVaksinImunisasi->delete();
        return redirect('jenisVaksinImunisasi')->with('success','Data jenis vaksin imunisasi berhasil dihapus');
    }

    public function createImunisasi()
    {
        $id = Auth::id();
        $bayiBalita = DB::table('posyandu')
                        ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                        ->join('timbang', 'timbang.id', '=', 'users.id')
                        ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
                        ->where('users.id', $id)
                        ->get();
        $jenisVaksinImunisasi = JenisVaksinImunisasi::all();
        return view('bidan.imunisasiDanvitaminA.imunisasi.create', compact('id', 'bayiBalita','jenisVaksinImunisasi'));
    }

    public function storeImunisasi(Request $request)
    {
        Imunisasi::create([
            'id_bb' => $request->bayi,
            'id_vaksin_imunisasi' => $request->imunisasi,
            'tanggal_beri_imunisasi' => $request->tanggal_beri_imunisasi,
        ]);
        return redirect('imunisasiDanvitaminA')->with('success1','Data Vaksin Imunisasi berhasil ditambahkan');
    }

    public function editImunisasi($id_imunisasi)
    {

        $imunisasi = Imunisasi::find($id_imunisasi);
        $id = Auth::id();
        $bayiBalita = DB::table('posyandu')
                        ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                        ->join('timbang', 'timbang.id', '=', 'users.id')
                        ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
                        ->where('users.id', $id)
                        ->get();
        $jenisVaksinImunisasi = JenisVaksinImunisasi::all();
        return view('bidan.imunisasiDanvitaminA.imunisasi.edit', ['imunisasi' => $imunisasi , 'id' => $id, 'bayiBalita' => $bayiBalita,'jenisVaksinImunisasi' => $jenisVaksinImunisasi]);
    }

    public function updateImunisasi(Request $request, $id_imunisasi)
    {
        $imunisasi = Imunisasi::find($id_imunisasi);
        $imunisasi->id_bb= $request->bayi;
        $imunisasi->id_vaksin_imunisasi = $request->imunisasi;
        $imunisasi->tanggal_beri_imunisasi = $request->tanggal_beri_imunisasi;
        $imunisasi->save();
        return redirect('imunisasiDanvitaminA')->with('success1','Data Vaksin Imunisasi berhasil diedit');
    }

    public function destroyImunisasi($id_imunisasi)
    {
        $imunisasi = Imunisasi::find($id_imunisasi);
        $imunisasi->delete();
        return redirect('imunisasiDanvitaminA')->with('success1','Data Vaksin Imunisasi berhasil dihapus');
    }

    public function konsultasi()
    {
        $konsultasi = Konsultasi::all();
        $user = User::all();
        return view('bidan.konsultasi.index', ['konsultasi' => $konsultasi,'user' => $user]);
    }

    public function balasKonsultasi($id_kosultasi)
    {

        $konsultasi = Konsultasi::find($id_kosultasi);
        $user = User::all();;
        return view('bidan.konsultasi.balas', ['konsultasi' => $konsultasi,'user' => $user]);
    }

    public function updateKonsultasi(Request $request, $id_kosultasi)
    {
        $konsultasi = Konsultasi::find($id_kosultasi);
        // $konsultasi->id= $request->ibu;
        // $konsultasi->konsul = $request->konsul;
        $konsultasi->solusi = $request->solusi;
        $konsultasi->save();
        return redirect('konsultasi')->with('success1','Konsultasi berhasil di balas');
    }

    public function destroyKonsultasi($id_kosultasi)
    {
        $konsultasi = Konsultasi::find($id_kosultasi);
        $konsultasi->delete();
        return redirect('konsultasi')->with('success1','Konsultasi berhasil dihapus');
    }
}
