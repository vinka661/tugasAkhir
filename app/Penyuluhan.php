<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyuluhan extends Model
{
    public $table = "penyuluhan";
    protected $fillable = ['hari', 'materi', 'video', 'tanggal', 'id'];
    protected $primaryKey = 'id_penyuluhan';

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
