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


   
}
