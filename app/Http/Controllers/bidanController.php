<?php

namespace App\Http\Controllers;
use App\User;
use App\Posyandu;
use App\Penyuluhan;
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
}
