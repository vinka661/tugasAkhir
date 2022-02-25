<?php

namespace App\Http\Controllers;
use App\Posyandu;
use DB;
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
        DB::table('posyandu')->insert([
            'nama_posyandu' => $request->nama_posyandu,
            'alamat' => $request->alamat,
        ]);
        return redirect('posyandu')->with('success','Data posyandu berhasil ditambahkan');
    }

    public function edit($id_posyandu)
    {
        $posyandu = DB::table('posyandu')->where('id_posyandu', $id_posyandu)->get();
        return view('operator.posyandu.edit', ['posyandu' => $posyandu]);
    }

    public function update(Request $request)
    {
        DB::table('posyandu')->where('id_posyandu', $request->id_posyandu)->update([
            'nama_posyandu' => $request->nama_posyandu,
            'alamat' => $request->alamat,
        ]);
        return redirect('posyandu')->with('success','Data posyandu berhasil diedit');
    }

    public function destroy($id_posyandu)
    {
        DB::table('posyandu')->where('id_posyandu', $id_posyandu)->delete();
        return redirect('posyandu')->with('success','Data posyandu berhasil dihapus');
    }
}
