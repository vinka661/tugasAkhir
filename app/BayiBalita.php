<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BayiBalita extends Model
{
    public $table = "bayi_balita";
    protected $fillable = ['nama_bayi', 'ttl', 'umur', 'alamat', 'nama_ibu', 'nama_ayah', 'jenis_kelamin'];
    protected $primaryKey = 'id_bb';

    public function timbang()
    {
        return $this->hasMany('App\Timbang');
    }
}
