<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Docente;
use App\Classe;
use App\Orario;
use App\Materia;

class OrarioController extends Controller

{
    

	public function index()

	{

		$docentes = Docente::all();


		return view('orari.index', ['docentes' => $docentes]);

	}



	public function create_orario_doc(Request $request) 

	{

		$docente_id = $request->docente_id;


		$orarios = Orario::where('docente_id', $docente_id)->orderBy('giorno')->get();

		$docente =  Docente::where('id', $docente_id)->get()[0];
		$classes = Classe::with('sezione')->get();


		//$materias = $docente->classe_concorso()->first()->materias()->get();
		$materias = Materia::all();
		

		return view('orari.create_orario_doc', [
			'orarios' => $orarios, 
			'docente' => $docente,
			'classes' => $classes,
			'materias' => $materias
		]);

	}


	public function create_orario_doc_add($giorno, $ora, Request $request)

	{

		$orario = Orario::create([
			'giorno' => $giorno,
			'ora' => $ora,
			'laboratorio' => 'no',
			'copresenza' => 0,
			'classe_id' => $request->classe,
			'docente_id' => $request->docente,
			'materia_id' => $request->materia
		]);


		$docente_id = $request->docente;


		$orarios = Orario::where('docente_id', $docente_id)->orderBy('giorno')->get();

		$docente =  Docente::where('id', $docente_id)->get()[0];
		$classes = Classe::with('sezione')->get();

		//$materias = $docente->classe_concorso()->first()->materias()->get();
		$materias = Materia::all();
		

		return view('orari.create_orario_doc', [
			'orarios' => $orarios, 
			'docente' => $docente,
			'classes' => $classes,
			'materias' => $materias
		]);


	}


}
