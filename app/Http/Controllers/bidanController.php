<?php

namespace App\Http\Controllers;
use App\User;
use App\Posyandu;
use App\Penyuluhan;
use App\JadwalPosyandu;
use App\BayiBalita;
use App\VitaminA;
use Illuminate\Http\Request;

class bidanController extends Controller
{
    public function index()
    {
        $bidan = User::where('role', 'Bidan Desa')->get();
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
        $kader = User::where('role', 'Kader')->get();
        return view('bidan.penyuluhan.create', ['kader' => $kader]);
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
        $posyandu = Posyandu::all();
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
        $vitaminA = VitaminA::all();
        return view('bidan.vitaminA.index', ['vitaminA' => $vitaminA]);
    }

    public function createVitaminA()
    {
        $bayiBalita = BayiBalita::all();
        return view('bidan.vitaminA.create', compact('bayiBalita'));
    }

    public function storeVitaminA(Request $request)
    {
        VitaminA::create([
            'id_bb' => $request->bayi,
            'kapsul_vitaminA' => $request->kapsul_vitaminA,
            'tanggal_beri_vitaminA' => $request->tanggal_beri_vitaminA,
        ]);
        return redirect('vitaminA')->with('success','Data Vitamin A berhasil ditambahkan');
    }

    public function editVitaminA($id_vitaminA)
    {

        $vitaminA = VitaminA::find($id_vitaminA);
        $bayiBalita = BayiBalita::all();
        return view('bidan.vitaminA.edit', ['vitaminA' => $vitaminA ,'bayiBalita' => $bayiBalita]);
    }

    public function updateVitaminA(Request $request, $id_vitaminA)
    {
        $vitaminA = VitaminA::find($id_vitaminA);
        $vitaminA->id_bb= $request->bayi;
        $vitaminA->kapsul_vitaminA = $request->kapsul_vitaminA;
        $vitaminA->tanggal_beri_vitaminA = $request->tanggal_beri_vitaminA;
        $vitaminA->save();
        return redirect('vitaminA')->with('success','Data Vitamin A berhasil diedit');
    }

    public function destroyVitaminA($id_vitaminA)
    {
        $vitaminA = VitaminA::find($id_vitaminA);
        $vitaminA->delete();
        return redirect('vitaminA')->with('success','Data Vitamin A berhasil dihapus');
    }
}
