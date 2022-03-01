<?php

namespace App\Http\Controllers;
use App\DataUser;
use App\Posyandu;
use DB;
use Illuminate\Http\Request;

class dataUserController extends Controller
{
     public function index()
    {
        $dataUser = DataUser::all();
        return view('operator.dataUser.index', ['dataUser' => $dataUser]);
    }
   
    public function create()
    {
       // $dataKader = DataUser::all();
        $posyandu = Posyandu::all();
        return view('operator.dataUser.create', compact('posyandu'));
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
        return redirect('dataUser')->with('success','Data User berhasil ditambahkan');
    }

    public function edit($id)
    {
        // $dataKader =DB::table('data_user')->where('id', $id)->get();
        $dataUser = DataUser::find($id);
        $posyandu = Posyandu::all();
        return view('operator.dataUser.edit', ['dataUser' => $dataUser ,'posyandu' => $posyandu]);
    }

    public function update(Request $request, $id)
    {
        $dataUser = DataUser::find($id);
        $dataUser->posyandu_id = $request->posyandu;
        $dataUser->name = $request->nama;
        $dataUser->email = $request->email;
        $dataUser->password = $request->password;
        $dataUser->role= $request->role;
        if($dataUser->photo && file_exists(storage_path('app/public/' . $dataUser->photo)))
        {
            \Storage::delete('public/'.$dataUser->photo);
        }
        $image_name = $request->file('photo')->store('photos', 'public');
        $dataUser->photo = $image_name;
        $dataUser->alamat = $request->alamat;
        $dataUser->jenis_kelamin = $request->jenis_kelamin;
        $dataUser->save();
        return redirect('dataUser')->with('success','Data User berhasil diedit');
    }
    public function destroy($id)
    {
        DB::table('data_user')->where('id', $id)->delete();
        return redirect('dataUser')->with('success','Data User berhasil dihapus');
    }
}

