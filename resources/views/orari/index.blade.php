@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_orario_doc')}}" method="post">
              <fieldset>
     
                <h2>Orario Docente</h2>                 
                    
            
                  
                  <div class="form-group">
                    <label for="docente_id">Docente</label>
                    <select class="form-control" name="docente_id" required>
                        @foreach($docentes as $docente)
                            <option value="{{$docente->id}}">
                                {{$docente->nome}} {{$docente->cognome}}
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
