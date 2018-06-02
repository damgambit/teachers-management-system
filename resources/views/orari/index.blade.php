@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_orario_doc')}}" method="get">
              <fieldset>
     
                <h2>Orario Docente</h2>                 
                    
            
                  
                  <div class="form-group">
                    <label for="docente_id">Docente</label>
                    <select class="form-control" name="docente_id" required>
                        @foreach($docentes as $docente)
                            <option value="{{$docente->id}}">
                                {{$docente->cognome}} {{$docente->nome}} 
                            </option>
                        @endforeach
                    </select>
                  </div>  




                  {{csrf_field()}}


                  <button type="submit" class="btn btn-primary">Orario Docente</button>

                 </fieldset>

            </form>


            <br><hr><br>



            <form action="{{route('show_orario_classe')}}" method="get">
              <fieldset>
     
                <h2>Orario Classe</h2>                 
                    
            
                  
                  <div class="form-group">
                    <label for="classe_id">Classe</label>
                    <select class="form-control" name="classe_id" required>
                        @foreach($classes as $classe)
                            <option value="{{$classe->id}}">
                                {{$classe->anno}} {{$classe->sigla}} 
                            </option>
                        @endforeach
                    </select>
                  </div>  




                  {{csrf_field()}}

         
                  <button type="submit" class="btn btn-primary">Orario Classe</button>

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
