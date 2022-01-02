<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table="tabla_reserva";

    protected $guarded=['id','created_at','updated_at'];
    public function odontologo(){
        return $this->belongsTo('App\Models\Odontologo');
    }
    public function paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
    public function estadoRes(){
        return $this->belongsTo('App\Models\EstadoRes');

    }    //-------------Relacion de muchos a muchos  --------

    public function Servicio(){
        return $this->belongsToMany('App\Models\Servicio');

    }
    public function atencion(){
        return $this->belongsToMany('App\Models\atencion');

    }

}
