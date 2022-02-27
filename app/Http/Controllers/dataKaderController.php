<?php

namespace App\Http\Controllers;
use App\DataUser;
use App\Posyandu;
use DB;
use Illuminate\Http\Request;

class dataKaderController extends Controller
{
    // public function index()
    // {
    //     $dataKader = DataUser::all();
    //     return view('operator.dataKader.index', ['dataKader' => $dataKader]);
    // }
    public function index()
    {
        $dataKader = DB::table('data_user')
        ->where('role', '=', 'Kader')
        ->get();
        return view('operator.dataKader.index', compact('dataKader'));
    }


    public function create()
    {
       // $dataKader = DataUser::all();
        $posyandu = Posyandu::all();
        return view('operator.dataKader.create', compact('posyandu'));
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
        return redirect('dataKader')->with('success','Data Kader berhasil ditambahkan');
    }

    public function edit($id)
    {
        // $dataKader =DB::table('data_user')->where('id', $id)->get();
        $dataKader = DataUser::find($id);
        $posyandu = Posyandu::all();
        return view('operator.dataKader.edit', ['dataKader' => $dataKader ,'posyandu' => $posyandu]);
    }

    public function update(Request $request, $id)
    {
        $dataKader = DataUser::find($id);
        $dataKader->posyandu_id = $request->posyandu;
        $dataKader->name = $request->nama;
        $dataKader->email = $request->email;
        $dataKader->password = $request->password;
        $dataKader->role= $request->role;
        if($dataKader->photo && file_exists(storage_path('app/public/' . $dataKader->photo)))
        {
            \Storage::delete('public/'.$dataKader->photo);
        }
        $image_name = $request->file('photo')->store('photos', 'public');
        $dataKader->photo = $image_name;
        $dataKader->alamat = $request->alamat;
        $dataKader->jenis_kelamin = $request->jenis_kelamin;
        $dataKader->save();
        return redirect('dataKader')->with('success','Data Kader berhasil diedit');
    }
    public function destroy($id)
    {
        DB::table('data_user')->where('id', $id)->delete();
        return redirect('dataKader')->with('success','Data Kader berhasil dihapus');
    }
}
