<?php

namespace App\Http\Controllers;
use App\BayiBalita;
use App\User;
use Illuminate\Http\Request;

class bayiBalitaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $bayiBalita = BayiBalita::all();
        return view('operator.bayiBalita.index', ['bayiBalita' => $bayiBalita]);
    }

    public function create()
    {
        $ibu = User::where('role', 'Ibu Bayi')->get();
        return view('operator.bayiBalita.create', ['ibu' => $ibu]);
    }

    public function store(Request $request)
    {
        BayiBalita::create([
            'nama_bayi' => $request->nama_bayi,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'id' => $request->ibu,
            'nama_ayah' => $request->nama_ayah,
        ]);
        return redirect('bayiBalita')->with('success','Data bayi/balita berhasil ditambahkan');
    }

    public function edit($id_bb)
    {
        $bayiBalita = BayiBalita::find($id_bb);
        $ibu = User::where('role', 'Ibu Bayi')->get();
        return view('operator.bayiBalita.edit', ['bayiBalita' => $bayiBalita, 'ibu' => $ibu]);
    }

    public function update(Request $request, $id_bb)
    {
        $bayiBalita = BayiBalita::find($id_bb);
        $bayiBalita->nama_bayi = $request->nama_bayi;
        $bayiBalita->ttl = $request->ttl;
        $bayiBalita->jenis_kelamin = $request->jenis_kelamin;
        $bayiBalita->umur = $request->umur;
        $bayiBalita->alamat = $request->alamat;
        $bayiBalita->id = $request->ibu;
        $bayiBalita->nama_ayah = $request->nama_ayah;
        $bayiBalita->save();
        return redirect('bayiBalita')->with('success','Data bayi/balita berhasil diedit');
    }

    public function destroy($id_bb)
    {
        $bayiBalita = BayiBalita::find($id_bb);
        $bayiBalita->delete();
        return redirect('bayiBalita')->with('success','Data bayi/balita berhasil dihapus');
    }
}
