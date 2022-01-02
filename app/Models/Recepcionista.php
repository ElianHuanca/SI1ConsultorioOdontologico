<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Recepcionista extends Model
{


    protected $table="table_recepcionista";

    // protected static $ignoreChangedAttributes = ['password'];
    // protected static $logAttributes = ['name'];
    protected static $logOnlyDirty = true;
    use HasFactory;
}
