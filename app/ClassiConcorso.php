<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Materia;

class ClassiConcorso extends Model
{

    protected $fillable = [ 'sigla' ];


    public function docentes()

    {


    	return $this->hasMany('App\Docente');


    }


    public function materias()

    {

    	return $this->belongsToMany(Materia::class, 'classic_materia', 'classi_concorso_id', 'materia_id');

    }

}
