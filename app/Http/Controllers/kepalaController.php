<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

class kepalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kepala = User::where('role', 'Kepala PLKB')->get();
        return view('operator.kepala.index', ['kepala' => $kepala]);
    }

    public function show($id)
    {
        $kepala = User::where('name', '=', $id)->first();
        return view('kepala.dataDiri.index', ['kepala' => $kepala]);
    }

    public function editData($id) 
    {
        $kepala = User::find($id);
        return view('kepala.dataDiri.editData', ['kepala' => $kepala]);
    }

    public function updateData(Request $request, $id) 
    {
        $img = 'photo';
        $kepala = User::find($id);
        $kepala->id = $request->id;
        $kepala->name = $request->name;
        $kepala->jenis_kelamin = $request->jenis_kelamin;
        $kepala->alamat = $request->alamat;
        $kepala->save();

        $kepala1 = User::find(Auth::user()->id);
        if ($request->file('photo') != null) 
        {
            $kepala1->photo = $this->model()->uploadFile($request,$img);
        }else
        {
            $kepala1->photo = $request->old_photo;
        }
        $kepala1->save();
        return redirect()->route('dataDiri', ['id' => $request->id]);
    }
}
