<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Docente;
use App\ClassiConcorso;

class DocenteController extends Controller
{
    

    public function index()

    {

    	$docentes = Docente::all();
    	$ccs = ClassiConcorso::all();

    	return view('docenti.index', [
    		'docentes' => $docentes,
    		'ccs' => $ccs
    	]);

    }



    public function create(Request $request)

    {


    	$request->validate([
    		'nome' => 'required',
    		'cognome' => 'required',
    		'cc' => 'required'
    	]);

    	$docente = Docente::create([
    		'nome' => $request->nome,
    		'cognome' => $request->cognome,
    		'email' => $request->email,
    		'cellulare' => $request->cellulare,
    		'classi_concorso_id' => $request->cc
    	]);


    	return redirect()->back()->withInput();

    }


}
