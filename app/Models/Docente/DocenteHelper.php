<?php

namespace App\Models\Docente;


use App\Docente;
use App\ClassiConcorso;

/**
 * summary
 */
trait DocenteHelper
{
    /**
     * summary
     */
    public static function index_data()
    {

        $docentes = Docente::join('classi_concorsos', 'classi_concorsos.id', '=', 'docentes.classi_concorso_id')
                            ->orderBy('cognome')
                            ->where('docentes.nome', '!=', 'uscita_anticipata')
                            ->where('docentes.nome', '!=', 'entrata_posticipata')
                            ->select('docentes.id', 
                                     'nome', 
                                     'cognome', 
                                     'email', 
                                     'cellulare', 
                                     'classi_concorso_id', 
                                     'classi_concorsos.sigla as classe_concorso')
                            ->get();

        $ccs = ClassiConcorso::all();


        return ['docentes' => $docentes, 'ccs' => $ccs];
        
    }



    public static function handle_create($request) 

    {

        $request->validate([
            'nome' => 'required',
            'cognome' => 'required',
            'cc' => 'required'
        ]);


        return [
            'nome' => $request->nome,
            'cognome' => $request->cognome,
            'email' => $request->email,
            'cellulare' => $request->cellulare,
            'classi_concorso_id' => $request->cc
        ];


    }
}