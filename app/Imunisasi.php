<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imunisasi extends Model
{
    public $table = "imunisasi";
    protected $fillable = ['tanggal_beri_imunisasi', 'id_bb', 'id_vaksin_imunisasi'];
    protected $primaryKey = 'id_imunisasi';

    public function bayi_balita()
    {
        return $this->belongsTo('App\BayiBalita', 'id_bb');
    }

    public function jenis_vaksin()
    {
        return $this->belongsTo('App\JenisVaksinImunisasi', 'id_vaksin_imunisasi');
    }
}
