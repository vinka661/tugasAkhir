<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VitaminA extends Model
{
    public $table = "vitamin";
    protected $fillable = ['kapsul_vitaminA',  'tanggal_beri_vitaminA',  'id_bb'];
    protected $primaryKey = 'id_vitaminA';

    public function bayi_balita()
    {
        return $this->belongsTo('App\BayiBalita', 'id_bb');
    }
}
