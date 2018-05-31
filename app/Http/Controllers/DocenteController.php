<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Docente;
use App\ClassiConcorso;

use App\Models\Docente\DocenteHelper;

class DocenteController extends Controller
{

    use DocenteHelper;

    

    public function index()

    {

        // index_data: Returns all the data that the view 'docenti.index'
        // needs - every docente and the classi_concorsos as ccs
    	return view('docenti.index', DocenteHelper::index_data());

    }



    public function create(Request $request)

    {

        // handle_create: it needs the request because this fuction validate 
        // the data and return the array to create the Docente
    	$docente = Docente::create(DocenteHelper::handle_create($request));


    	return redirect()->back()->withInput();

    }


    // TODO: Aggiungere Delete function


}
