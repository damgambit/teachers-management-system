@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_classi_concorso')}}" method="post">
              <h3>Nuova classe concorso</h3>

              <div class="form-group">
                <label for="sigla">Sigla classe concorso</label>
                <input type="text" name="sigla" class="form-control" id="sigla" aria-describedby="sigla" placeholder="Inserire sigla clase concorso">
              </div>
              {{csrf_field()}}
              <button type="submit" class="btn btn-primary">Aggiungi</button>
            </form>


            <br><br>

            <table class="table table-bordered table-hover table-condensed table-striped">

                <thead>
                    <th>Nome Classe Concorso</th>
                    <th>Materie</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($ccs as $cc)
                        <tr>
                            <td>{{$cc->sigla}}</td>
                            
                            <td class="text-center">
                                <a href="{{route('materie_classi_concorso', $cc->id)}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </button>
                                </a>
                            </td>

                            <td class="text-center">
                                <a href="{{route('delete_classi_concorso', $cc->id)}}">
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
