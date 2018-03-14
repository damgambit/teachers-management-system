<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivo extends Model

{


    protected $fillable = ['descrizione'];




    public function permessi()

    {

    	return $this->hasMany('App\Permessi');

    }


}
