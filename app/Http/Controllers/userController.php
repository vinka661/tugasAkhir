<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('operator.user.index', ['user' => $user]);
    }

    public function create()
    {
        return view('operator.user.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('user')->with('success','Data user berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('operator.user.edit', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        return redirect('user')->with('success','Data user berhasil diedit');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('user')->with('success','Data user berhasil dihapus');
    }
}