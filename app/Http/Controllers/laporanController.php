<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Posyandu;
use App\BayiBalita;
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
                    ->get();
        //dd($laporan);
       $setuju = false;
        // echo $laporan[0]->status;
        for($i=0; $i < count($laporan); $i++){
            if($laporan[$i]->status){
            $setuju = true;
            }else{
            $setuju = false;
            break;
            }
        }
      // echo $setuju;
        //dd($setuju);
        //return view('laporan.index')->with('laporan', $laporan);
    return view('laporan.index', compact('laporan','setuju'));
    }

    public function konfirmasi()
    {
        $laporan = DB::table('posyandu')
                    ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->join('timbang', 'timbang.id', '=', 'users.id')
                    ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
                    ->distinct()
                    ->get();
        for($i = 0; $i < count($laporan); $i++){
            $bayi_belita = BayiBalita::where('id_bb', $laporan[$i]->id_bb)->first();
            $bayi_belita->status = true;
            $bayi_belita->save();
        }
        
        return redirect('laporan')->with('success','laporan berhasil disetujui');
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
