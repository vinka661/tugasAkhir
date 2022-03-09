<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class kepalaController extends Controller
{
    public function index()
    {
        $kepala = User::where('role', 'Kepala PLKB')->get();
        return view('operator.kepala.index', ['kepala' => $kepala]);
    }
}
