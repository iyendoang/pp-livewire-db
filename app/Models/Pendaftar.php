<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $table = "pendaftar";

    public function jurusan(){
        return $this->belongsTo('App\Models\Jurusan', 'id_jurusan', 'id' );
    }

    public function periode(){
        return $this->belongsTo('App\Models\Periode', 'id_periode', 'id' );
    }
}
