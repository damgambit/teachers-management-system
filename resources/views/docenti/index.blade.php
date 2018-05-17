@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_docenti')}}" method="post">
              <fieldset>
     
                <h2>Nuovo Docente</h2>                 
                     
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Inserisci il nome...">
                  </div>
                     
                  <div class="form-group">
                    <label for="cognome">Cognome</label>
                    <input type="text" class="form-control" name="cognome" placeholder="Inserisci il cognome ...">
                  </div> 
                     
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="Inserisci e-mail...">
                  </div>
                     
                  <div class="form-group">
                    <label for="cellulare">Cellulare</label>
                    <input type="text" class="form-control" name="cellulare" placeholder="Inserisci il cellulare...">
                  </div>
                     
                  <div class="form-group">
                    <label for="cc">Classe Concorso</label>
                    <select class="form-control" name="cc">
                        @foreach($ccs as $cc)
                            <option value="{{$cc->id}}">
                                {{$cc->sigla}}
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
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>E-Mail</th>
                    <th>Cellulare</th>
                    <th>Classe Concorso</th>
                    <th>Materie</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($docentes as $docente)
                        <tr>
                            <td>{{$docente->nome}}</td>
                            <td>{{$docente->cognome}}</td>
                            <td>{{$docente->email}}</td>
                            <td>{{$docente->cellulare}}</td>

                            <td class="text-center">
                                <a href="{{route('materie_classi_concorso', $docente->classi_concorso_id)}}">
                                    <button class="btn btn-warning">
                                        {{$docente->classi_concorso_id}}
                                    </button>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a href="{{route('materie_classi_concorso', $docente->id)}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('delete_docenti', $docente->id)}}">
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
