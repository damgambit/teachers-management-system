@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_classi')}}" method="post">
              <fieldset>
     
                <h2>Nuova Classe</h2>                 
                     
                  <div class="form-group">
                    <label for="anno">Anno</label>
                    <select class="form-control" name="anno" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="istituto">Istituto</label>
                    <select class="form-control" name="istituto" required>
                        <option value="1">LT</option>
                        <option value="2">DV</option>
                    </select>
                  </div>
                     
                  <div class="form-group">
                    <label for="aula">Aula</label>
                    <input type="text" class="form-control" 
                           name="aula" placeholder="Inserisci il numero dell'aula" required>
                  </div> 
                     
                  
                  <div class="form-group">
                    <label for="sezione_id">Sezione</label>
                    <select class="form-control" name="sezione_id" required>
                        @foreach($sezionis as $sezioni)
                            <option value="{{$sezioni->id}}">
                                {{$sezioni->sigla}}
                            </option>
                        @endforeach
                    </select>
                  </div>  




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
                  <button type="submit" class="btn btn-primary">Aggiungi</button>

                 </fieldset>

              
              
            </form>


            <br><br>

            <table class="table table-bordered table-hover table-condensed table-striped">

                <thead>
                    <th>Anno</th>
                    <th>Sezione</th>
                    <th>Aula</th>
                    <th>Istituto</th>

                    <th>Modifica</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($classes as $classe)
                        <tr>
                            <td>{{$classe->anno}}</td>
                            <td>{{$classe->sezione()->first()->sigla}}</td>
                            <td>{{$classe->aula}}</td>
                            <td>{{$classe->istituto}}</td>

                            
                            <td class="text-center">
                                <a href="{{route('info_classi', $classe->id)}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('delete_classi', $classe->id)}}">
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

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
