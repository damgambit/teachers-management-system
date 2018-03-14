<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassiConcorso extends Model
{

    protected $fillable = [ 'sigla' ];


    public function hasMany()

    {


    	return $this->hasMany('App\Docente');


    }

}
