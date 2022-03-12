<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisVaksinImunisasi extends Model
{
    public $table = "jenis_vaksin";
    protected $fillable = ['nama_vaksin'];
    protected $primaryKey = 'id_vaksin_imunisasi';
}
