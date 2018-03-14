<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    
	protected $fillable = [
		'nome', 
		'cognome', 
		'cellulare', 
		'email', 
		'classi_concorso_id'
	];


	public function classe_concorso()

	{

		return $this->belongsTo('App\ClassiConcorso');

	}


	public function permessi()

	{

		return $this->hasMany('App\Permessi');

	}


}
