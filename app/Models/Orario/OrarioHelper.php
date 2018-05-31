<?php

namespace App\Models\Orario;


use App\Docente;
use App\Orario;
use App\Classe;
use App\Materia;

/**
 * OrarioHelper
 */
trait OrarioHelper
{
    /**
     * 
     */
    public static function index_data()
    {
        
    	$docentes = Docente::orderBy('cognome')
							->where('docentes.nome', '!=', 'uscita_anticipata')
                            ->where('docentes.nome', '!=', 'entrata_posticipata')
							->get();

		return ['docentes' => $docentes];

    }



    public static function create_data($request = false, $docente_id = false)

    {
    	if(!$docente_id) {

    	    $docente_id = $request->docente_id;

    	}

		$orarios = Orario::where('docente_id', $docente_id)
							->join('classes', 'orarios.classe_id', '=', 'classes.id')
							->join('seziones', 'classes.sezione_id', '=', 'seziones.id')
							->select('orarios.*', 'classes.anno', 'classes.sezione_id', 'seziones.sigla')
							->orderBy('giorno')->get();

		$docente =  Docente::where('id', $docente_id)->get()[0];
		$classes = Classe::with('sezione')->get();


		$materias = Materia::all();


		return [
			'orarios' => $orarios, 
			'docente' => $docente,
			'classes' => $classes,
			'materias' => $materias
		];
    }





    public static function handle_add($giorno, $ora, $request)

    {

    	$orario = Orario::create([
			'giorno' => $giorno,
			'ora' => $ora,
			'laboratorio' => 'no',
			'copresenza' => 0,
			'classe_id' => $request->classe,
			'docente_id' => $request->docente_id,
			'materia_id' => $request->materia
		]);


		return $orario;


    }
}