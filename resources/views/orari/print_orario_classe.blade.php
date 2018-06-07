<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{--CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--Title and Meta--}}
        @meta

        {{--Common App Styles--}}
        {{ Html::style(mix('assets/app/css/app.css')) }}

        {{--Styles--}}
        @yield('styles')

        {{--Head--}}
        @yield('head')

</head>
    <div class="container">

        <div class="col-lg-12">

              <fieldset>

                <h3>Orario classe: {{$classe->anno." ".$classe->sigla}}</h3> 
                    
            
                  
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
                                            
                                                <strong>Docente:</strong>
                                                {{$orario->docente_nome}} {{$orario->docente_cognome}}<br>
                                                
                                                  <strong>Materia:</strong>
                                                  {{$orario->materia_nome}} <br>
                                                
                                            
                                          </div>
                                        @else
                                          <div class="panel panel-info">
                                              {{$orario->docente_nome}} {{$orario->docente_cognome}}
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
    

@section('scripts')
    @parent
    {{ Html::script(mix('assets/admin/js/dashboard.js')) }}
@endsection

@section('styles')
    @parent
    {{ Html::style(mix('assets/admin/css/dashboard.css')) }}
@endsection

