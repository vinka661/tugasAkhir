<?php

namespace App\Http\Controllers;
use App\DataUser;
use App\Posyandu;
use DB;
use Illuminate\Http\Request;

class dataBidanController extends Controller
{
    public function index()
    {
        $dataBidan = DB::table('data_user')
        ->where('role', '=', 'Bidan Desa')
        ->get();
        return view('operator.dataBidan.index', compact('dataBidan'));
    }

    public function create()
    {
       // $dataKader = DataUser::all();
        $posyandu = Posyandu::all();
        return view('operator.dataBidan.create', compact('posyandu'));
    }

    public function store(Request $request)
    {
        if($request->file('photo')){ 
			$image_name = $request->file('photo')->store('photos','public');
        } 
        DB::table('data_user')->insert([
            'posyandu_id' => $request->posyandu,
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
            'photo' => $image_name,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
           
        ]);
        return redirect('dataBidan')->with('success','Data Bidan Desa berhasil ditambahkan');
    }

  

    public function edit($id)
    {
        // $dataKader =DB::table('data_user')->where('id', $id)->get();
        $dataBidan = DataUser::find($id);
        $posyandu = Posyandu::all();
        return view('operator.dataBidan.edit', ['dataBidan' => $dataBidan ,'posyandu' => $posyandu]);
    }

    public function update(Request $request, $id)
    {
        $dataBidan = DataUser::find($id);
        $dataBidan->posyandu_id = $request->posyandu;
        $dataBidan->name = $request->nama;
        $dataBidan->email = $request->email;
        $dataBidan->password = $request->password;
        $dataBidan->role= $request->role;
        if($dataBidan->photo && file_exists(storage_path('app/public/' . $dataBidan->photo)))
        {
            \Storage::delete('public/'.$dataBidan->photo);
        }
        $image_name = $request->file('photo')->store('photos', 'public');
        $dataBidan->photo = $image_name;
        $dataBidan->alamat = $request->alamat;
        $dataBidan->jenis_kelamin = $request->jenis_kelamin;
        $dataBidan->save();
        return redirect('dataBidan')->with('success','Data Bidan berhasil diedit');
    }
    public function destroy($id)
    {
        DB::table('data_user')->where('id', $id)->delete();
        return redirect('dataBidan')->with('success','Data Bidan berhasil dihapus');
    }
}

