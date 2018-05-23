@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

              <fieldset>
     
                <h2>Orario {{$docente->nome}}</h2> 

                    <table class="table table-bordered table-hover table-condensed table-striped">
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
                                    <td>{{$ora}}</td>

                                    @foreach(['lun', 'mar', 'mer', 'gio', 'ven'] as $day)
                                        <td class="text-center">
                                            @foreach($orarios as $orario)
                                                @if($orario->giorno == $day && $orario->ora == $ora)
                                                    
                                                    <a href="{{route('delete_orario', [$orario->id, $docente->id])}}" 
                                                        class="btn btn-danger text-center">
                                                            {{$orario->classe()->first()->anno}} 
                                                            {{$orario->classe()->first()->sezione()->first()->sigla}}
                                                            <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach

                        </tbody>
                    </table>            
                    
                    @foreach(['lun', 'mar', 'mer', 'gio', 'ven'] as $giorno)
                        <table class="table table-bordered table-hover table-condensed table-striped">

                            <thead>
                                <th>Ora</th>
                                <th>{{$giorno}}</th>
                                
                            </thead>

                            <tbody>

                                @foreach([1,2,3,4,5,6,7] as $ora)

                                    <tr>
                                        <td>{{$ora}}</td>
                                        <td>
                                            <form action="{{route('create_orario_doc_add', [$giorno, $ora])}}" method="POST">

                                                <input type="hidden" value="{{$docente->id}}" name="docente">

                                                <select name="classe">

                                                    
                                                    @foreach($classes as $classe)

                                                        <option value="{{$classe->id}}">
                                                            {{$classe->anno}} {{$classe->sezione->sigla}} 
                                                        </option>

                                                    @endforeach

                                                </select>

                                                <select name="materia">

                                                    @foreach($materias as $materia)

                                                        <option value="{{$materia->id}}">
                                                            {{$materia->nome}} 
                                                        </option>

                                                    @endforeach

                                                </select>

                                                <button type="submit" class="btn btn-success">
                                                    +
                                                </button>

                                                {{csrf_field()}}

                                            </form>
                                        </td>
                                    </tr>

                                @endforeach

                                
                            </tbody>

                        </table>
                    @endforeach
                          




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
