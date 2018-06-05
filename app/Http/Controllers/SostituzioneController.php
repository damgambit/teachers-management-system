<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use App\Permesso;
use App\Orario;
use App\Docente;
use App\Sostituzione;


use App\Models\Sostituzione\SostituzioneHelper;

class SostituzioneController extends Controller

{
    	

	public function index()

	{

		return view('sostituzioni.index');

	}


	public function show_date_perm(Request $request)

	{

		$date = $request->date;
		$classes = SostituzioneHelper::get_open_classes($date);
		$sostituziones = SostituzioneHelper::get_sostituziones($date);

		$results = []; $docs = []; $orarios = [];
		$post = SostituzioneHelper::get_post();
		$ant = SostituzioneHelper::get_ant();

		foreach($classes as $classe) {

			$permessos = SostituzioneHelper::get_permessos_for_classe($classe, $date);
			$docentes = [];				

			foreach($permessos as $permesso) {

				$docentes[$permesso->ora] = SostituzioneHelper::get_docs_for_permesso($permesso, $date);
				$docentes[$permesso->ora]->push($post); $docentes[$permesso->ora]->push($ant);

			}
			
			$results[$classe->anno.$classe->sigla] = $permessos;
			$docs[$classe->anno.$classe->sigla] = $docentes;
			$orarios[$classe->anno.$classe->sigla] = SostituzioneHelper::get_orario_for_classe($classe, $permessos[0]->giorno);
		}	


		return view('sostituzioni.show_date_perm', [
			'date' => $date, 
			'sostituziones' => $sostituziones, 
			'results' => $results,
			'docs' => $docs,
			'orarios' => $orarios
		]);

	}


	public function add_sostituzione(Request $request)

	{


		$instance = SostituzioneHelper::handle_add($request);


		return redirect()->back()->withInput();


	}


}
