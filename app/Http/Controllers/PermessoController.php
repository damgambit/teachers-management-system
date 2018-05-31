<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Permesso;
use App\Motivo;
use App\Docente;


use App\Models\Permesso\PermessoHelper;

class PermessoController extends Controller

{
	
	public function index() 

	{

		return view('permessi.index', PermessoHelper::index_data());

	}



	public function create(Request $request)

	{


    	$permesso = Permesso::create(PermessoController::handle_create($request));

    	return redirect()->back()->withInput();


	}


	public function delete($permessi_id)

	{

		Permesso::find($permessi_id)->delete();

		return redirect()->back()->withInput();

	}


	public function update_recupero($permessi_id, Request $request)

	{

		$permesso = Permesso::find($permessi_id);
		$permesso->recupero = $request->recupero; $permesso->save();
		

		return redirect()->back()->withInput();

	}
}
