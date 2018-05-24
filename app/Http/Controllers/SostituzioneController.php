<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permesso;
use App\Orario;


class SostituzioneController extends Controller

{
    	

	public function index()

	{

		return view('sostituzioni.index');

	}


	public function show_date_perm(Request $request)

	{

		$date = $request->date;

		//dd(Orario::where('docente_id', 1)->get());

		$permessos = Permesso::join('orarios', function ($join) {
							        $join->on('permessos.ora', '=', 'orarios.ora')
							             ->on('permessos.giorno', '=', 'orarios.giorno')
							             ->on('permessos.docente_id', '=', 'orarios.docente_id');
							             //->on('permessos.docente_id', '=', 'orarios.docente_id');
							    })
								//TODO: FARE IL JOIN CON CLASSE E SEZIONE
								//->join('orarios', 'permessos.ora', '=', 'orarios.ora')
								//->on('orarios', 'permessos.giorno', '=', 'orarios.giorno')
								//->join('orarios', 'permessos.docente_id', '=', 'orarios.docente_id')
								//->join('orarios', 'classes.id', '=', 'orarios.classe_id')
								//->join('classes', 'sezione.id', '=', 'classes.sezione_id')
								//->where('permessos.data', $date)
								->where('data', $date)
								->get();


		return view('sostituzioni.show_date_perm', ['date' => $date, 'permessos' => $permessos]);

	}


}
