<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    public $table = "konsultasi";
    protected $fillable = ['kosul', 'solusi', 'id'];
    protected $primaryKey = 'id_kosultasi';

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
