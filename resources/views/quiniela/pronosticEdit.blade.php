@extends('layoutMenu')

@section('content')


<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>


<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
    <input type="hidden" id="routeComparePronostic" value="{{ route('quiniela.pronosticCompare') }}">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="section-header">

        <h3>Edición Juegos</h3>
        <p class="mb-1 pb-1">Módulo para la edición de pronósticos</p>

        <div class="container table-font13">

            <p class="mb-1 pb-1"><a href="{{ url('quiniela.searchPronostics') }}" class="btn btn-dark btn-sm"><i class="fa fa-arrow-left"></i></a></p>
            
            @if($showGames == 1)
                <div class="row align-items-center">
                    @foreach($pronosticsDetails as $key => $pronostic)
                        
                        <div class="col-12 text-center font-italic text-info">
                            {{ $pronostic->date }}
                        </div>
                        <div class="col-12 text-center font-weight-light">
                            <span class="text-success">  {{$pronostic->stadium}}  </span> @if($pronostic->grupo != "0") / <span class="font-weight-bold">Grupo {{ $pronostic->grupo }} &nbsp;</span> @endif <span id="actualizado_{{ $pronostic->pronostic_id }}" class="text-info" style="size:8px"></span>
                        </div>
                        <div class="col-3 text-right">
                            @if($pronostic->nombre_club_1 == "") {{ $pronostic->nombre_club_1_long }} @else {{ $pronostic->nombre_club_1}} @endif<img src="{{ asset('img/banderas/') }}/{{ $pronostic->imagen_logo_1 }}" alt="" id="imgA_{{ $key }}">
                        </div>
                        <div class="col-2">
                            <input type="number" id="input_{{ $pronostic->pronostic_id }}_1" name="input_{{ $pronostic->pronostic_id }}_1" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->pronostic_club_1 }}" >
                        </div>

                        <div class="col-2 text-center">
                            <button id="btnUpdatePronostic" name="btnUpdatePronostic" type="button" onclick="updatePronostic({{ $pronostic->pronostic_id }})" class="btn btn-primary btn-sm" title="Actualizar pronóstico"><i class="fa fa-refresh fa-sm"></i></button>
                            <button id="btnComparePronostic" name="btnComparePronostic" type="button" data-imga="imgA_{{ $key }}" data-imgb="imgB_{{ $key }}" data-namea="@if($pronostic->nombre_club_1 == ''){{ $pronostic->nombre_club_1_long }}@else{{ $pronostic->nombre_club_1}}@endif" data-nameb="@if($pronostic->nombre_club_2 == ''){{ $pronostic->nombre_club_2_long }}@else{{ $pronostic->nombre_club_2}}@endif" data-idgame="{{ $pronostic->game_id }}" data-idquiniela="{{ $pronostic->id_quiniela }}" class="btn btn-outline-secondary btn-sm" title="Comparar pronóstico" data-toggle="modal" data-target="#compareModal"><i class="fa fa-users fa-sm"></i></button>
                        </div>

                        <div class="col-2">
                            <input type="number" id="input_{{ $pronostic->pronostic_id }}_2" name="input_{{ $pronostic->pronostic_id }}_2" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->pronostic_club_2 }}" >
                        </div>
                        <div class="col-3">
                            <img src="{{ asset('img/banderas/') }}/{{ $pronostic->imagen_logo_2 }}" alt="" id="imgB_{{ $key }}">@if($pronostic->nombre_club_2 == "") {{ $pronostic->nombre_club_2_long }} @else {{ $pronostic->nombre_club_2 }} @endif 
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Información</h4>
                    <p>El juego ya a comenzado.</p>
                    <hr>
                    <p class="mb-0">¡Lo invitamos a estar atentos a los próximos juegos que estaremos registrando, gracias!</p>
                </div>
            @endif
        </div>
    </div>

</section>


<!-- Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="compareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="compareModalLabel">Comparación de pronósticos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row table-font13">
                <div class="row col-12">
                    
                    <div class="col-6">&nbsp;</div>
                    <div class="col-3 text-center">
                        <div id="spanNameA" style="font-weight: bold; font-size: medium;">>
                            
                        </div>
                        <!-- <span</span> -->
                        <br>
                        <img src="{{ asset('img/banderas/') }}/escudo_default.png" alt="" id="modalImgA">
                    </div>
                    <div class="col-3 text-center">
                        <div id="spanNameB" style="font-weight: bold; font-size: medium;"></div>
                        <!-- <span></span> -->
                        <br>
                        <img src="{{ asset('img/banderas/') }}/escudo_default.png" alt="" id="modalImgB">
                    </div>

                </div>
                <div class="row col-12" id="modalContent">

                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


@endsection