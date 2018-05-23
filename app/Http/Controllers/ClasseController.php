<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Classe;
use App\Sezione;

class ClasseController extends Controller
{
    

	public function index()

	{

		$sezionis = Sezione::orderBy('sigla')->get();

		$classes = Classe::join('seziones', 'classes.sezione_id', '=', 'seziones.id')
						 ->select('classes.*', 'seziones.sigla')
						 ->orderBy('anno')
						 ->orderBy('seziones.sigla')
						 ->get();

		return view('classi.index', ['classes' => $classes, 'sezionis' => $sezionis]);

	}


	public function create(Request $request)

	{

		$request->validate([
    		'anno' => 'required',
    		'istituto' => 'required',
    		'sezione_id' => 'required',
    		'aula' => 'required',
    	]);

    	$classe = Classe::create([
    		'anno' => $request->anno,
    		'istituto' => $request->istituto,
    		'sezione_id' => $request->sezione_id,
    		'aula' => $request->aula
    	]);

    	return redirect()->back()->withInput();

	}


	public function delete($classi_id)

	{

		
		Classe::find($classi_id)->delete();



		return redirect()->back()->withInput();


	}


}
