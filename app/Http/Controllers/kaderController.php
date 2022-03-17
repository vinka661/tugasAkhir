<?php

namespace App\Http\Controllers;
use App\User;
use App\Posyandu;
use App\Timbang;
use App\BayiBalita;
use App\Penyuluhan;
use Illuminate\Http\Request;

class kaderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kader = User::where('role', 'Kader')->get();
        return view('operator.kader.index', ['kader' => $kader]);
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

    public function timbang()
    {
        $timbang = Timbang::all();
        return view('kader.timbang.index', ['timbang' => $timbang]);
    }

    public function penyuluhanKader()
    {
        $penyuluhanKader = Penyuluhan::all();
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
      $this->validate($request, [
         'title' => 'required|string|max:255',
         'video' => 'required|file|mimetypes:video/mp4',
        ]);
        $video = new Video;
        $video->title = $request->title;
        if ($request->hasFile('video'))
        {
            $path = $request->file('video')->store('videos', ['disk' =>      'my_files']);
            $video->video = $path;
        }
        $video->save();
        
  }
}
