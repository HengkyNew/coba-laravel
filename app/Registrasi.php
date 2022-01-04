<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo('\app\Mahasiswa');
    }
    public function syarat()
    {
        return $this->belongsTo('\app\RegistrasiSyarat');
    }
    public function jurusan()
    {
        return $this->belongsTo('\app\Jurusan');
    }
}
