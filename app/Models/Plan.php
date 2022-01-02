<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table="tabla_plan_pago";
    protected $guarded=['id','created_at','updated_at'];
    
    
   
    //relacion uno a uno  vicevesa----------

    public function Tratamiento(){
        return $this->belongsTo('App\Models\Tratamiento');
    }
    //relacion uno a muchos viceversa  
    public function Pagos(){
        return $this->belongsTo('App\Models\Pago');
    }

}
