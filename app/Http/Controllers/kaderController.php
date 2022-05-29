<?php

namespace App\Http\Controllers;
use App\User;
use App\Posyandu;
use App\Timbang;
use App\BayiBalita;
use App\Penyuluhan;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class kaderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kader = DB::table('posyandu')
                    ->join('users', 'users.id_posyandu', '=', 'posyandu.id_posyandu')
                    ->where('users.role', '=', 'Kader')
                    ->get();
        return view('operator.kader.index')->with('kader', $kader);
    }

    public function edit($id)
    {
        $kader = User::find($id);
        $posyandu = Posyandu::all();
        return view('operator.kader.edit', ['kader' => $kader, 'posyandu' => $posyandu]);
    }

    public function update(Request $request, $id)
    {
        $kader = User::find($id);
        $kader->name = $request->name;
        $kader->jenis_kelamin = $request->jenis_kelamin;
        $kader->alamat = $request->alamat;
        $kader->id_posyandu = $request->posyandu;
        $kader->save();
        return redirect('kader')->with('success','Data kader berhasil diedit');
    }

    public function destroy($id)
    {
        $kader = User::find($id);
        $kader->delete();
        return redirect('kader')->with('success','Data kader berhasil dihapus');
    }

// Data bayi dan data timbang 
    public function bayiTimbangIndex()
    {
        $bayiBalita = BayiBalita::all();
        return view('kader.timbang.index', ['bayiBalita' => $bayiBalita]);
    }

    public function createBB()
    {
        $bayiBalita = BayiBalita::all();
        return view('kader.timbang.createBB', ['bayiBalita' => $bayiBalita]);
    }

    public function storeBB(Request $request)
    {
        $now = Carbon::now();
        $b_day = Carbon::parse($request->ttl);
        $age = $b_day->diffInMonths($now);
        BayiBalita::create([
            'nama_bayi' => $request->nama_bayi,
            'ttl' => $request->ttl,
            'jk' => $request->jenis_kelamin,
            'umur' => $age,
            'alamat' => $request->alamat,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
        ]);
        return redirect('timbangbayiBalita')->with('success','Data bayi/balita berhasil ditambahkan');
    }

    public function editBB($id_bb)
    {
        $bayiBalita = BayiBalita::find($id_bb);
        return view('kader.timbang.editBB', ['bayiBalita' => $bayiBalita]);
    }

    public function updateBB(Request $request, $id_bb)
    {
        $now = Carbon::now();
        $b_day = Carbon::parse($request->ttl);
        $age = $b_day->diffInMonths($now);
        $bayiBalita = BayiBalita::find($id_bb);
        $bayiBalita->nama_bayi = $request->nama_bayi;
        $bayiBalita->ttl = $request->ttl;
        $bayiBalita->jk = $request->jenis_kelamin;
        $bayiBalita->umur = $age;
        $bayiBalita->alamat = $request->alamat;
        $bayiBalita->nama_ibu = $request->nama_ibu;
        $bayiBalita->nama_ayah = $request->nama_ayah;
        $bayiBalita->save();
        return redirect('timbangbayiBalita')->with('success','Data bayi/balita berhasil diedit');
    }

    public function destroyBB($id_bb)
    {
        $bayiBalita = BayiBalita::find($id_bb);
        $bayiBalita->delete();
        return redirect('timbangbayiBalita')->with('success','Data bayi/balita berhasil dihapus');
    }

    public function detailTimbangBayi($id_bb)
    {
        $bayiBalita = BayiBalita::find($id_bb);
        $timbang = Timbang::where('id_bb', '=', $id_bb)->get();
        // $timbang = DB::table('users')
        //                     ->join('bayi_balita', 'bayi_balita.id', '=', 'users.id')
        //                     ->join('timbang', 'timbang.id_bb', '=', 'bayi_balita.id_bb')
        //                     ->select('bayi_balita.nama_bayi')
        //                     ->where('users.id', $id)
        //                     ->where('bayi_balita.id_bb', $id_bb)
        //                     ->distinct()
        //                     ->get();
        return view('kader.timbang.detail', compact('bayiBalita', 'timbang'));
    }


    public function createTimbang($id_bb, $id)
    {
        $bayiBalita = BayiBalita::find($id_bb);
        $timbang = DB::table('users')
                    ->join('bayi_balita', 'bayi_balita.id', '=', 'users.id')
                    ->join('timbang', 'timbang.id_bb', '=', 'bayi_balita.id_bb')
                    ->where('bayi_balita.id_bb', $id_bb)
                    ->where('users.id', $id)
                    ->distinct()
                    ->get();
        return view('kader.timbang.create', compact('bayiBalita', 'timbang'));
    }

    public function storeTimbang(Request $request)
    {
        $id_bb = $request->get('id_bb');
        $bayi = BayiBalita::find($id_bb);
        $timbang = Timbang::all();
        $jk = $bayi->jk;
        $umur = $bayi->umur;
        $bb = $request->berat_badan;
       if ($jk == "Perempuan") {
        if ($umur <= 1) {
            if ($bb < 2.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 2.8 && $bb < 3.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 3.1 && $bb < 5.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 2) {
            if ($bb < 3.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 3.4 && $bb < 3.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 3.9 && $bb < 6.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 3) {
            if ($bb < 4.0) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 4.0 && $bb < 4.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 4.5 && $bb < 7.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 4) {
            if ($bb < 4.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 4.4 && $bb < 5.0) {
                $q = "BB Kurang";
            } elseif ($bb >= 5.0 && $bb < 8.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 5) {
            if ($bb < 4.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 4.8 && $bb < 5.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 5.4 && $bb < 8.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 6) {
            if ($bb < 5.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 5.1 && $bb < 5.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 5.7 && $bb < 9.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 7) {
            if ($bb < 5.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 5.3 && $bb < 6) {
                $q = "BB Kurang";
            } elseif ($bb >= 6 && $bb < 9.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 8) {
            if ($bb < 5.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 5.6 && $bb < 6.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 6.2 && $bb < 10.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 9) {
            if ($bb < 5.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 5.8 && $bb < 6.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 6.5 && $bb < 10.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 10) {
            if ($bb < 6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6 && $bb < 6.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 6.7 && $bb < 10.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 11) {
            if ($bb < 6.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.1 && $bb < 6.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 6.9 && $bb < 11.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 12) {
            if ($bb < 6.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.3 && $bb < 7) {
                $q = "BB Kurang";
            } elseif ($bb >= 7 && $bb < 11.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 13) {
            if ($bb < 6.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.4 && $bb < 7.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.2 && $bb < 11.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 14) {
            if ($bb < 6.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.6 && $bb < 7.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.4 && $bb < 12.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 15) {
            if ($bb < 6.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.8 && $bb < 7.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.6 && $bb < 12.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 16) {
            if ($bb < 6.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.9 && $bb < 7.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.7 && $bb < 12.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 17) {
            if ($bb < 7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7 && $bb < 7.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.9 && $bb < 12.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 18) {
            if ($bb < 7.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.2 && $bb < 8.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.1 && $bb < 13.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 19) {
            if ($bb < 7.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.3 && $bb < 8.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.2 && $bb < 13.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 20) {
            if ($bb < 7.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.5 && $bb < 8.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.4 && $bb < 13.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 21) {
            if ($bb < 7.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.6 && $bb < 8.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.6 && $bb < 14) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 22) {
            if ($bb < 7.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.8 && $bb < 8.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.7 && $bb < 14.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 23) {
            if ($bb < 7.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.9 && $bb < 8.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.9 && $bb < 14.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 24) {
            if ($bb < 8.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.1 && $bb < 9) {
                $q = "BB Kurang";
            } elseif ($bb >= 9 && $bb < 14.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 25) {
            if ($bb < 8.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.2 && $bb < 9.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.2 && $bb < 15.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 26) {
            if ($bb < 8.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.3 && $bb < 9.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.3 && $bb < 15.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 27) {
            if ($bb < 8.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.5 && $bb < 9.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.5 && $bb < 15.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 28) {
            if ($bb < 8.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.6 && $bb < 9.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.7 && $bb < 16) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 29) {
            if ($bb < 8.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.8 && $bb < 9.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.8 && $bb < 16.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 30) {
            if ($bb < 8.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.9 && $bb < 10) {
                $q = "BB Kurang";
            } elseif ($bb >= 10 && $bb < 16.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 31) {
            if ($bb < 9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9 && $bb < 10.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.1 && $bb < 16.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 32) {
            if ($bb < 9.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.1 && $bb < 10.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.3 && $bb < 17) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 33) {
            if ($bb < 9.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.2 && $bb < 10.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.4 && $bb < 17.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 34) {
            if ($bb < 9.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.4 && $bb < 10.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.5 && $bb < 17.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 35) {
            if ($bb < 9.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.5 && $bb < 10.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.7 && $bb < 17.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 36) {
            if ($bb < 9.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.6 && $bb < 10.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.8 && $bb < 18.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 37) {
            if ($bb < 9.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.7 && $bb < 10.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.9 && $bb < 18.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 38) {
            if ($bb < 9.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.8 && $bb < 11.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.1 && $bb < 18.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 39) {
            if ($bb < 10) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10 && $bb < 11.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.2 && $bb < 19) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 40) {
            if ($bb < 10.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.1 && $bb < 11.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.3 && $bb < 19.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 41) {
            if ($bb < 10.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.2 && $bb < 11.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.4 && $bb < 19.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 42) {
            if ($bb < 10.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.3 && $bb < 11.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.6 && $bb < 19.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 43) {
            if ($bb < 10.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.4 && $bb < 11.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.7 && $bb < 20.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 44) {
            if ($bb < 10.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.5 && $bb < 11.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.8 && $bb < 20.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 45) {
            if ($bb < 10.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.6 && $bb < 12) {
                $q = "BB Kurang";
            } elseif ($bb >= 12 && $bb < 20.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 46) {
            if ($bb < 10.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.7 && $bb < 12.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.1 && $bb < 20.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 47) {
            if ($bb < 10.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.8 && $bb < 12.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.4 && $bb < 21.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 48) {
            if ($bb < 10.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.9 && $bb < 12.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.3 && $bb < 21.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 49) {
            if ($bb < 11) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11 && $bb < 12.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.4 && $bb < 21.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 50) {
            if ($bb < 11.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.1 && $bb < 12.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.6 && $bb < 22.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 51) {
            if ($bb < 11.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.2 && $bb < 12.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.7 && $bb < 22.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 52) {
            if ($bb < 11.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.3 && $bb < 12.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.8 && $bb < 22.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 53) {
            if ($bb < 11.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.4 && $bb < 12.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.9 && $bb < 22.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 54) {
            if ($bb < 11.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.5 && $bb < 13) {
                $q = "BB Kurang";
            } elseif ($bb >= 13 && $bb < 23.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 55) {
            if ($bb < 11.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.6 && $bb < 13.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.2 && $bb < 23.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 56) {
            if ($bb < 11.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.7 && $bb < 13.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.3 && $bb < 23.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 57) {
            if ($bb < 11.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.8 && $bb < 13.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.4 && $bb < 24.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 58) {
            if ($bb < 11.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.9 && $bb < 13.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.5 && $bb < 24.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 59) {
            if ($bb < 12) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 12 && $bb < 13.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.6 && $bb < 24.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 60) {
            if ($bb < 12.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 12.1 && $bb < 13.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.7 && $bb < 24.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } else {
            "Bayi Lulus";
        }
    } else {
        if ($umur <= 1) {
            if ($bb < 2.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 2.9 && $bb < 3.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 3.4 && $bb < 5.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 2) {
            if ($bb < 3.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 3.8 && $bb < 4.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 4.3 && $bb < 7.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 3) {
            if ($bb < 4.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 4.4 && $bb < 5) {
                $q = "BB Kurang";
            } elseif ($bb >= 5 && $bb < 8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 4) {
            if ($bb < 4.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 4.9 && $bb < 5.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 5.5 && $bb < 8.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 5) {
            if ($bb < 5.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 5.3 && $bb < 6) {
                $q = "BB Kurang";
            } elseif ($bb >= 6 && $bb < 9.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 6) {
            if ($bb < 5.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 5.7 && $bb < 6.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 6.3 && $bb < 9.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 7) {
            if ($bb < 5.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 5.9 && $bb < 6.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 6.7 && $bb < 10.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 8) {
            if ($bb < 6.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.2 && $bb < 6.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 6.9 && $bb < 10.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 9) {
            if ($bb < 6.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.4 && $bb < 7.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.1 && $bb < 11) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 10) {
            if ($bb < 6.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.6 && $bb < 7.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.3 && $bb < 11.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 11) {
            if ($bb < 6.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.8 && $bb < 7.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.6 && $bb < 11.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 12) {
            if ($bb < 6.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 6.9 && $bb < 7.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.7 && $bb < 12) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 13) {
            if ($bb < 7.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.1 && $bb < 7.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 7.9 && $bb < 12.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 14) {
            if ($bb < 7.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.3 && $bb < 8.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.1 && $bb < 12.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 15) {
            if ($bb < 7.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.4 && $bb < 8.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.3 && $bb < 12.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 16) {
            if ($bb < 7.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.6 && $bb < 8.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.4 && $bb < 13.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 17) {
            if ($bb < 7.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.7 && $bb < 8.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.6 && $bb < 13.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 18) {
            if ($bb < 7.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 7.8 && $bb < 8.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.8 && $bb < 13.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 19) {
            if ($bb < 8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8 && $bb < 8.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 8.9 && $bb < 13.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 20) {
            if ($bb < 8.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.1 && $bb < 9.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.1 && $bb < 14.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 21) {
            if ($bb < 8.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.2 && $bb < 9.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.2 && $bb < 14.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 22) {
            if ($bb < 8.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.4 && $bb < 9.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.4 && $bb < 14.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 23) {
            if ($bb < 8.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.5 && $bb < 9.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.5 && $bb < 15) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 24) {
            if ($bb < 8.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.6 && $bb < 9.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.7 && $bb < 15.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 25) {
            if ($bb < 8.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.8 && $bb < 9.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 9.8 && $bb < 15.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 26) {
            if ($bb < 8.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 8.9 && $bb < 10) {
                $q = "BB Kurang";
            } elseif ($bb >= 10 && $bb < 15.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 27) {
            if ($bb < 9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9 && $bb < 10.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.1 && $bb < 16.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 28) {
            if ($bb < 9.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.1 && $bb < 10.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.2 && $bb < 16.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 29) {
            if ($bb < 9.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.2 && $bb < 10.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.4 && $bb < 16.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 30) {
            if ($bb < 9.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.4 && $bb < 10.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.5 && $bb < 16.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 31) {
            if ($bb < 9.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.5 && $bb < 10.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.6 && $bb < 17.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 32) {
            if ($bb < 9.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.6 && $bb < 10.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.8 && $bb < 17.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 33) {
            if ($bb < 9.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.7 && $bb < 10.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 10.9 && $bb < 17.6) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 34) {
            if ($bb < 9.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.8 && $bb < 11) {
                $q = "BB Kurang";
            } elseif ($bb >= 11 && $bb < 17.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 35) {
            if ($bb < 9.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 9.9 && $bb < 11.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.2 && $bb < 18.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 36) {
            if ($bb < 10) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10 && $bb < 11.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.3 && $bb < 18.3) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 37) {
            if ($bb < 10.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.1 && $bb < 11.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.4 && $bb < 18.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 38) {
            if ($bb < 10.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.2 && $bb < 11.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.5 && $bb < 18.8) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 39) {
            if ($bb < 10.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.3 && $bb < 11.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.7 && $bb < 19) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 40) {
            if ($bb < 10.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.4 && $bb < 11.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.8 && $bb < 19.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 41) {
            if ($bb < 10.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.5 && $bb < 11.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 11.9 && $bb < 19.5) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 42) {
            if ($bb < 10.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.6 && $bb < 12) {
                $q = "BB Kurang";
            } elseif ($bb >= 12 && $bb < 19.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 43) {
            if ($bb < 10.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.7 && $bb < 12.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.1 && $bb < 20) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 44) {
            if ($bb < 10.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.8 && $bb < 12.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.2 && $bb < 20.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 45) {
            if ($bb < 10.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 10.9 && $bb < 12.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.4 && $bb < 20.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 46) {
            if ($bb < 11) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11 && $bb < 12.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.5 && $bb < 20.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 47) {
            if ($bb < 11.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.1 && $bb < 12.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.6 && $bb < 21) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 48) {
            if ($bb < 11.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.2 && $bb < 12.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.7 && $bb < 21.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 49) {
            if ($bb < 11.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.3 && $bb < 12.8) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.8 && $bb < 21.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 50) {
            if ($bb < 11.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.4 && $bb < 12.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 12.9 && $bb < 21.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 51) {
            if ($bb < 11.5) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.5 && $bb < 13) {
                $q = "BB Kurang";
            } elseif ($bb >= 13 && $bb < 21.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 52) {
            if ($bb < 11.6) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.6 && $bb < 13.2) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.2 && $bb < 22.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 53) {
            if ($bb < 11.7) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.7 && $bb < 13.3) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.3 && $bb < 22.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 54) {
            if ($bb < 11.8) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.8 && $bb < 13.4) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.4 && $bb < 22.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 55) {
            if ($bb < 11.9) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 11.9 && $bb < 13.5) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.5 && $bb < 22.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 56) {
            if ($bb < 12) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 12 && $bb < 13.6) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.6 && $bb < 23.2) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 57) {
            if ($bb < 12.1) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 12.1 && $bb < 13.7) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.7 && $bb < 23.4) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 58) {
            if ($bb < 12.2) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 12.2 && $bb < 13.9) {
                $q = "BB Kurang";
            } elseif ($bb >= 13.9 && $bb < 23.7) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 59) {
            if ($bb < 12.3) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 12.3 && $bb < 14) {
                $q = "BB Kurang";
            } elseif ($bb >= 14 && $bb < 23.9) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } elseif ($umur == 60) {
            if ($bb < 12.4) {
                $q = "BB Sangat Kurang";
            } elseif ($bb >= 12.4 && $bb < 14.1) {
                $q = "BB Kurang";
            } elseif ($bb >= 14.1 && $bb < 24.1) {
                $q = "BB Normal";
            } else {
                $q = "BB Lebih";
            }
        } else {
            "Bayi Lulus";
        }
    }
        Timbang::create([
            'id' => $request->id,
            'id_bb' => $id_bb,
            'tgl_timbang' => $request->tgl_timbang,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'lingkar_kepala' => $request->lingkar_kepala,
            'status_gizi' => $q,
            
        ]);
        return redirect()->route('detailTimbangBayi', ['id_bb' => $id_bb])->with('success','Data Timbang BayiBalita Berhasil Ditambahkan');
    }

    public function editTimbang($id_timbang)
    {
        $timbang = Timbang::find($id_timbang);
        $bayiBalita = BayiBalita::all();
        // $user = User::all();
        $user = User::where('role', 'Kader')->get();
        return view('kader.timbang.edit', ['timbang' => $timbang, 'bayiBalita' => $bayiBalita, 'user' => $user]);
    }

    public function updateTimbang(Request $request, $id_timbang)
    {
        $timbang = Timbang::find($id_timbang);
        $timbang->id = $request->id;
        $timbang->id_bb = $request->id_bb;
        $timbang->tgl_timbang = $request->tgl_timbang;
        $timbang->berat_badan = $request->berat_badan;
        $timbang->lingkar_kepala = $request->lingkar_kepala;
        $timbang->status_gizi = $request->status_gizi;
        $timbang->save();
        return redirect()->route('detailTimbangBayi', ['id_bb' => $request->id_bb])->with('success','Data Timbang Berhasil Diedit');
    }

    public function destroyTimbang($id)
    {
        $timbang = Timbang::find($id);
        $bayiBalita = BayiBalita::all();
        $timbang->delete();
        return redirect()->route('detailTimbangBayi', ['id_bb' => $timbang->id_bb])->with('success','Data Timbang Berhasil Dihapus');
    }

    public function timbang()
    {
        $timbang = Timbang::all();
        return view('kader.timbang.index', ['timbang' => $timbang]);
    }

    public function penyuluhanKader()
    {
        // $penyuluhanKader = Penyuluhan::all();
        $penyuluhanKader = Penyuluhan::with('user')->where('video', NULL)->get();
        return view('kader.penyuluhan.index', ['penyuluhanKader' => $penyuluhanKader]);
    }

    public function UploadMateriPenyuluhan($id_penyuluhan)
    {
        $penyuluhan = Penyuluhan::find($id_penyuluhan);
        $kader = User::where('role', 'Kader')->get();
        return view('kader.penyuluhan.upload', ['penyuluhan' => $penyuluhan, 'kader' => $kader]);
    }

    public function updateMateriPenyuluhan(Request $request, $id_penyuluhan)
    {
        $penyuluhan = Penyuluhan::find($id_penyuluhan);
        $penyuluhan->id = $request->kader;
        $penyuluhan->hari = $request->hari;
        $penyuluhan->tanggal = $request->tanggal;
        $penyuluhan->materi = $request->materi;
        $penyuluhan->save();
        return redirect('penyuluhan')->with('success','Jadwal penyuluhan berhasil diedit');
    }

    public function uploadVideo(Request $request,$id_penyuluhan)
   {
      $penyuluhan = Penyuluhan::find($id_penyuluhan);
      $penyuluhan->video = $request->video;
      $penyuluhan->save();
      return redirect('penyuluhanKader')->with('success','Link video materi penyuluhan berhasil ditambahkan');
        
  }
}
