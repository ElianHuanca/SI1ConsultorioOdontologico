<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
    
    
    protected $table="tabla_pago";
    protected $guarded=['id','created_at','updated_at'];
    //------------relacion uno a uno--------------
    public function plan(){
        return $this->belongsTo('App\Models\Plan');
    }
    public function atencion(){
        return $this->belongsTo('App\Models\Atencion');
    }
    //-------relacion uno a muchos
    public function Planpago(){
        return $this->hasMany('App\Models\Plan'); 
    }
}