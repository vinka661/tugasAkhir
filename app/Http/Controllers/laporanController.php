<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laporan = DB::table('jadwal_posyandu')
                    ->join('posyandu', 'posyandu.id_posyandu', '=', 'jadwal_posyandu.id_posyandu')
                    ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->distinct()
                    ->get();
        return view('laporan.index')->with('laporan', $laporan);
    }
}
