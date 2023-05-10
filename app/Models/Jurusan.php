<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";
    protected $fillable = ['nama_jurusan', 'singkatan'];

    public function pendaftar(){
        return $this->hasMany('App\Models\Pendaftar', 'id_jurusan', 'id' );
    }
}
