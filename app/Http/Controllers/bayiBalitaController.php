<?php

namespace App\Http\Controllers;
use App\BayiBalita;
use DB;
use Illuminate\Http\Request;

class bayiBalitaController extends Controller
{
    public function index()
    {
        $bayiBalita = BayiBalita::all();
        return view('operator.bayiBalita.index', ['bayiBalita' => $bayiBalita]);
    }

    public function create()
    {
        return view('operator.bayiBalita.create');
    }

    public function store(Request $request)
    {
        DB::table('bayi_balita')->insert([
            'nama_bayi' => $request->nama_bayi,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
        ]);
        return redirect('bayiBalita')->with('success','Data bayi/balita berhasil ditambahkan');
    }

    public function edit($id_bb)
    {
        $bayiBalita = DB::table('bayi_balita')->where('id_bb', $id_bb)->get();
        return view('operator.bayiBalita.edit', ['bayiBalita' => $bayiBalita]);
    }

    public function update(Request $request)
    {
        DB::table('bayi_balita')->where('id_bb', $request->id_bb)->update([
            'nama_bayi' => $request->nama_bayi,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
        ]);
        return redirect('bayiBalita')->with('success','Data bayi/balita berhasil diedit');
    }

    public function destroy($id_bb)
    {
        DB::table('bayi_balita')->where('id_bb', $id_bb)->delete();
        return redirect('bayiBalita')->with('success','Data bayi/balita berhasil dihapus');
    }
}
