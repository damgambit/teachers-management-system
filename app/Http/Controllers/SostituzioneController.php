<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permesso;
use App\Orario;
use App\Docente;


class SostituzioneController extends Controller

{
    	

	public function index()

	{

		return view('sostituzioni.index');

	}


	public function show_date_perm(Request $request)

	{

		$date = $request->date;

		$classes = Permesso::join('orarios', function ($join) {
							        $join->on('permessos.ora', '=', 'orarios.ora')
							             ->on('permessos.giorno', '=', 'orarios.giorno')
							             ->on('permessos.docente_id', '=', 'orarios.docente_id');
							             //->on('permessos.docente_id', '=', 'orarios.docente_id');
							    })
								->join('classes', 'orarios.classe_id', '=', 'classes.id')
								->join('seziones', 'classes.sezione_id', '=', 'seziones.id')
								->where('data', $date)
								->orderBy('anno')
								->orderBy('sigla')
								->select('anno',  'sigla')
								->distinct()
								->get();


		$results = [];
		$docs = [];

		foreach($classes as $classe) {

			$permessos = Permesso::join('orarios', function ($join) {
							$join->on('permessos.ora', '=', 'orarios.ora')
							     ->on('permessos.giorno', '=', 'orarios.giorno')
							     ->on('permessos.docente_id', '=', 'orarios.docente_id');
							})
							->join('classes', 'orarios.classe_id', '=', 'classes.id')
							->join('seziones', 'classes.sezione_id', '=', 'seziones.id')
							->join('docentes', 'permessos.docente_id', '=', 'docentes.id')
							->where('data', $date)
							->where('anno', $classe->anno)
							->where('sigla', $classe->sigla)
							->orderBy('anno')
							->orderBy('sigla')
							->get();

			$docentes = [];				

			foreach($permessos as $permesso) {
				$docentes[$permesso->ora] = Orario::where('orarios.ora', $permesso->ora)
													->where('orarios.giorno', $permesso->giorno)
													->join('docentes', 'orarios.docente_id', '=', 'docentes.id')
													->join('classes', 'orarios.classe_id', '=', 'classes.id')
													->join('seziones', 'classes.sezione_id', '=', 'seziones.id')
													->join('permessos', 'permessos.docente_id', '!=', 'orarios.docente_id')
													->where('anno', 1)
													->where('sigla', 'DDD')
													->where('orarios.giorno', $permesso->giorno)
													->where('orarios.ora', $permesso->ora)
													->get();
			}


			$results[$classe->anno.$classe->sigla] = $permessos;
			$docs[$classe->anno.$classe->sigla] = $docentes;
		}

		dd($docs);



		return view('sostituzioni.show_date_perm', [
			'date' => $date, 
			'results' => $results,
			'docs' => $docs
		]);

	}


}
