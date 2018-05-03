<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    
	protected $fillable = ['id', 'anno', 'istituto', 'aula', 'sezione_id'];



	public function sezione()

	{

		return $this->belongsTo('App\Sezione');

	}

}
