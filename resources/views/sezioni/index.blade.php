@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_sezioni')}}" method="post">
              <fieldset>
     
                <h2>Nuova Sezione</h2>                 
                     
                  <div class="form-group">
                    <label for="sigla">Sigla</label>
                    <input type="text" class="form-control" name="sigla" placeholder="Inserisci la sigla..." required>
                  </div>

                  <div class="form-group">
                    <label for="descrizione">Descrizione</label>
                    <input type="text" class="form-control" name="descrizione" placeholder="Inserisci la descrizione...">
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
                    <th>Sigla</th>
                    <th>Descrizione</th>
                    <th>Modifica</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($seziones as $sezione)
                        <tr>
                            <td>{{$sezione->sigla}}</td>
                            <td>{{$sezione->descrizione}}</td>
                            
                            
                            <td class="text-center">
                                <a href="{{route('info_sezioni', $sezione->id)}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('delete_sezioni', $sezione->id)}}">
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
