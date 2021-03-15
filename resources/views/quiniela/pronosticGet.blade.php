@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>


<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<form method="POST" action="" method>

    <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
    <input type="hidden" id="routeComparePronostic" value="{{ route('quiniela.pronosticCompare') }}">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="section-header">

        <h3>Pronósticos</h3>
        <p class="mb-1 pb-1">Módulo para la consulta de pronósticos</p>

        <div class="container table-font13">
            
            <p class="mb-1 pb-1">
                <a href="{{ url('quiniela.searchPronostics') }}" class="btn btn-dark btn-sm" title="Regresar"><i class="fa fa-arrow-left"></i></a>
                &nbsp;
                <a href="{{ route('pronosticEdit', $betId) }}" class="btn btn-primary btn-sm @if(UserUtils::isStartedChampionship($quiniela_id)) disabled @endif" title="Editar"><i class="fa fa-pencil"></i></a>
            </p>

            <div class="row align-items-center">
                <div class="col-12 text-center font-weight-bold mb-3">
                        <!-- <span class="text-info">Pronóstico Nro: </span>{{$puntuacion['0']->bet_id }} -->
                        <span class="text-info">Usuario: </span>{{ $puntuacion['0']->name." ".$puntuacion['0']->lastName}}
                        <span class="text-info">Total: </span><strong class="textGold">{{ $puntuacion['0']->puntos}} Ptos.</strong>                          
                </div>          
                @foreach($pronosticsDetails as $key => $pronostic)
                    
                    <div class="col-12 text-center font-italic text-info">
                         PRONOSTICO                         
                    </div>
                    <div class="col-12 text-center font-weight-light">
                        <span class="text-success">  {{ $pronostic->date }} / {{$pronostic->stadium}}  </span> @if($pronostic->grupo != "") @endif</span> <span id="actualizado_{{ $pronostic->pronostic_id }}" class="text-info" style="size:8px"></span>
                    </div>
                    <div class="col-3 text-right">
                        @if($pronostic->nombre_club_1 == "") {{ $pronostic->nombre_club_1_long }} @else {{ $pronostic->nombre_club_1 }} @endif <img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_1 }}" alt="" id="imgA_{{ $key }}">
                    </div>
                    <div class="col-2 ">
                        <input type="text" id="input_{{ $pronostic->pronostic_id }}_1" name="input_{{ $pronostic->pronostic_id }}_1" class="form-control col-sm text-right" max="99" min="0" value="{{ $pronostic->pronostic_club_1 }}" disabled="true" >
                    </div>

                    <div class="col-2 text-center">
                        <button id="btnComparePronostic" name="btnComparePronostic" type="button" data-imga="imgA_{{ $key }}" data-imgb="imgB_{{ $key }}" data-namea="@if($pronostic->nombre_club_1 == ''){{ $pronostic->nombre_club_1_long }}@else{{ $pronostic->nombre_club_1}}@endif" data-nameb="@if($pronostic->nombre_club_2 == ''){{ $pronostic->nombre_club_2_long }}@else{{ $pronostic->nombre_club_2}}@endif" data-idgame="{{ $pronostic->game_id }}" data-idquiniela="{{ $pronostic->id_quiniela }}" class="btn btn-outline-secondary btn-sm" title="Comparar pronóstico" data-toggle="modal" data-target="#compareModal"><i class="fa fa-users fa-sm"></i></button>
                    </div>

                    <div class="col-2">
                        <input type="text" id="input_{{ $pronostic->pronostic_id }}_2" name="input_{{ $pronostic->pronostic_id }}_2" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->pronostic_club_2 }}" disabled="true" >
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_2 }}" alt="" id="imgB_{{ $key }}">@if($pronostic->nombre_club_2 == "") {{ $pronostic->nombre_club_2_long }} @else {{ $pronostic->nombre_club_2 }} @endif
                    </div>

                    <!--    + +++++      segunda linea, se muestran resultados del juego               ++++++        -->

                    @if($pronostic->game_estatus == 'FINALIZADO')
                        <div class="col-12 text-center font-italic text-info">
                             RESULTADO
                        </div>
                        
                        <div class="col-3 text-right">
                            {{ $pronostic->nombre_club_1}}<img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_1 }}" alt="">
                        </div>
                        <div class="col-3 ">
                            <input type="text" id="input_{{ $pronostic->pronostic_id }}_3" name="input_{{ $pronostic->pronostic_id }}_3" class="form-control col-sm text-right" max="99" min="0" value="{{ $pronostic->resultado_club_1 }}" disabled="true" >
                        </div>
                        <div class="col-3">
                            <input type="text" id="input_{{ $pronostic->pronostic_id }}_4" name="input_{{ $pronostic->pronostic_id }}_4" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->resultado_club_2 }}" disabled="true" >
                        </div>
                        <div class="col-3">
                            <img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_2 }}" alt="">{{ $pronostic->nombre_club_2 }} 
                        </div>   
                         <div class="col-12 text-center font-italic text-success">
                             Puntos Obtenidos :<span class="font-weight-bold">{{ $pronostic->pronostic_score}} Pts. </span> 
                        </div>
                        <div>&nbsp;</div>
                    @else
                        <div class="col-12 text-center font-italic font-weight-bold">
                             Juego {{$pronostic->game_estatus }}
                        </div>
                    @endif
                    

                @endforeach
            </div>

        </div>
    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="compareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header modalHeader_xg">
          <img src="{{ asset('img/logo3_03.png') }}" alt="" srcset="">
        <h5 class="modal-title" id="compareModalLabel">Comparación de pronósticos</h5>
        <button type="button" class="close iconClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalBody_xg">
        <div class="container-fluid">
            <div class="row table-font13">
                <div class="row col-12">
                    
                    <div class="col-4">&nbsp;</div>
                    <div class="col-4 text-center">
                        <div id="spanNameA" style="font-weight: bold; font-size: medium;">>
                            
                        </div>
                        <!-- <span</span> -->
                        <br>
                        <img src="{{ asset('img/banderas/') }}/escudo_default.png" alt="" id="modalImgA">
                    </div>
                    <div class="col-4 text-center">
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
      <div class="modal-footer modalFooter_xg">
        <button type="button" class="btn btnCancelXG btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

    <script src="{{ asset('js/quiniela.js') }}"></script>

@endsection
