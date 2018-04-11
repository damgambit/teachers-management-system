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
                    
                </thead>

                <tbody>
                    @foreach([1, 2] as $docente)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td class="text-center">
                                <a href="{{route('materie_classi_concorso', 1)}}">
                                    <button class="btn btn-warning">
                                        
                                    </button>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a href="{{route('materie_classi_concorso', 1)}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('delete_docenti', 1)}}">
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
