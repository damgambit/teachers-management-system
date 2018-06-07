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
				$co_doc = SostituzioneHelper::get_co_doc($permesso, $date, $classe);
				
				if($co_doc != null){
					$co_doc->descrizione = "co_docenza";

					$docentes[$permesso->ora]->push($co_doc);
				}

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


	public function print_date_perm_doc(Request $request)

	{

		$date = $request->date;

		$permessos = Permesso::where('data', $date)
							->join('orarios', function ($join) {
						        $join->on('permessos.ora', '=', 'orarios.ora')
						             ->on('permessos.giorno', '=', 'orarios.giorno')
						             ->on('permessos.docente_id', '=', 'orarios.docente_id');
						    })
						    ->join('classes', 'orarios.classe_id', '=', 'classes.id')
							->join('seziones', 'classes.sezione_id', '=', 'seziones.id')
							->join('docentes', 'docentes.id', '=', 'permessos.docente_id')
							->join('motivos', 'motivos.id', '=', 'permessos.motivo_id')
							->orderBy('cognome')
							->get();

		$sostituziones = SostituzioneHelper::get_sostituziones($date);

		return view('sostituzioni.print_date_perm_doc', ['date' => $date, 'permessos' => $permessos, 'sostituziones' => $sostituziones]);

	}


	public function print_date_perm_classe(Request $request)

	{

		$date = $request->date;

		$sostituziones = SostituzioneHelper::get_sostituziones($date);

		$utils = ['1' => '8:50', 
				 '2' => '9:45',
				 '3' => '10:40',
				 '4' => '11:55',
				 '5' => '12:50',
				 '6' => '13:50',
				 '7' => '14:50',
				];

		return view('sostituzioni.print_date_perm_classe', ['date' => $date, 'sostituziones' => $sostituziones, 'utils' => $utils]);


	}


	public function add_sostituzione(Request $request)

	{


		$instance = SostituzioneHelper::handle_add($request);


		return redirect()->back()->withInput();


	}


}
