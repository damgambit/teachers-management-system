@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-12">

              <fieldset>
     
                <h2>Orario</h2> 

                <h3>Orario classe: 
                  @if($classe->sigla == 'DDD')
                    Disposizioni
                  @elseif($classe->sigla == 'DDPP')
                    Disposizioni a Pagamento
                  @elseif($classe->sigla == 'RRR')
                    Ricevimenti
                  @else
                    {{$classe->anno." ".$classe->sigla}}
                  @endif

                </h3> 

                <a href="{{route('print_orario_classe').'?classe_id='.$classe->id}}" class="btn btn-info">Stampa</a>              
                    
            
                  
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
    
@endsection

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection
