@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-12">

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
                                <br><br><br>
                                {{$k}}
                              </td>
                              @foreach([1,2,3,4,5,6,7] as $ora)
                                @foreach($v as $elem)
                                  @if($ora == $elem->ora)
                                    <td width="13.5%">
                                      <strong>Docente: </strong>{{$elem->cognome}} <br>
                                      <strong>Motivo: </strong>{{$elem->descrizione}} <br><br>

                                      @foreach($sostituziones as $sostituzione)

                                        @if($sostituzione->orario_id == $elem->orario_id)
                                          <strong>Sostituto: </strong>{{$sostituzione->cognome}}
                                        @endif
                                      @endforeach


                                      <strong>Sostituzione: </strong>
                                      <form action="{{route('add_sostituzione')}}" method="post">
                                        {{csrf_field()}}
                                        <select name="docente_id">
                                          @foreach($docs[$elem->anno.$elem->sigla][$ora] as $doc)
                                            
                                            <option value="{{$doc->docente_id_sos}}">
                                                {{$doc->cognome}} ({{$doc->descrizione}})
                                            </option>
                                            
                                          @endforeach
                                        </select>

                                        <input type="hidden"  value="{{$date}}" name="date" />

                                        <input type="hidden" value="{{$elem->orario_id}}" name="orario_id" />

                                        <button type="submit" class="btn btn-info">
                                          Crea Sostituzione
                                        </button>
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
