@extends('admin.layouts.admin')

@section('content')
    
    <div class="container">

        <div class="col-lg-7">

            <form action="{{route('create_permessi')}}" method="post">
              <fieldset>
     
                <h2>Nuovo Permesso</h2>                 
                     
                  <div class="form-group">
                    <label for="giorno">Giorno</label>
                    <select class="form-control" name="giorno" required>
                        <option value="lun">lun</option>
                        <option value="mar">mar</option>
                        <option value="mer">mer</option>
                        <option value="gio">gio</option>
                        <option value="ven">ven</option>
                    </select>
                  </div>


                  <div class="form-group">
                    <label for="ora">Ora</label>
                    <select class="form-control" name="ora" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                  </div>
                     
                  <div class="form-group">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" name="data" placeholder="Inserisci il data ..." required>
                  </div> 
                     
                  
                  <div class="form-group">
                    <label for="docente_id">Docente</label>
                    <select class="form-control" name="docente_id" required>
                        @foreach($docentes as $docente)
                            <option value="{{$docente->id}}">
                                {{$docente->cognome}}
                            </option>
                        @endforeach
                    </select>
                  </div>  

                  <div class="form-group">
                    <label for="motivo_id">Motivo</label>
                    <select class="form-control" name="motivo_id" required>
                        @foreach($motivos as $motivo)
                            <option value="{{$motivo->id}}">
                                {{$motivo->descrizione}}
                            </option>
                        @endforeach
                    </select>
                  </div>  

                  <div class="form-group">
                    <label for="recupero">Recupero necessario</label>
                    <input type="checkbox"  name="recupero">

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
                    <th>Giorno</th>
                    <th>Ora</th>
                    <th>Data</th>
                    <th>Docente</th>
                    <th>Motivo</th>
                    <th>Recupero</th>
                    <th>Elimina</th>
                </thead>

                <tbody>
                    @foreach($permessos as $permesso)
                        <tr>
                            <td>{{$permesso->giorno}}</td>
                            <td>{{$permesso->ora}}</td>
                            <td>{{$permesso->data}}</td>
                            <td>{{$permesso->cognome}}</td>
                            <td>{{$permesso->descrizione}}</td>
                            @if($permesso->recupero === 1)
                                <td>
                                    
                                    <form method="post" action="{{route('update_recupero', $permesso->id)}}">
                                        <input type='hidden' value='0' name='recupero'>
                                        Recupero Necessario
                                        <button type="submit" class="btn btn-success">Conferma Recupero</button>

                                        {{csrf_field()}}
                                    </form>
                                </td>


                            @else
                                <td>Recupero Non Necessario o Recuperato</td>
                            @endif

                            
                        

                            <td class="text-center">
                                <a href="{{route('delete_permessi', $permesso->id)}}">
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
