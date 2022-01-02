<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial extends Model
{
    use HasFactory;
    public function atencion(){
        return $this->belongsTo(atencion::class);
    }
    public function Paciente(){
        return $this->morphOne(Paciente::class,'Pacientes');
    }
}
