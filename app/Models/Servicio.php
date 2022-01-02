<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table="servicios";

    protected $fillable = ['id','descripcion','precio','duracionAproximada','estado'];
    //relacion muchos a muchos ----------------------
    public function Reserva(){
       return $this->belongsToMany('App\Models\Reserva');
   }
//relacion mucho a muchos
   public function Paciente(){
       return $this->belongsToMany('App\Models\Paciente');
   }
}
