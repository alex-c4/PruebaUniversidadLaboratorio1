@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form method="POST" action="" method>

    <input type="hidden" id="routeCurrent" value="{{ url('/') }}">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="section-header">

        <h3>Pronósticos</h3>
        <p>Módulo para la consulta de pronósticos</p>

        <div class="container">

            <div class="row align-items-center">
                <div class="col-12 text-center font-weight-bold">
                        <span class="text-info">Pronóstico Nro: </span>{{$puntuacion['0']->bet_id }}
                        <span class="text-info">Usuario:</span>{{ $puntuacion['0']->name." ".$puntuacion['0']->lastName}}
                        <span class="text-info">Total:</span> <strong class="textGold">{{ $puntuacion['0']->puntos}} Ptos.</strong>                          
                </div>          
                @foreach($pronosticsDetails as $pronostic)
                    
                    <div class="col-12 text-center font-italic text-info">
                         PRONOSTICO                         
                    </div>
                    <div class="col-12 text-center font-weight-light">
                        <span class="text-success">  {{ $pronostic->date }} / {{$pronostic->estadium}}  </span> / <span class="font-weight-bold">Grupo {{ $pronostic->grupo }} &nbsp; </span> <span id="actualizado_{{ $pronostic->pronostic_id }}" class="text-info" style="size:8px"></span>
                    </div>
                    <div class="col-3 text-right">
                        {{ $pronostic->nombre_club_1}}<img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_1 }}" alt="">
                    </div>
                    <div class="col-3 ">
                        <input type="text" id="input_{{ $pronostic->pronostic_id }}_1" name="input_{{ $pronostic->pronostic_id }}_1" class="form-control col-sm text-right" max="99" min="0" value="{{ $pronostic->pronostic_club_1 }}" disabled="true" >
                    </div>

                    <div class="col-3">
                        <input type="text" id="input_{{ $pronostic->pronostic_id }}_2" name="input_{{ $pronostic->pronostic_id }}_2" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->pronostic_club_2 }}" disabled="true" >
                    </div>
                    <div class="col-3">
                        <img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_2 }}" alt="">{{ $pronostic->nombre_club_2 }} 
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

@endsection