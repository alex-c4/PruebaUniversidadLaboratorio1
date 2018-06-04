@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow bounceInLeft" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <div class="section-header">

        <h3>Registro Quiniela</h3>
        <p>Panel para la creación y registro de las predicciones de los juegos del mundial Rusia 2018</p>

        <div class="container">

            <div class="row">
                <div class="col-12" id="div-container-quinielaPanel"></div>
            </div>
                
            <div class="section-header">
                    <h3>Registro Juegos</h3>
                    <p>Módulo para el registro de pronósticos</p>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        
                        <input type="hidden" name="quiniela_id" id="quiniela_id" value="{{ $info['id_quiniela'] }}">
                        <input type="hidden" name="championship_id" id="championship_id" value="{{ $info['id_championship'] }}">

                        <div class="container">
                            <div class="row align-items-center">
                                @foreach($games as $game)
                                    
                                    <div class="col-12 text-center font-italic text-info">
                                        {{ $game->date }}
                                    </div>
                                    <div class="col-12 text-center font-weight-light">
                                    <span class="text-success"> {{ $game->estadium }} </span> / <span class="font-weight-bold">Grupo {{ $game->grupo }}</span>
                                    </div>
                                    <div class="col-4 text-right">
                                    {{ $game->nombre_club_1}}<img src="{{ asset('img/banderas/Francia.png') }}" alt="">
                                    </div>
                                    <div class="col-2">
                                    <input type="number" id="input_{{ $game->id }}_1" name="input_{{ $game->id }}_1" class="form-control col-sm" max="99" min="0" >
                                    </div>
                                    <div class="col-2">
                                    <input type="number" id="input_{{ $game->id }}_2" name="input_{{ $game->id }}_2" class="form-control col-sm" max="99" min="0" >
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('img/banderas/Rusia.png') }}" alt="">{{ $game->nombre_club_2 }} 
                                    </div>
                                @endforeach
                            </div>
                            
                        </div>
                    
            </div>
        

        </div

        <br>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
        
    </div>
    
</form>

</section>

@endsection