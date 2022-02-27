<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    public $table = "data_user";
    protected $fillable = ['id', 'posyandu_id', 'nama', 'email', 'password', 'role', 'photo', 'alamat', 'jenis_kelamin'];
    protected $primaryKey = 'id';

    public function posyandu()
    {
        return $this->belongsTo('App\Posyandu', 'posyandu_id');
    }
}
