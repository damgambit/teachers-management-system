@extends('layouts.app')



    <div class="container body" style="background-color: white">
        <div class="main_container" style="background-color: white">

<div class="container" style="background-color: white">

        <div class="col-lg-10" style="background-color: white">

              <fieldset>
     
                <h2>Orario {{$docente->nome}} {{$docente->cognome}}</h2> 

                    <table class="table table-bordered ">
                        <thead>
                            
                            <th>Ora</th>
                            <th>Lunedì</th>
                            <th>Martedì</th>
                            <th>Mercoledì</th>
                            <th>Giovedì</th>
                            <th>Venerdì</th>
                                
                        </thead>

                        <tbody>
                            
                            @foreach([1,2,3,4,5,6,7] as $ora)
                                <tr>
                                    <td width="5%">{{$ora}}</td>

                                    @foreach(['lun', 'mar', 'mer', 'gio', 'ven'] as $day)
                                        <td width="13.5%" class="text-center">
                                            @foreach($orarios as $orario)
                                                @if($orario->giorno == $day && $orario->ora == $ora)
                                                    
                                                    @if($orario->sigla == "DDD")

                                                        <strong>Disposizione</strong>

                                                    @elseif($orario->sigla == "RRR") 

                                                        <strong>Ricevimento</strong>

                                                    @elseif($orario->sigla == "DDPP") 

                                                        <strong>Disposizione a Pagamento</strong>

                                                    @else

                                                      <strong>{{$orario->anno}} 
                                                      {{$orario->sigla}}</strong>
                                                      {{$orario->materia_nome}}
                                                        

                                                    @endif

                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach

                        </tbody>
                    </table>    
                 </fieldset>

              
              


            

        </div>

    </div>
        </div>
    </div>

@section('styles')
    {{ Html::style(mix('assets/admin/css/admin.css')) }}
@endsection
<style type="text/css">
  body {
    background:white !important;
    color:black !important;

  }
</style>
@section('scripts')
    {{ Html::script(mix('assets/admin/js/admin.js')) }}
@endsection