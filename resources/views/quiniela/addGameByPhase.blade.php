@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form id="formAddPronosticsByPhase" method="POST" action="{{ route('savePronosticByPhase') }}" method>

    <input type="hidden" id="routeCurrent" value="{{ url('/') }}">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <input type="hidden" name="hbet_id" value="{{ $bet_id }}">
    <input type="hidden" name="hid_quiniela" value="{{ $id_quiniela }}">
    

    <div class="section-header">

        <h3>Adicición de Juegos por Fase</h3>
        <p>Módulo para la adición de pronósticos por Fase</p>

        <div class="container">

            <p><a href="{{ route('addPronosticsNewPhase') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>&nbsp;Regresar</a></p>
            
                <div class="row align-items-center">
                @foreach($games as $game)
                                        
                    <div class="col-12 text-center font-italic text-info">
                        {{ $game->date }}
                    </div>
                    <div class="col-12 text-center font-weight-light">
                    <span class="text-success"> {{ $game->estadium }} </span> / <span class="font-weight-bold">Grupo {{ $game->grupo }}</span>
                    </div>
                    <div class="col-4 text-right">
                    {{ $game->nombre_club_1}}<img src="{{ asset('img/banderas/') }}/{{ $game->img_club_1 }}" alt="">
                    </div>
                    <div class="col-2">
                    <input type="number" id="input_{{ $game->id }}_1" name="input_{{ $game->id }}_1" class="form-control col-sm" max="99" min="0" >
                    </div>
                    <div class="col-2">
                    <input type="number" id="input_{{ $game->id }}_2" name="input_{{ $game->id }}_2" class="form-control col-sm" max="99" min="0" >
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('img/banderas/') }}/{{ $game->img_club_2 }}" alt="">{{ $game->nombre_club_2 }} 
                    </div>
                @endforeach
                    
                    
                </div>
        </div>

        <br>
        
        <div class="text-center">
            <button type="button" id="btnAddPronosticByPhase" name="btnAddPronosticByPhase" class="btn btn-success">Enviar</button>
        </div>

    </div>

    </form>

</section>

@endsection