<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $table="tabla_tratamiento";
    protected $guarded=['id','created_at','updated_at'];
  
   /*relacion uno a muchos */
   public function estadoTratamiento(){
        return $this->belongsTo('App\Models\Estadotratamiento');
    }
    public function Paciente(){
        return $this->belongsTo('App\Models\Paciente');
    }
    public function Odontologo(){
        return $this->belongsTo('App\Models\Odontologo');
    }
    
    /*relacion uno a uno  */
    public function Planpagos(){
        return $this->hasOne('App\Models\Plan');
    }

}
