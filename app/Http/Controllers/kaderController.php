<?php

namespace App\Http\Controllers;
use App\User;
use App\Posyandu;
use App\Timbang;
use App\BayiBalita;
use Illuminate\Http\Request;

class kaderController extends Controller
{
    public function index()
    {
        $kader = User::where('role', 'Kader')->get();
        return view('operator.kader.index', ['kader' => $kader]);
    }

    public function edit($id)
    {
        $kader = User::find($id);
        $posyandu = Posyandu::all();
        return view('operator.kader.edit', ['kader' => $kader, 'posyandu' => $posyandu]);
    }

    public function update(Request $request, $id)
    {
        $kader = User::find($id);
        $kader->name = $request->name;
        $kader->jenis_kelamin = $request->jenis_kelamin;
        $kader->alamat = $request->alamat;
        $kader->id_posyandu = $request->posyandu;
        $kader->save();
        return redirect('kader')->with('success','Data kader berhasil diedit');
    }

    public function destroy($id)
    {
        $kader = User::find($id);
        $kader->delete();
        return redirect('kader')->with('success','Data kader berhasil dihapus');
    }

    public function timbang()
    {
        $timbang = Timbang::all();
        return view('kader.timbang.index', ['timbang' => $timbang]);
    }
}
