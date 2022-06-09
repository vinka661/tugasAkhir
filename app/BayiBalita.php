<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BayiBalita extends Model
{
    public $table = "bayi_balita";
    protected $fillable = ['nama_bayi', 'tgl_lahir', 'umur', 'tempat_lahir', 'nama_ibu' , 'nama_ayah', 'jk', 'id'];
    protected $primaryKey = 'id_bb';

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
    
    public function timbang()
    {
        return $this->hasMany('App\Timbang', 'id_timbang');
    }

    public function vitaminA()
    {
        return $this->hasMany('App\VitaminA');
    }

    public function imunisasi()
    {
        return $this->hasMany('App\Imunisasi');
    }
}
