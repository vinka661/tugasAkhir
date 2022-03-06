<?php

namespace App\Http\Controllers;
use App\User;
use App\Posyandu;
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
}
