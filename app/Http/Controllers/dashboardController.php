<?php

namespace App\Http\Controllers;
use App\Posyandu;
use App\User;
use App\BayiBalita;
use DB;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('layout.master');
    }

    public function dashboardOperator()
    {
        $posyandu = Posyandu::get();
        $kader = DB::table('users')
            ->where('role', '=', 'Kader')
            ->count();
        $ibubayi = DB::table('users')
            ->where('role', '=', 'Ibu Bayi')
            ->count();
        $bidan = DB::table('users')
            ->where('role', '=', 'Bidan Desa')
            ->count();
        return view('dashboard.operator', compact('posyandu','kader','ibubayi','bidan'));
    }

    public function dashboardKaderdanBidan()
    {
        $bayiBalita = BayiBalita::get();
        $gizibaik = DB::table('timbang')
            ->where('status_gizi', '=', 'Baik')
            ->count();
        $bgm = DB::table('timbang')
            ->where('status_gizi', '=', 'bgm')
            ->count();
       
        return view('dashboard.kaderBidan', compact('bayiBalita','gizibaik','bgm'));
    }
}
