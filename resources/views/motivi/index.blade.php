@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_motivi')}}" method="post">
              <fieldset>
     
                <h2>Nuovo Motivo</h2>                 
                     
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

                    <th>Descrizione</th>
                    <th>Info</th>
                    <th>Elimina</th>
                    
                </thead>

                <tbody>
                    @foreach($motivos as $motivo)
                        
                        <tr>

                            <td>{{$motivo->descrizione}}</td>

                            
                            <td class="text-center">
                                <a href="{{route('info_motivi', $motivo->id)}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('delete_motivi', $motivo->id)}}">
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
