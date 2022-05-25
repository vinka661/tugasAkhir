<?php

namespace App\Exports;

use App\Posyandu;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('laporan.cetakExcel', [
            'laporan' => DB::table('posyandu')
                        ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                        ->join('timbang', 'timbang.id', '=', 'users.id')
                        ->join('bayi_balita', 'bayi_balita.id_bb', '=', 'timbang.id_bb')
                        ->distinct()
                        ->get()
        ]);
    }
}
