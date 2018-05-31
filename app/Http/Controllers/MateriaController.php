<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Materia;

class MateriaController extends Controller
{
    

	public function index() 

	{


		$materias = Materia::all();


		return view('materia.index', ['materias' => $materias]);

	}



	public function create(Request $request) 

	{


		$request->validate([
			'nome' => 'required'
		]);


		$materia = Materia::create(['nome' => $request->nome]);


		return redirect()->back()->withInput();


	}


	public function delete($materia_id)

	{

		Materia::find($materia_id)->delete();

		return redirect()->back()->withInput();

	}

	public function show($materia_id)

	{

		// TODO: Maybe... Think about a view with recaps on the select materia
		//		 such as Docentes and Orarios
		
	}

}
