@extends('layouts.app')



    <div class="container body" style="background-color: white">
        <div class="main_container" style="background-color: white">

<div class="container" style="background-color: white">

        <div class="col-lg-8" style="background-color: white">

     
                <h3>Variazione di orario per il giorno: {{$date}}</h3> 

                <table class="table table-bordered">
                  <thead>
                    <th>Professori Assenti</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>Motivo Assenza</th>
                  </thead>


                  <tbody>
                    @foreach($permessos as $permesso)
                      <tr>
                        <td width="29%">{{$permesso->nome.' '.$permesso->cognome}}</td>

                        @foreach([1,2,3,4,5,6,7] as $ora)
                          <td width="5%">
                            @if($ora == $permesso->ora)
                              {{$permesso->anno.' '.$permesso->sigla}}
                            @endif
                          </td>
                        @endforeach

                        <td width="36%">{{$permesso->descrizione}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>

                <table class="table table-bordered">
                  <thead>
                    <th>Professori che subiscono cambiamenti</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>7</th>
                    <th>Annotazioni</th>
                    <th>Firma</th>
                  </thead>


                  <tbody>

                    @foreach($sostituziones as $sostituzione)
                      @if($sostituzione->cognome != 'entrata_posticipata' && $sostituzione->cognome != 'uscita_anticipata')
                        <tr>
                          <td width="15%">{{$sostituzione->nome.' '.$sostituzione->cognome}}</td>

                          @foreach([1,2,3,4,5,6,7] as $ora)
                            <td width="5%">
                              @if($ora == $sostituzione->ora)
                                {{$sostituzione->anno.' '.$sostituzione->sigla}}
                              @endif
                            </td>
                          @endforeach

                          <td width="25%">{{$sostituzione->materia_nome}}</td>
                          <td width="25%"></td>
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>


              

              
              


            

        </div>

    </div>
        </div>
    </div>

@section('styles')
    {{ Html::style(mix('assets/admin/css/admin.css')) }}
@endsection
<style type="text/css">
  body {
    background:white !important;
    color:black !important;

  }
</style>
@section('scripts')
    {{ Html::script(mix('assets/admin/js/admin.js')) }}
@endsection