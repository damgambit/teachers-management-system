<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Motivo;



class MotivoController extends Controller

{


	public function index()

	{


		$motivos = Motivo::all();


		return view('motivi.index', ['motivos' => $motivos]);

	
	}



	public function create(Request $request) 

	{


		$motivo = Motivo::create(['descrizione' => $request->descrizione]);


		return redirect()->back()->withInput();

	}


	public function delete($motivi_id)

	{

		Motivo::find($motivi_id)->delete();

		return redirect()->back()->withInput();

	}

   
}
