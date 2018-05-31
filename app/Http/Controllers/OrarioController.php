<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Docente;
use App\Classe;
use App\Orario;
use App\Materia;



use App\Models\Orario\OrarioHelper;

class OrarioController extends Controller

{
    

	public function index()

	{

		return view('orari.index', OrarioHelper::index_data());

	}



	public function create_orario_doc(Request $request) 

	{		


		return view('orari.create_orario_doc', OrarioHelper::create_data($request));


	}


	public function create_orario_doc_add($giorno, $ora, Request $request)

	{

		$orario = OrarioHelper::handle_add($giorno, $ora, $request);

		return redirect()->back()->withInput();


	}


	public function delete($orario_id, $docente_id)

	{

		Orario::where('id', $orario_id)->delete();
		

		return redirect()->back()->withInput();

	}


}
