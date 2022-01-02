<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estadotratamiento extends Model
{
    use HasFactory;

    protected $table="tabla_estado_tra";

    public function Tratamientos(){
        return $this->hasMany('App\Models\Tratamiento');
    }
}
