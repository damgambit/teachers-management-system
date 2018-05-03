<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orario extends Model

{
    
    protected $fillable = [
    	'id', 
    	'giorno', 
    	'ora', 
    	'laboratorio',
    	'copresenza',
    	'classe_id', 
    	'docente_id', 
    	'materia_id'
    ];


    public function docente()

    {


    	return $this->belongsTo('App\Docente');


    }

}

