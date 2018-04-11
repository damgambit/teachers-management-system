<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\ClassiConcorso;

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

		return ClassiConcorso::where(['id' => $this->classi_concorso_id]);

	}


	public function permessi()

	{

		return $this->hasMany('App\Permessi');

	}


}
