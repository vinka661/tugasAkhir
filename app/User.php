<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 'name', 'email', 'password', 'role', 'photo', 'alamat', 'jenis_kelamin', 'id_posyandu',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posyandu()
    {
        return $this->belongsTo('App\Posyandu', 'id_posyandu');
    }

    public function timbang()
    {
        return $this->hasMany('App\Timbang', 'id_timbang');
    }

    public function penyuluhan()
    {
        return $this->hasMany('App\Penyuluhan');
    }

    public function konsultasi()
    {
        return $this->hasMany('App\Konsultasi');
    }

    public function bayi_balita()
    {
        return $this->hasMany('App\BayiBalita', 'id_bb');
    }

    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "assets/images/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result =url('assets/images').'/'.$tmp_file_name;
            // }
        return $result;
     }
}
