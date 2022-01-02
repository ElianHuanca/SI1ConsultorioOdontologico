<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table="tabla_factura";
    protected $guarded=['id','created_at','updated_at'];
    public function pago(){
        return $this->belongsTo('App\Models\Pago');
    }
}
