<?php


namespace App\Models\Permesso;


use App\Motivo;
use App\Docente;
use App\Permesso;


trait PermessoHelper
{
    /**
     * 
     */
    public static function index_data()
    {
       
		$motivos = Motivo::all();
		$docentes = Docente::orderBy('cognome')->get();
		$permessos = Permesso::join('docentes', 'docentes.id', '=', 'permessos.docente_id')
							   ->join('motivos', 'motivos.id', '=', 'permessos.motivo_id')
							   ->select('permessos.id', 
							   			'permessos.giorno', 
							   			'permessos.data', 
							   			'permessos.ora',
							   			'permessos.recupero',
							   			'docentes.nome',
							   			'motivos.descrizione')
							   ->get();

		return [
				'motivos' => $motivos,
				'docentes' => $docentes,
				'permessos' => $permessos
			]; 
    }



    public static function handle_create($request) 

    {

    	$request->validate([
    		'giorno' => 'required',
    		'ora' => 'required',
    		'data' => 'required',
    		'motivo_id' => 'required',
    		'docente_id' => 'required',
    	]);



    	return [
    		'giorno' => $request->giorno,
    		'ora' => $request->ora,
    		'data' => $request->data,
    		'docente_id' => $request->docente_id,
    		'motivo_id' => $request->motivo_id,
    		'recupero' => (int)($request->recupero === 'on')
    	];


    }
}