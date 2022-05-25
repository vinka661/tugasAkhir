<?php

namespace App\Http\Controllers;
use App\Posyandu;
use App\User;
use App\BayiBalita;
use DB;
// use Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function dashboard()
    {
        // $chart1 = Chart::title([
        //     'text' => 'Grafik Status Gizi Anak',
        // ])
        // ->chart([
        //     'type'     => 'column', // pie , columnt ect
        //     'renderTo' => 'chart1', // render the chart into your div with id
        // ]);

        if (Auth::user()->role == 'Kepala PLKB') { // Role Kepala
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
        } elseif (Auth::user()->role == 'Operator PLKB') { // Role operator
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
        elseif (Auth::user()->role == 'Bidan Desa') { // Role Bidan
            $bayiBalita = BayiBalita::get();
            $gizibaik = DB::table('timbang')
                ->count();
            $bgm = DB::table('timbang')
                ->where('status_gizi', '=', 'Baik')
                ->where('status_gizi', '=', 'bgm')
                ->count();
            return view('dashboard.kaderBidan', compact('bayiBalita','gizibaik','bgm'));
        }
        elseif (Auth::user()->role == 'Kader') { // Role kader
            $bayiBalita = BayiBalita::get();
            $gizibaik = DB::table('timbang')
                ->count();
            $bgm = DB::table('timbang')
                ->where('status_gizi', '=', 'Baik')
                ->where('status_gizi', '=', 'bgm')
                ->count();
            return view('dashboard.kaderBidan', compact('bayiBalita','gizibaik','bgm'));
        }
        elseif (Auth::user()->role == 'Ibu Bayi') { // Role ibu bayi
            return view('layout.master');
        }

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
        $chart1 = Chart::title([
            'text' => 'Grafik Status Gizi Anak',
        ])
        ->chart([
            'type'     => 'column', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->colors([
            '#0c2959'
        ]);
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
