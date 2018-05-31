<?php


namespace App\Models\Classe;



use App\Classe;
use App\Sezione;

/**
 * 

 */
trait ClasseHelper
{
    /**
     * summary
     */
    public static function index_data()
    
    {
    	
    	$sezionis = Sezione::orderBy('sigla')->get();

		$classes = Classe::join('seziones', 'classes.sezione_id', '=', 'seziones.id')
						 ->select('classes.*', 'seziones.sigla')
						 ->orderBy('anno')
						 ->orderBy('seziones.sigla')
						 ->get();


		return ['classes' => $classes, 'sezionis' => $sezionis];

    }



    public static function handle_create($request)

    {

    	$request->validate([
    		'anno' => 'required',
    		'istituto' => 'required',
    		'sezione_id' => 'required',
    		'aula' => 'required',
    	]);

    	return [
    		'anno' => $request->anno,
    		'istituto' => $request->istituto,
    		'sezione_id' => $request->sezione_id,
    		'aula' => $request->aula
    	];

    }
}