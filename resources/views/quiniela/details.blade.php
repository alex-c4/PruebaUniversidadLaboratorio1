@extends('layoutMenu')

@section('content')


<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>


<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="section-header">

        <h3>Registro Quiniela</h3>
        <p>Panel para la creación y registro de las predicciones de los juegos del campeonato</p>

        <div class="container">

            <div class="row">
                <div class="col-12" id="div-container-quinielaPanel"></div>
            </div>
                @foreach($games as $game)

                <div class="row align-items-center">
                    <div class="col-12 text-center font-italic text-info">
                        - {{ $game->date }} -
                    </div>
                    <div class="col-12 text-center font-weight-light">
                    <span class="text-success"> Estadio {{ $game->stadium }} </span> / <span class="font-weight-bold">Grupo A</span>
                    </div>
                    <div class="col-4 text-right">
                        {{ $game->nombre_club_1 }}<img src="{{ asset('img/banderas') }}/{{ $game->nombre_club_1 }}.png" >
                    </div>
                    <div class="col-2">
                    <input type="number" id="{{ $game->id_quiniela }}_{{ $game->id_game }}_1" name="{{ $game->id_quiniela }}_{{ $game->id_game }}_1" class="form-control col-sm" value="0" max="99" min="0" >
                    </div>
                    <div class="col-2">
                    <input type="number" id="{{ $game->id_quiniela }}_{{ $game->id_game }}_2" name="{{ $game->id_quiniela }}_{{ $game->id_game }}_2" class="form-control col-sm" value="0" max="99" min="0" >
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('img/banderas') }}/{{ $game->nombre_club_2 }}.png" >{{ $game->nombre_club_2 }} 
                    </div>
                </div>

                @endforeach  
                <br>

                <div class="text-center">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
        
        </div>
    </div>

</section>

@endsection