@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">
        <h2>Classe concorso: {{$cc->sigla}}</h2>
        <div class="col-lg-7">

            <form action="{{route('add_ccmateria')}}" method="post">
              <h3>Aggiungi materia a classe concorso</h3>

              <div class="form-group">
                <label for="materia_id">Seleziona materia</label>
                <select name="materia_id" class="form-control" id="materia_id" >
                    @foreach($materias as $materia)
                        <option value="{{$materia->id}}">{{$materia->nome}}</option>
                    @endforeach
                </select>
              </div>

              <input type="hidden" value="{{$cc->id}}" name="classi_concorso_id">
              {{csrf_field()}}
              <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>


            <br><br>

            <table class="table table-bordered table-hover table-condensed table-striped">

                <thead>
                    <th>Nome Materia</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($cc_materias as $cc_materia)
                        <tr>
                            <td>{{$cc_materia->nome}}</td>
                            


                            <td class="text-center">
                                <a href="{{route('delete_ccmateria', [$cc->id, $cc_materia->id])}}">
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
