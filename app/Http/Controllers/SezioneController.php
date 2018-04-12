<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Sezione;

class SezioneController extends Controller

{
    
	public function index()

	{

		
		$seziones = Sezione::all();


		return view('sezioni.index', ['seziones' => $seziones]);


	}



	public function create(Request $request) 

	{


		$request->validate([
    		'sigla' => 'required',
    		'descrizione' => 'required',
    	]);

    	$sezione = Sezione::create([
    		'sigla' => $request->sigla,
    		'descrizione' => $request->descrizione,
    	]);

    	return redirect()->back()->withInput();


	}
	

	public function delete($sezioni_id)

	{

		Sezione::find($sezioni_id)->delete();


		return redirect()->back()->withInput();

	}

}
