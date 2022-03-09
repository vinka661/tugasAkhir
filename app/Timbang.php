<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timbang extends Model
{
    public $table = "timbang";
    protected $fillable = ['tgl_timbang', 'berat_badan', 'tinggi_badan', 'lingkar_kepala', 'status_gizi', 'id', 'id_bb'];
    protected $primaryKey = 'id_timbang';

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function bayi_balita()
    {
        return $this->belongsTo('App\BayiBalita', 'id_bb');
    }
}
