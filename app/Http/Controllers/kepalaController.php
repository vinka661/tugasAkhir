<?php

namespace App\Http\Controllers;
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
}
