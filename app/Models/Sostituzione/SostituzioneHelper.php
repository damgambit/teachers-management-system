<?php

namespace App\Models\Sostituzione;


use App\Permesso;
use App\Orario;
use App\Sostituzione;


/**
 * SostituzioneHelper
 */
trait SostituzioneHelper
{
    /**
     * summary
     */
    public static function get_open_classes($date)
    {
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


		return $classes;

    }

    public static function handle_add($request)

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

		return $instance;

    }


    public static function get_sostituziones($date)

    {

    	$sostituziones = Sostituzione::where('date', $date)
						->join('orarios', 'orarios.id', '=', 'sostituziones.orario_id')
						->join('docentes', 'docentes.id', '=', 'sostituziones.docente_id')
						->get();

		if($sostituziones == null) {

			$sostituziones = [];

		}


		return $sostituziones;

    }


    public static function get_post()

    {

		return (object) ['docente_id_sos' => 'entrata_posticipata', 'cognome' => 'Entrata Posticipata', 'descrizione' => ''];

    }


    public static function get_ant()

    {

		return (object) ['docente_id_sos' => 'uscita_anticipata', 'cognome' => 'Uscita Anticipata', 'descrizione' => ''];

    }


    public static function get_permessos_for_classe($classe, $date)

    {


    	return Permesso::join('orarios', function ($join) {
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


    }


    public static function get_docs_for_permesso($permesso)

    {

    	return Orario::where('orarios.ora', $permesso->ora)
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
				->distinct()
				->get();


    }



}