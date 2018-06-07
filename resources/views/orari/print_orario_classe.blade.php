@extends('layouts.app')



    <div class="container body" style="background-color: white">
        <div class="main_container" style="background-color: white">

<div class="container" style="background-color: white">

        <div class="col-lg-12" style="background-color: white">

              <fieldset>
     
                <h3>Orario classe: {{$classe->anno." ".$classe->sigla}}</h3> 

                    
            
                  
                  <table class="table">
                        <thead>
                            
                            <th>Giorno</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
       
                                
                        </thead>

                        <tbody>

                          @foreach($giornos as $giorno)
                            <tr>
                              <td width="4%">{{$giorno}}</td>

                              @foreach($oras as $ora)
                                <td width="13.5%">
                                  <div class="panel-group">
                                    @foreach($orarios[$ora] as $orario)
                                      @if($orario->giorno == $giorno)
                                        @if($classe->sigla != 'DDD' && $classe->sigla != 'DDPP')
                                            

                                                <strong>Docente:</strong>
                                                {{$orario->docente_nome}} {{$orario->docente_cognome}}<br>
                                                
                                                  <strong>Materia:</strong>
                                                  {{$orario->materia_nome}} <br>
                                                
                                            
                                        @else
                                              {{$orario->docente_nome}} {{$orario->docente_cognome}}
                                        @endif
                                      @endif
                                    @endforeach
                                  </div>
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

  }
</style>
@section('scripts')
    {{ Html::script(mix('assets/admin/js/admin.js')) }}
@endsection