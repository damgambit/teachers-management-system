<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sostituzione extends Model
{
    
	protected $fillable = ['docente_id', 'orario_id', 'date'];

}
