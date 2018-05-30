<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use App\Permesso;
use App\Orario;
use App\Docente;
use App\Sostituzione;


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

		$post = (object) ['docente_id_sos' => 'entrata_posticipata', 'cognome' => 'Entrata Posticipata', 'descrizione' => ''];
		$ant = (object) ['docente_id_sos' => 'uscita_anticipata', 'cognome' => 'Uscita Anticipata', 'descrizione' => ''];

		foreach($classes as $classe) {

			$permessos = Permesso::join('orarios', function ($join) {
							$join->on('permessos.ora', '=', 'orarios.ora')
							     ->on('permessos.giorno', '=', 'orarios.giorno')
							     ->on('permessos.docente_id', '=', 'orarios.docente_id');
							})
							->join('classes', 'orarios.classe_id', '=', 'classes.id')
							->join('seziones', 'classes.sezione_id', '=', 'seziones.id')
							->join('docentes', 'permessos.docente_id', '=', 'docentes.id')
							->join('motivos', 'motivos.id', '=', 'permessos.motivo_id')
							->where('data', $date)
							->where('anno', $classe->anno)
							->where('sigla', $classe->sigla)
							->orderBy('anno')
							->orderBy('sigla')
							->select('orarios.id as orario_id', 'nome', 'cognome', 'motivos.descrizione', 'orarios.giorno', 'orarios.ora', 'anno', 'sigla')
							->get();
			$sostituziones = Sostituzione::where('date', $date)
										->join('orarios', 'orarios.id', '=', 'sostituziones.orario_id')
										->join('docentes', 'docentes.id', '=', 'sostituziones.docente_id')
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
													->where('permessos.giorno', $permesso->giorno)
													->where('permessos.ora', $permesso->ora)
													->select('orarios.id', 
														'orarios.giorno', 
														'descrizione', 
														'docentes.id as docente_id_sos',
														'nome',
														'cognome')
													->orderBy('docentes.nome')
													
													->get();

				$docentes[$permesso->ora]->push($post);
				$docentes[$permesso->ora]->push($ant);
			}

			

			$results[$classe->anno.$classe->sigla] = $permessos;
			$docs[$classe->anno.$classe->sigla] = $docentes;
		}



		//dd($docs);
		return view('sostituzioni.show_date_perm', [
			'date' => $date, 
			'sostituziones' => $sostituziones, 
			'results' => $results,
			'docs' => $docs
		]);

	}


	public function add_sostituzione(Request $request)

	{


		$date = $request->date;
		$docente_id = $request->docente_id;



		if($request->docente_id == 'entrata_posticipata'){
			$docente_id = 998;
		}

		if($request->docente_id == 'uscita_anticipata'){
			$docente_id = 999;
		}
	

		$instance = Sostituzione::firstOrNew([
			'orario_id' => $request->orario_id,
			'date' => $date
		]);

        $instance->fill([
			'orario_id' => $request->orario_id,
			'docente_id' => $docente_id,
			'date' => $date
		])->save();


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

		$post = (object) ['docente_id_sos' => 'entrata_posticipata', 'cognome' => 'Entrata Posticipata', 'descrizione' => ''];
		$ant = (object) ['docente_id_sos' => 'uscita_anticipata', 'cognome' => 'Uscita Anticipata', 'descrizione' => ''];

		foreach($classes as $classe) {

			$permessos = Permesso::join('orarios', function ($join) {
							$join->on('permessos.ora', '=', 'orarios.ora')
							     ->on('permessos.giorno', '=', 'orarios.giorno')
							     ->on('permessos.docente_id', '=', 'orarios.docente_id');
							})
							->join('classes', 'orarios.classe_id', '=', 'classes.id')
							->join('seziones', 'classes.sezione_id', '=', 'seziones.id')
							->join('docentes', 'permessos.docente_id', '=', 'docentes.id')
							->join('motivos', 'motivos.id', '=', 'permessos.motivo_id')
							->where('data', $date)
							->where('anno', $classe->anno)
							->where('sigla', $classe->sigla)
							->orderBy('anno')
							->orderBy('sigla')
							->select('orarios.id as orario_id', 'nome', 'cognome', 'motivos.descrizione', 'orarios.giorno', 'orarios.ora', 'anno', 'sigla')
							->get();
			$sostituziones = Sostituzione::where('date', $date)
										->join('orarios', 'orarios.id', '=', 'sostituziones.orario_id')
										->join('docentes', 'docentes.id', '=', 'sostituziones.docente_id')
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
													->where('permessos.giorno', $permesso->giorno)
													->where('permessos.ora', $permesso->ora)
													->select('orarios.id', 
														'orarios.giorno', 
														'descrizione', 
														'docentes.id as docente_id_sos',
														'nome',
														'cognome')
													->orderBy('docentes.nome')
													
													->get();

				$docentes[$permesso->ora]->push($post);
				$docentes[$permesso->ora]->push($ant);
			}

			

			$results[$classe->anno.$classe->sigla] = $permessos;
			$docs[$classe->anno.$classe->sigla] = $docentes;
		}



		//dd($docs);
		return view('sostituzioni.show_date_perm', [
			'date' => $date, 
			'sostituziones' => $sostituziones, 
			'results' => $results,
			'docs' => $docs
		]);



	}


}
