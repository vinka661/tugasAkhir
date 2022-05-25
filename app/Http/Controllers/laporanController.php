<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Posyandu;
use Illuminate\Http\Request;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class laporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $laporan = DB::table('posyandu')
                    ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->join('timbang', 'timbang.id', '=', 'users.id')
                    ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
                    ->distinct()
                    ->get();
        return view('laporan.index')->with('laporan', $laporan);
    }

    public function cetak_pdf(){
        $laporan = DB::table('posyandu')
                    ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->join('timbang', 'timbang.id', '=', 'users.id')
                    ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
                    ->distinct()
                    ->get();
        $pdf = PDF::loadview('laporan.cetakPdf',['laporan'=>$laporan]);
        return $pdf->stream();
    }

    public function exportLaporan()
    {
        return Excel::download(new LaporanExport, 'posyandu.xlsx');
    }
}
