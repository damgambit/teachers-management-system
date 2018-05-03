<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Docente;
use App\Classe;
use App\Orario;

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

		$docente =  Docente::find($docente_id)->first();

		return view('orari.create_orario_doc', ['orarios' => $orarios, 'docente' => $docente]);

	}


}
