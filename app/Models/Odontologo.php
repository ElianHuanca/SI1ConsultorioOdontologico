<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Odontologo extends Model
{
    use HasFactory; 
    protected $table="tabla_odontologo";
    use LogsActivity;
    protected static $logName = 'Odontólogo';
    // protected static $recordEvents = ['created','updated','deleted'];

    //protected static $ignoreChangedAttributes = [''];
    // protected static $logAttributes = ['nombre'];
    //protected static $logOnlyDirty = true;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
