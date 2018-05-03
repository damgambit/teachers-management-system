@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_orario_doc')}}" method="post">
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
                            <td> #ci devi mettere una select con tutte le classi e una select con tutte le materie in un form bravo ciao a dopo <34<3<3<3<3<3<3
                        </tr>

                    @endforeach

                    
                </tbody>

            </table>
                  




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
                  <button type="submit" class="btn btn-primary">Orario</button>

                 </fieldset>

              
              
            </form>


            

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
