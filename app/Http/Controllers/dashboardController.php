<?php

namespace App\Http\Controllers;
use App\Posyandu;
use App\User;
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
}
