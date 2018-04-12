<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permesso extends Model
{
   	protected $fillable = [
   		'giorno',
   		'data',
   		'ora',
   		'recupero',
   		'motivo_id',
   		'docente_id'
   	];


   	public function docente()

   	{

   		return $this->belongsTo('App\Docente');

   	}


   	public function motivo()

   	{


   		return $this->belongsTo('App\Motivo');


   	}
}
