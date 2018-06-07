<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use App\Docente;
use App\Classe;
use App\Orario;
use App\Materia;

use App\Models\Orario\OrarioHelper;

use Dompdf\Dompdf;


class OrarioController extends Controller

{
    

	public function index()

	{

		return view('orari.index', OrarioHelper::index_data());

	}

	public function show_orario_classe(Request $request) 

	{	

		return view('orari.show_orario_classe', OrarioHelper::show_data($request));

	}

	public function print_orario_classe(Request $request) 
	
	{


        return view('orari.print_orario_classe', OrarioHelper::show_data($request));
       	

	}



	public function create_orario_doc(Request $request) 

	{		


		return view('orari.create_orario_doc', OrarioHelper::create_data($request));


	}

	public function print_orario_docente(Request $request)

	{

		return view('orari.print_orario_docente', OrarioHelper::create_data($request));

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
