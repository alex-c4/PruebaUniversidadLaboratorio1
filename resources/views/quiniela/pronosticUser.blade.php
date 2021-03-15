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

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="section-header">

        <h3>Pronósticos</h3>
        <p>{{ $championshipDetail->championshipName }} / <b>{{ $championshipDetail->quinielaName }}</b></p>

        <div class="container table-font13">
<!--             
            <p>
            </p> -->

            <div class="row align-items-center">
                <div class="col-12 text-center font-weight-bold">
                        <span class="text-info">Usuario: </span>{{ $puntuacion['0']->name." ".$puntuacion['0']->lastName}}
                        <br/>
                        <span class="text-info">Total: </span><strong class="textGold">{{ $puntuacion['0']->puntos}} Ptos.</strong>                          
                        <br/>
                        <a href="{{ route('result.positionsTable') }}" class="btn btn-dark btn-sm" title="Regresar tabla de posiciones"><i class="fa fa-arrow-left"></i></a>
                        </div>          
                @foreach($pronosticsDetails as $pronostic)
                    <!--                     
                    <div class="col-12 text-center font-italic text-info">
                         PRONOSTICO                         
                    </div> -->
                    <div class="col-12 text-center font-weight-light mt-4">
                        <span class="text-success">  {{ $pronostic->date }} / {{$pronostic->stadium}}  </span> @if($pronostic->grupo != "") @endif</span> <span id="actualizado_{{ $pronostic->pronostic_id }}" class="text-info" style="size:8px"></span>
                    </div>
                    <div class="col-4 text-right">
                        @if($pronostic->nombre_club_1 == "") {{ $pronostic->nombre_club_1_long }} @else {{ $pronostic->nombre_club_1 }} @endif <img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_1 }}" alt="">
                    </div>
                    <div class="col-2 ">
                        <input type="text" id="input_{{ $pronostic->pronostic_id }}_1" name="input_{{ $pronostic->pronostic_id }}_1" class="form-control col-sm text-right" max="99" min="0" value="{{ $pronostic->pronostic_club_1 }}" disabled="true" >
                    </div>

                    <div class="col-2">
                        <input type="text" id="input_{{ $pronostic->pronostic_id }}_2" name="input_{{ $pronostic->pronostic_id }}_2" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->pronostic_club_2 }}" disabled="true" >
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_2 }}" alt="">@if($pronostic->nombre_club_2 == "") {{ $pronostic->nombre_club_2_long }} @else {{ $pronostic->nombre_club_2 }} @endif
                    </div>

                    <!--    + +++++      segunda linea, se muestran resultados del juego               ++++++        -->

                    @if($pronostic->game_estatus == 'finalizado')
                        <div class="col-12 text-center font-italic text-info">
                             Resultado del Juego
                        </div>
                        
                        <div class="col-4">&nbsp;</div>
                        <div class="col-2 ">
                            <div class="resultadoRight">{{ $pronostic->resultado_club_1 }}</div>
                        </div>
                        <div class="col-2">
                            <div class="resultadoLeft">{{ $pronostic->resultado_club_2 }}</div>
                        </div>
                        <div class="col-4">&nbsp;</div>   
                        <div class="col-12 text-center font-italic text-info">Puntos Obtenidos :<span class="font-weight-bold">{{ $pronostic->pronostic_score}} Pts. </span></div>
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

@endsection