<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ClassiConcorso;
use App\Materia;

class ClassiConcorsoController extends Controller

{
	

	public function index()

	{

		$ccs =  ClassiConcorso::all();

		return view('classi_concorso.index', ['ccs' => $ccs]);

	}


	public function create(Request $request)

	{

		$cc = ClassiConcorso::create(['sigla' => $request->sigla]);


		return redirect()->back()->withInput();

	}


	public function delete($classi_concorso_id)

	{

		ClassiConcorso::find($classi_concorso_id)->delete();


		return redirect()->back()->withInput();

	}

	public function show($classi_concorso_id)

	{

		$cc = ClassiConcorso::find($classi_concorso_id);

		$materias = Materia::all();

		$cc_materias = $cc->materias()->get();
	

		return view('classi_concorso.show', [
			'cc_materias' => $cc_materias, 
			'cc' => $cc,
			'materias' => $materias
		]);

	}

	public function add_ccmateria(Request $request) 

	{

		$materia = Materia::find($request->materia_id);
		$cc = ClassiConcorso::find($request->classi_concorso_id);

		$cc->materias()->attach($materia);

		return redirect()->back()->withInput();	

	}



	public function delete_ccmateria($classi_concorso_id, $materia_id)

	{


		$materia = Materia::find($materia_id);
		$cc = ClassiConcorso::find($classi_concorso_id);

		$cc->materias()->detach($materia);

		return redirect()->back()->withInput();	


	}
}
