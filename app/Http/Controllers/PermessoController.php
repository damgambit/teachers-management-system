<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Permesso;
use App\Motivo;
use App\Docente;

class PermessoController extends Controller

{
	
	public function index() 

	{

		$motivos = Motivo::all();
		$docentes = Docente::all();
		$permessos = Permesso::all();


		return view('permessi.index', [
				'motivos' => $motivos,
				'docentes' => $docentes,
				'permessos' => $permessos
			]);

	}



	public function create(Request $request)

	{


		$request->validate([
    		'giorno' => 'required',
    		'ora' => 'required',
    		'data' => 'required',
    		'motivo_id' => 'required',
    		'docente_id' => 'required',
    		'recupero' => 'required',
    	]);

    	$permesso = permesso::create([
    		'giorno' => $request->giorno,
    		'ora' => $request->ora,
    		'data' => $request->data,
    		'docente_id' => $request->docente_id,
    		'motivo_id' => $request->motivo_id,
    		'recupero' => (int)($request->recupero === 'true')
    	]);

    	return redirect()->back()->withInput();


	}


	public function delete($permessi_id)

	{

		Permesso::find($permessi_id)->delete();

		return redirect()->back()->withInput();

	}
}
