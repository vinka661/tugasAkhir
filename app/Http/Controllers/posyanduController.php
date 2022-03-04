<?php

namespace App\Http\Controllers;
use App\Posyandu;
use Illuminate\Http\Request;

class posyanduController extends Controller
{
    public function index()
    {
        $posyandu = Posyandu::all();
        return view('operator.posyandu.index', ['posyandu' => $posyandu]);
    }

    public function create()
    {
        return view('operator.posyandu.create');
    }

    public function store(Request $request)
    {
        Posyandu::create([
            'nama_posyandu' => $request->nama_posyandu,
            'alamat' => $request->alamat,
        ]);
        return redirect('posyandu')->with('success','Data posyandu berhasil ditambahkan');
    }

    public function edit($id_posyandu)
    {
        $posyandu = Posyandu::find($id_posyandu);
        return view('operator.posyandu.edit', ['posyandu' => $posyandu]);
    }

    public function update(Request $request, $id_posyandu)
    {
        $posyandu = Posyandu::find($id_posyandu);
        $posyandu->nama_posyandu = $request->nama_posyandu;
        $posyandu->alamat = $request->alamat;
        $posyandu->save();
        return redirect('posyandu')->with('success','Data posyandu berhasil diedit');
    }

    public function destroy($id_posyandu)
    {
        $posyandu = Posyandu::find($id_posyandu);
        $posyandu->delete();
        return redirect('posyandu')->with('success','Data posyandu berhasil dihapus');
    }
}
