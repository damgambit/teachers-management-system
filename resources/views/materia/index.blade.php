@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_materia')}}" method="post">
              <h3>Nuova materia</h3>

              <div class="form-group">
                <label for="nome">Nome materia</label>
                <input type="text" name="nome" class="form-control" id="nome" aria-describedby="nome" placeholder="Inserire Nome Materia">
              </div>
              {{csrf_field()}}
              <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>


            <br><br>

            <table class="table table-bordered table-hover table-condensed table-striped">

                <thead>
                    <th>Nome materia</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($materias as $materia)
                        <tr>
                            <td>{{$materia->nome}}</td>
                            
     

                            <td class="text-center">
                                <a href="{{route('delete_materia', $materia->id)}}">
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
