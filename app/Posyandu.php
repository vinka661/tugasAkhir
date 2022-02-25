<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
{
    public $table = "posyandu";
    protected $fillable = ['nama_posyandu', 'alamat'];
    protected $primaryKey = 'id_posyandu';
}
