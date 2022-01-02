<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atencion extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion','fecha','hora'];

    public function historial(){
        return $this->hasMany(historial::class);
    }
    public function pago()
    {
        return  $this->hasMany('App\Models\Pago');
    }
    public function reserva(){
        return $this->belongsTo('App\Models\Reserva');
    }

}
