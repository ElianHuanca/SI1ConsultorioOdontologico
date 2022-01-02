<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Paciente extends Model
{
    use HasFactory;
    protected $table="table__paciente";
   

  


    public function user(){
        return $this->belongsTo(User::class);
    }

    
   public function Servicio(){
    return $this->belongsToMany('App\Models\Servicio');
    }
    
}
