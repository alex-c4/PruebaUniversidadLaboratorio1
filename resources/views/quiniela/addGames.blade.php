@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<style>
    .msgTimezone{
        text-align: center;
        font-size: 12px;
        padding: 10px;
        font-style: italic;
    }
</style>
<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<form method="POST" action="{{ route('savePronostic') }}" id="formAddPronostics">

    <div class="section-header">

        <h3>Registro XportGames</h3>
        
        <p>Panel para la creación y registro de las predicciones de los juegos del campeonato</p>
        <div class="msgTimezone">Los horarios corresponden a <b>{{ UserUtils::getTimeZoneString() }}</b></div>

        <div class="container">

            <div class="row">
                <div class="col-12" id="div-container-quinielaPanel"></div>
            </div>
                
            <div class="section-header">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                
                <input type="hidden" name="quiniela_id" id="quiniela_id" value="{{ $info['id_quiniela'] }}">
                <input type="hidden" name="championship_id" id="championship_id" value="{{ $info['id_championship'] }}">

                @if($showGames == 1)
                    <div class="container">
                        <div class="row align-items-center">

                                @foreach($games as $game)
                                    
                                    <div class="col-12 text-center font-italic text-info">
                                        {{ $game->date }} 
                                    </div>
                                    <div class="col-12 text-center font-weight-light">
                                        <span class="text-success"> {{ $game->stadium }} </span> @if($game->grupo != "0") / <span class="font-weight-bold">Grupo {{ $game->grupo }} @endif</span>
                                    </div>
                                    <div class="col-4 text-right">
                                        @if($game->nombre_club_1 == "")
                                            {{ $game->nombre_club_1_long}}<img src="{{ asset('img/banderas/') }}/{{ $game->img_club_1 }}" alt="">
                                        @else
                                            {{ $game->nombre_club_1}}<img src="{{ asset('img/banderas/') }}/{{ $game->img_club_1 }}" alt="">
                                        @endif
                                    </div>
                                    <div class="col-2">
                                        <input type="number" id="input_{{ $game->id }}_1" name="input_{{ $game->id }}_1" class="form-control col-sm" max="99" min="0" >
                                    </div>
                                    <div class="col-2">
                                        <input type="number" id="input_{{ $game->id }}_2" name="input_{{ $game->id }}_2" class="form-control col-sm" max="99" min="0" >
                                    </div>
                                    <div class="col-4">
                                        @if($game->nombre_club_2 == "")
                                            <img src="{{ asset('img/banderas/') }}/{{ $game->img_club_2 }}" alt="">{{ $game->nombre_club_2_long}}
                                        @else
                                            <img src="{{ asset('img/banderas/') }}/{{ $game->img_club_2 }}" alt="">{{ $game->nombre_club_2}}
                                        @endif
                                    </div>
                                @endforeach
                            
                        </div>
                        
                    </div>

                    <br>

                    <p><b>Nota</b> se tomaran los goles para el pronostico solo hasta el tiempo de juego mas tiempo reglamentario sin tomar en cuenta los penaltis si aplica.</p>

                    <br>
                    
                    
                    <div class="text-center">
                        <button type="button" id="btnAddPronostic" name="btnAddPronostic" class="btn btn-success">Enviar</button>
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
        

        </div

        
    </div>
    
</form>

</section>

@endsection