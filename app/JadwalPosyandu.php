<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalPosyandu extends Model
{
    public $table = "jadwal_posyandu";
    protected $fillable = ['hari', 'jam', 'tanggal', 'agenda', 'tempat', 'id_posyandu'];
    protected $primaryKey = 'id_jadwal';

    public function posyandu()
    {
        return $this->belongsTo('App\Posyandu', 'id_posyandu');
    }
}
