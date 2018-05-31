<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Classe\ClasseHelper;

use App\Classe;

class ClasseController extends Controller
{
    

	public function index()

	{

		return view('classi.index', ClasseHelper::index_data());

	}


	public function create(Request $request)

	{		

    	$classe = Classe::create(ClasseHelper::handle_create$($request));

    	return redirect()->back()->withInput();

	}


	public function delete($classi_id)

	{

		Classe::find($classi_id)->delete();

		return redirect()->back()->withInput();

	}


}
