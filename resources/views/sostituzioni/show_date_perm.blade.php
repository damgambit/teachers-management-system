@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-12">

            <form action="" method="post">
              <fieldset>
     
                <h2>Sostituzioni</h2> 

                <h3>Orari scoperti data: {{$date}}</h3>                
                    
            
                  
                  <table class="table table-bordered table-hover table-condensed fixed table-striped">
                        <thead>
                            
                            <th>Classe</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                                
                        </thead>

                        <tbody >
                          @foreach($results as $k => $v)
                            <tr>
                              <td width="5%">
                                {{$k}}
                              </td>
                              @foreach([1,2,3,4,5,6,7] as $ora)
                                @foreach($v as $elem)
                                  @if($ora == $elem->ora)
                                    <td width="13.5%">
                                      <strong>Docente: </strong>{{$elem->cognome}} <br><br>
                                      <strong>Motivo: </strong>{{$elem->motivo->descrizione}} <br><br>
                                      <strong>Sostituzione: </strong>
                                      <form action="{{route('add_sostituzione')}}" method="post">
                                        <select name="docente_id">
                                          @foreach($docs as $doc_key => $doc_value)
                                            @if($doc_key == $elem->anno.$elem->sigla)
                                              <option value="{{$doc_value->docente_id}}">
                                                {{$doc_value->cognome}} ({{$doc_value->descrizione}})
                                              </option>
                                            @endif
                                            
                                          @endforeach
                                        </select>
                                      </form>
                                    </td>
                                  @else
                                    <td width="13.5%"></td>
                                  @endif
                                @endforeach
                              @endforeach
                            </tr>
                          @endforeach
                        </tbody>

                  </table>  




                  {{csrf_field()}}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                 </fieldset>

              
              
            </form>


            

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
