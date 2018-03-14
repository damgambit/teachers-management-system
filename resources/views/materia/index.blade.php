@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-8">

            <table class="table table-bordered table-hover table-responsive">

                <thead>
                    <th>Nome materia</th>
                    <th>Modifica</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($materias as $materia)
                        <tr>
                            <td>{{$materia->nome}}</td>
                            <td>{{$materia->nome}}</td>
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
