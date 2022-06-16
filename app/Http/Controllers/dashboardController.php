<?php

namespace App\Http\Controllers;
use App\Posyandu;
use App\User;
use App\BayiBalita;
use App\JadwalPosyandu;
use App\Timbang;
use App\Konsultasi;
use DB;
use Chart;
use Calendar;
use Carbon\Carbon;
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
        if (Auth::user()->role == 'Operator PLKB') { // Role Kepala
            $posyandu1 = Posyandu::all();
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
            //Grafik
        date_default_timezone_set('Asia/Jakarta');
        $nmm = Carbon::now()->format('m'); // Tanggal sekarang bulan
        $nY = Carbon::now()->format('Y'); // Tanggal sekarang tahun
        $nm = [1,2,3,4,5,6,7,8,9,10,11,12];
        $t_lebih=[];
        $t_normal=[];
        $t_kurang=[];
        $t_s_kurang=[];
        foreach ($nm as $nowM) {
            $g_lebih = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Lebih')
                ->count();

            $g_normal = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Normal')
                ->count();

            $g_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Kurang')
                ->count();

            $g_s_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Sangat Kurang')
                ->count();

            array_push($t_lebih, $g_lebih);
            array_push($t_normal, $g_normal);
            array_push($t_kurang, $g_kurang);
            array_push($t_s_kurang, $g_s_kurang);
        }
        ////

        // GRAFIK /////////////////
        $chart1 = Chart::title([
            'text' => 'Grafik Status Gizi Anak',
        ])
        ->chart([
            'type'     => 'column', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->colors([
            '#0c2959'
        ])
        ->xaxis([
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->yaxis([
            'title' => 'Jumlah',
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->legend([
            'enabled' => false
        ])
        ->plotoptions([
            'series' => [
                'label' => [
                    'connectorallowed' => 'false',
                ],
                'pointstart' => 0,
                'marker' => [
                    'enabled' => 'false',
                ],
                'enablemousetracking' => 'true'
            ],
            'candlestick' => [
                'linecolor' => '#404048',
            ],
            'scatter' => [
                'datalabels' => [
                    'enabled' => 'true'
                ],
            ],
        ])
        ->series(
            [
                [
                    'name'  => 'BB Lebih',
                    'data'  => $t_lebih,
                    'color' => '#f2f200'
                ],
                [
                    'name'  => 'BB Normal',
                    'data'  => $t_normal,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Kurang',
                    'data'  => $t_kurang,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Sangat Kurang',
                    'data'  => $t_s_kurang,
                    'color' => '#ff0000'
                ],
            ]
        )
        ->display();

        $cek_umur = DB::table('bayi_balita')->where('tempat_lahir', 0)->get();
        foreach ($cek_umur as $anak) {
            date_default_timezone_set('Asia/Jakarta');
            $now = Carbon::now()->format('Y-m-d'); // Tanggal sekarang
            $b_day = Carbon::parse($anak->tgl_lahir); // Tanggal Lahir
            $age = $b_day->diffInMonths($now);  // Menghitung umur
            if ($age >= 6) {
                $edit = BayiBalita::where('id_bb', $anak->id_bb);
                $edit->alama = 1;
            }
        }

   

            return view('dashboard.operator', compact('posyandu1','posyandu','kader','ibubayi','bidan','chart1'));
           
        } elseif (Auth::user()->role == 'Kepala PLKB') { // Role operator
            $posyandu1 = Posyandu::all();
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
            //Grafik
        date_default_timezone_set('Asia/Jakarta');
        $nmm = Carbon::now()->format('m'); // Tanggal sekarang bulan
        $nY = Carbon::now()->format('Y'); // Tanggal sekarang tahun
        $nm = [1,2,3,4,5,6,7,8,9,10,11,12];
        $t_lebih=[];
        $t_normal=[];
        $t_kurang=[];
        $t_s_kurang=[];
        foreach ($nm as $nowM) {
            $g_lebih = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Lebih')
                ->count();

            $g_normal = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Normal')
                ->count();

            $g_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Kurang')
                ->count();

            $g_s_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Sangat Kurang')
                ->count();

            array_push($t_lebih, $g_lebih);
            array_push($t_normal, $g_normal);
            array_push($t_kurang, $g_kurang);
            array_push($t_s_kurang, $g_s_kurang);
        }
        ////

        // GRAFIK /////////////////
        $chart1 = Chart::title([
            'text' => 'Grafik Status Gizi Anak',
        ])
        ->chart([
            'type'     => 'column', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->colors([
            '#0c2959'
        ])
        ->xaxis([
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->yaxis([
            'title' => 'Jumlah',
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->legend([
            'enabled' => false
        ])
        ->plotoptions([
            'series' => [
                'label' => [
                    'connectorallowed' => 'false',
                ],
                'pointstart' => 0,
                'marker' => [
                    'enabled' => 'false',
                ],
                'enablemousetracking' => 'true'
            ],
            'candlestick' => [
                'linecolor' => '#404048',
            ],
            'scatter' => [
                'datalabels' => [
                    'enabled' => 'true'
                ],
            ],
        ])
        ->series(
            [
                [
                    'name'  => 'BB Lebih',
                    'data'  => $t_lebih,
                    'color' => '#f2f200'
                ],
                [
                    'name'  => 'BB Normal',
                    'data'  => $t_normal,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Kurang',
                    'data'  => $t_kurang,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Sangat Kurang',
                    'data'  => $t_s_kurang,
                    'color' => '#ff0000'
                ],
            ]
        )
        ->display();

        $cek_umur = DB::table('bayi_balita')->where('tempat_lahir', 0)->get();
        foreach ($cek_umur as $anak) {
            date_default_timezone_set('Asia/Jakarta');
            $now = Carbon::now()->format('Y-m-d'); // Tanggal sekarang
            $b_day = Carbon::parse($anak->tgl_lahir); // Tanggal Lahir
            $age = $b_day->diffInMonths($now);  // Menghitung umur
            if ($age >= 6) {
                $edit = BayiBalita::where('id_bb', $anak->id_bb);
                $edit->alama = 1;
            }
        }

   

            return view('dashboard.operator', compact('posyandu1','posyandu','kader','ibubayi','bidan','chart1'));
            
        } 
        elseif (Auth::user()->role == 'Bidan Desa') { // Role Bidan
          //  $bayiBalita = User::get();
            // $timbang = DB::table('timbang')
            //     ->count();
            //Bayi Balita
            $user = Auth::user();
            $data_user = User::where('id_posyandu', $user->id_posyandu)->where('role','Ibu Bayi')->pluck('id');
            // dd($data_user);
             $bayiBalita = BayiBalita::whereIn('id', $data_user)->get();
             //Timbang
            $timbang = Timbang::whereIn('id', $data_user)->get();
            //Kosultasi
            // $konsultasi = Konsultasi::get();
            $konsultasi = DB::table('konsultasi')
                ->where('solusi', NULL)
                ->count();
               //Grafik
        date_default_timezone_set('Asia/Jakarta');
        $nmm = Carbon::now()->format('m'); // Tanggal sekarang bulan
        $nY = Carbon::now()->format('Y'); // Tanggal sekarang tahun
        $nm = [1,2,3,4,5,6,7,8,9,10,11,12];
        $t_lebih=[];
        $t_normal=[];
        $t_kurang=[];
        $t_s_kurang=[];
        foreach ($nm as $nowM) {
            $g_lebih = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Lebih')
                ->count();

            $g_normal = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Normal')
                ->count();

            $g_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Kurang')
                ->count();

            $g_s_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Sangat Kurang')
                ->count();

            array_push($t_lebih, $g_lebih);
            array_push($t_normal, $g_normal);
            array_push($t_kurang, $g_kurang);
            array_push($t_s_kurang, $g_s_kurang);
        }
        ////

        // GRAFIK /////////////////
        $chart1 = Chart::title([
            'text' => 'Grafik Status Gizi Anak',
        ])
        ->chart([
            'type'     => 'column', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->colors([
            '#0c2959'
        ])
        ->xaxis([
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->yaxis([
            'title' => 'Jumlah',
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->legend([
            'enabled' => false
        ])
        ->plotoptions([
            'series' => [
                'label' => [
                    'connectorallowed' => 'false',
                ],
                'pointstart' => 0,
                'marker' => [
                    'enabled' => 'false',
                ],
                'enablemousetracking' => 'true'
            ],
            'candlestick' => [
                'linecolor' => '#404048',
            ],
            'scatter' => [
                'datalabels' => [
                    'enabled' => 'true'
                ],
            ],
        ])
        ->series(
            [
                [
                    'name'  => 'BB Lebih',
                    'data'  => $t_lebih,
                    'color' => '#f2f200'
                ],
                [
                    'name'  => 'BB Normal',
                    'data'  => $t_normal,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Kurang',
                    'data'  => $t_kurang,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Sangat Kurang',
                    'data'  => $t_s_kurang,
                    'color' => '#ff0000'
                ],
            ]
        )
        ->display();

        $cek_umur = DB::table('bayi_balita')->where('tempat_lahir', 0)->get();
        foreach ($cek_umur as $anak) {
            date_default_timezone_set('Asia/Jakarta');
            $now = Carbon::now()->format('Y-m-d'); // Tanggal sekarang
            $b_day = Carbon::parse($anak->tgl_lahir); // Tanggal Lahir
            $age = $b_day->diffInMonths($now);  // Menghitung umur
            if ($age >= 6) {
                $edit = BayiBalita::where('id_bb', $anak->id_bb);
                $edit->alama = 1;
            }
        }

            return view('dashboard.kaderBidan', compact('bayiBalita','timbang','konsultasi','chart1'));
        }
        elseif (Auth::user()->role == 'Kader') { // Role kader
            // $bayiBalita = BayiBalita::get();
            // // $timbang = DB::table('timbang')
            // //     ->count();
            // $timbang = Timbang::get();
            $user = Auth::user();
            $data_user = User::where('id_posyandu', $user->id_posyandu)->where('role','Ibu Bayi')->pluck('id');
            // dd($data_user);
             $bayiBalita = BayiBalita::whereIn('id', $data_user)->get();
             //Timbang
             $data_user2 = User::where('id_posyandu', $user->id_posyandu)->where('role','kader')->pluck('id');
        $timbang = Timbang::whereIn('id', $data_user2)->get();
            //Kosultasi
            // $konsultasi = Konsultasi::get();
            $konsultasi = DB::table('konsultasi')
            ->where('solusi', NULL)
                ->count();
               //Grafik
        date_default_timezone_set('Asia/Jakarta');
        $nmm = Carbon::now()->format('m'); // Tanggal sekarang bulan
        $nY = Carbon::now()->format('Y'); // Tanggal sekarang tahun
        $nm = [1,2,3,4,5,6,7,8,9,10,11,12];
        $t_lebih=[];
        $t_normal=[];
        $t_kurang=[];
        $t_s_kurang=[];
        foreach ($nm as $nowM) {
            $g_lebih = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Lebih')
                ->count();

            $g_normal = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Normal')
                ->count();

            $g_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Kurang')
                ->count();

            $g_s_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Sangat Kurang')
                ->count();

            array_push($t_lebih, $g_lebih);
            array_push($t_normal, $g_normal);
            array_push($t_kurang, $g_kurang);
            array_push($t_s_kurang, $g_s_kurang);
        }
        ////

        // GRAFIK /////////////////
        $chart1 = Chart::title([
            'text' => 'Grafik Status Gizi Anak',
        ])
        ->chart([
            'type'     => 'column', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->colors([
            '#0c2959'
        ])
        ->xaxis([
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->yaxis([
            'title' => 'Jumlah',
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->legend([
            'enabled' => false
        ])
        ->plotoptions([
            'series' => [
                'label' => [
                    'connectorallowed' => 'false',
                ],
                'pointstart' => 0,
                'marker' => [
                    'enabled' => 'false',
                ],
                'enablemousetracking' => 'true'
            ],
            'candlestick' => [
                'linecolor' => '#404048',
            ],
            'scatter' => [
                'datalabels' => [
                    'enabled' => 'true'
                ],
            ],
        ])
        ->series(
            [
                [
                    'name'  => 'BB Lebih',
                    'data'  => $t_lebih,
                    'color' => '#f2f200'
                ],
                [
                    'name'  => 'BB Normal',
                    'data'  => $t_normal,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Kurang',
                    'data'  => $t_kurang,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Sangat Kurang',
                    'data'  => $t_s_kurang,
                    'color' => '#ff0000'
                ],
            ]
        )
        ->display();

        $cek_umur = DB::table('bayi_balita')->where('tempat_lahir', 0)->get();
        foreach ($cek_umur as $anak) {
            date_default_timezone_set('Asia/Jakarta');
            $now = Carbon::now()->format('Y-m-d'); // Tanggal sekarang
            $b_day = Carbon::parse($anak->tgl_lahir); // Tanggal Lahir
            $age = $b_day->diffInMonths($now);  // Menghitung umur
            if ($age >= 6) {
                $edit = BayiBalita::where('id_bb', $anak->id_bb);
                $edit->alama = 1;
            }
        }

            return view('dashboard.kaderBidan', compact('bayiBalita','timbang','konsultasi','chart1'));
        }
        elseif (Auth::user()->role == 'Ibu Bayi') { // Role ibu bayi
            return redirect('hasilPerkembangan');
        }

    }
    
    public function dashboardOperator()
    {
        $posyandu1 = Posyandu::all();
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
            //Grafik
        date_default_timezone_set('Asia/Jakarta');
        $nmm = Carbon::now()->format('m'); // Tanggal sekarang bulan
        $nY = Carbon::now()->format('Y'); // Tanggal sekarang tahun
        $nm = [1,2,3,4,5,6,7,8,9,10,11,12];
        $t_lebih=[];
        $t_normal=[];
        $t_kurang=[];
        $t_s_kurang=[];
        foreach ($nm as $nowM) {
            $g_lebih = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Lebih')
                ->count();

            $g_normal = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Normal')
                ->count();

            $g_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Kurang')
                ->count();

            $g_s_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Sangat Kurang')
                ->count();

            array_push($t_lebih, $g_lebih);
            array_push($t_normal, $g_normal);
            array_push($t_kurang, $g_kurang);
            array_push($t_s_kurang, $g_s_kurang);
        }
        ////

        // GRAFIK /////////////////
        $chart1 = Chart::title([
            'text' => 'Grafik Status Gizi Anak',
        ])
        ->chart([
            'type'     => 'column', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->colors([
            '#0c2959'
        ])
        ->xaxis([
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->yaxis([
            'title' => 'Jumlah',
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->legend([
            'enabled' => false
        ])
        ->plotoptions([
            'series' => [
                'label' => [
                    'connectorallowed' => 'false',
                ],
                'pointstart' => 0,
                'marker' => [
                    'enabled' => 'false',
                ],
                'enablemousetracking' => 'true'
            ],
            'candlestick' => [
                'linecolor' => '#404048',
            ],
            'scatter' => [
                'datalabels' => [
                    'enabled' => 'true'
                ],
            ],
        ])
        ->series(
            [
                [
                    'name'  => 'BB Lebih',
                    'data'  => $t_lebih,
                    'color' => '#f2f200'
                ],
                [
                    'name'  => 'BB Normal',
                    'data'  => $t_normal,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Kurang',
                    'data'  => $t_kurang,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Sangat Kurang',
                    'data'  => $t_s_kurang,
                    'color' => '#ff0000'
                ],
            ]
        )
        ->display();

        $cek_umur = DB::table('bayi_balita')->where('tempat_lahir', 0)->get();
        foreach ($cek_umur as $anak) {
            date_default_timezone_set('Asia/Jakarta');
            $now = Carbon::now()->format('Y-m-d'); // Tanggal sekarang
            $b_day = Carbon::parse($anak->tgl_lahir); // Tanggal Lahir
            $age = $b_day->diffInMonths($now);  // Menghitung umur
            if ($age >= 6) {
                $edit = BayiBalita::where('id_bb', $anak->id_bb);
                $edit->alama = 1;
            }
        }

   

            return view('dashboard.operator', compact('posyandu1','posyandu','kader','ibubayi','bidan','chart1'));
    }

    public function dashboardKaderdanBidan()
    {
        // $bayiBalita = BayiBalita::get();
        //     // $timbang = DB::table('timbang')
        //     //     ->count();
        //     $timbang = Timbang::get();
        //Bayi Balita
        $user = Auth::user();
        $data_user = User::where('id_posyandu', $user->id_posyandu)->where('role','Ibu Bayi')->pluck('id');
        // dd($data_user);
         $bayiBalita = BayiBalita::whereIn('id', $data_user)->get();
         //Timbang
        $data_user2 = User::where('id_posyandu', $user->id_posyandu)->where('role','kader')->pluck('id');
        $timbang = Timbang::whereIn('id', $data_user2)->get();
        //dd($timbang);
            //Kosultasi
            // $konsultasi = Konsultasi::get();
            $konsultasi = DB::table('konsultasi')
                // ->where('solusi', '=', 'NULL')
                ->where('solusi', NULL)
                ->count();
               //Grafik
        date_default_timezone_set('Asia/Jakarta');
        $nmm = Carbon::now()->format('m'); // Tanggal sekarang bulan
        $nY = Carbon::now()->format('Y'); // Tanggal sekarang tahun
        $nm = [1,2,3,4,5,6,7,8,9,10,11,12];
        $t_lebih=[];
        $t_normal=[];
        $t_kurang=[];
        $t_s_kurang=[];
        foreach ($nm as $nowM) {
            $g_lebih = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Lebih')
                ->count();

            $g_normal = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Normal')
                ->count();

            $g_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Kurang')
                ->count();

            $g_s_kurang = DB::table('timbang')
                ->whereMonth('tgl_timbang', $nowM)
                ->whereYear('tgl_timbang', $nY)
                ->where('status_gizi', '=', 'BB Sangat Kurang')
                ->count();

            array_push($t_lebih, $g_lebih);
            array_push($t_normal, $g_normal);
            array_push($t_kurang, $g_kurang);
            array_push($t_s_kurang, $g_s_kurang);
        }
        ////

        // GRAFIK /////////////////
        $chart1 = Chart::title([
            'text' => 'Grafik Status Gizi Anak',
        ])
        ->chart([
            'type'     => 'column', // pie , columnt ect
            'renderTo' => 'chart1', // render the chart into your div with id
        ])
        ->colors([
            '#0c2959'
        ])
        ->xaxis([
            'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->yaxis([
            'title' => 'Jumlah',
            'labels'     => [
                'style' => [
                    'fontsize' => 12
                ],
            ],
            'gridlinewidth' => 1,
            'tickinterval' => 1
        ])
        ->legend([
            'enabled' => false
        ])
        ->plotoptions([
            'series' => [
                'label' => [
                    'connectorallowed' => 'false',
                ],
                'pointstart' => 0,
                'marker' => [
                    'enabled' => 'false',
                ],
                'enablemousetracking' => 'true'
            ],
            'candlestick' => [
                'linecolor' => '#404048',
            ],
            'scatter' => [
                'datalabels' => [
                    'enabled' => 'true'
                ],
            ],
        ])
        ->series(
            [
                [
                    'name'  => 'BB Lebih',
                    'data'  => $t_lebih,
                    'color' => '#f2f200'
                ],
                [
                    'name'  => 'BB Normal',
                    'data'  => $t_normal,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Kurang',
                    'data'  => $t_kurang,
                    'color' => '#39b500'
                ],
                [
                    'name'  => 'BB Sangat Kurang',
                    'data'  => $t_s_kurang,
                    'color' => '#ff0000'
                ],
            ]
        )
        ->display();

        $cek_umur = DB::table('bayi_balita')->where('tempat_lahir', 0)->get();
        foreach ($cek_umur as $anak) {
            date_default_timezone_set('Asia/Jakarta');
            $now = Carbon::now()->format('Y-m-d'); // Tanggal sekarang
            $b_day = Carbon::parse($anak->tgl_lahir); // Tanggal Lahir
            $age = $b_day->diffInMonths($now);  // Menghitung umur
            if ($age >= 6) {
                $edit = BayiBalita::where('id_bb', $anak->id_bb);
                $edit->alama = 1;
            }
        }

            return view('dashboard.kaderBidan', compact('bayiBalita','timbang','konsultasi','chart1'));
    }

    // public function tesdata()
    // {

    //     // $konsultasi = DB::table('konsultasi')
    //     //         ->where('role', '=', 'Kader')
    //     //         ->count();
    //     $konsultasi = Konsultasi::get();
    //    return view('layout.header', compact('konsultasi'));
    // }
}