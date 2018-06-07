@extends('layouts.app')

@section('body_class','nav-md')

@section('page')
    <div class="container body">
        <div class="main_container">
            @section('header')
                @include('admin.sections.navigation')
                @include('admin.sections.header')
            @show
<div class="container">

        <div class="col-lg-12">

              <fieldset>
     
                <h2>Orario</h2> 

                <h3>Orario classe: {{$classe->anno." ".$classe->sigla}}</h3> 

                <a href="{{route('print_orario_classe').'?classe_id='.$classe->id}}" class="btn btn-info">Scarica PDF</a>              
                    
            
                  
                  <table class="table table-bordered table-hover table-condensed fixed table-striped">
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
                                          <div class="panel panel-info">
                                            
                                              <div class="panel-body">
                                                <strong>Docente:</strong><br>
                                                {{$orario->docente_nome}} {{$orario->docente_cognome}}<br><br>
                                                
                                                  <strong>Materia:</strong><br>
                                                  {{$orario->materia_nome}} <br>
                                                
                                              </div>
                                            
                                          </div>
                                        @else
                                          <div class="panel panel-info">
                                            <div class="panel-body">
                                              {{$orario->docente_nome}} {{$orario->docente_cognome}}
                                            </div>
                                          </div>
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
@stop

@section('styles')
    {{ Html::style(mix('assets/admin/css/admin.css')) }}
@endsection

@section('scripts')
    {{ Html::script(mix('assets/admin/js/admin.js')) }}
@endsection