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


		$classes = Classe::join('seziones', 'seziones.id', '=', 'classes.sezione_id')
							->where('sigla', '!=', 'RRR')
							->select('classes.id', 'anno', 'sigla')
							->orderBy('anno')
							->orderBy('sigla')
							->get();

		return ['docentes' => $docentes, 'classes' => $classes];

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


    public static function show_data($request)

    {

    	$giornos = ['lun', 'mar', 'mer', 'gio', 'ven'];
		$oras = [1,2,3,4,5,6,7];
		$classe = Classe::join('seziones', 'seziones.id', '=', 'classes.sezione_id')
						 ->where('classes.id', $request->classe_id)
						 ->get()[0];

		$orarios = [];

		foreach($oras as $ora) {

			$orarios[$ora] = Orario::where('classe_id', $request->classe_id)
									->join('docentes', 'docentes.id', '=', 'orarios.docente_id')
									->join('materias', 'materias.id', '=', 'orarios.materia_id')
									->select('orarios.id as orario_id', 
											 'docentes.id as docente_id',
											 'materias.id as materia_id',
											 'ora',
											 'giorno',
											 'docentes.nome as docente_nome',
											 'docentes.cognome as docente_cognome',
											 'materias.nome as materia_nome')
									->where('ora', $ora)
									->orderBy('ora')
									->get();

		}


		return ['classe' => $classe, 'giornos' => $giornos, 'oras' => $oras, 'orarios' => $orarios];

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