@extends('layouts.app')



    <div class="container body" style="background-color: white">
        <div class="main_container" style="background-color: white">

<div class="container" style="background-color: white">

        <div class="col-lg-8" style="background-color: white">

     
                <h3>Variazione di orario per il giorno: {{$date}}</h3> 


                <table class="table table-bordered">
                  <thead>
                    <th>Classe</th>
                    <th>Entrata Posticipata</th>
                    <th>Uscita Anticipata</th>
                    <th>Firma</th>
                  </thead>


                  <tbody>



                    @foreach($sostituziones as $sostituzione)
                      @if($sostituzione->cognome == 'entrata_posticipata')
                          <tr>
                            <td width="25%">{{$sostituzione->anno.' '.$sostituzione->sigla}}</td>

                            
                              <td width="15%">
                                {{$utils[$sostituzione->ora]}}
                              </td>

                              <td width="15%">
                              </td>

                 

                            <td width="45%"></td>
                          </tr>
                      @elseif($sostituzione->cognome == 'uscita_anticipata')
                          <tr>
                            <td width="25%">{{$sostituzione->anno.' '.$sostituzione->sigla}}</td>

                            
                              <td width="15%">
                                
                              </td>

                              <td width="15%">
                                {{$utils[($sostituzione->ora - 1)]}}
                              </td>

                 

                            <td width="45%"></td>
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