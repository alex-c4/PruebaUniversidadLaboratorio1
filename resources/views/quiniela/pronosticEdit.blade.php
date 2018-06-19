@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <input type="hidden" id="routeCurrent" value="{{ url('/') }}">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="section-header">

        <h3>Edición Juegos</h3>
        <p>Módulo para la edición de pronósticos</p>

        <div class="container">

            <p><a href="{{ route('searchPronostics') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i>&nbsp;Regresar</a></p>
            @if(true)
                <div class="container">
                    <div >
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Tiempo agotado</h4>
                            <p>El tiempo para el registro de pronósticos se ha agotado</p>
                        </div>
                    </div>
                </div>

            @else
                <div class="row align-items-center">
                    @foreach($pronosticsDetails as $pronostic)
                        
                        <div class="col-12 text-center font-italic text-info">
                            {{ $pronostic->date }}
                        </div>
                        <div class="col-12 text-center font-weight-light">
                            <span class="text-success">  {{$pronostic->estadium}}  </span> / <span class="font-weight-bold">Grupo {{ $pronostic->grupo }} &nbsp; </span> <span id="actualizado_{{ $pronostic->pronostic_id }}" class="text-info" style="size:8px"></span>
                        </div>
                        <div class="col-3 text-right">
                            {{ $pronostic->nombre_club_1}}<img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_1 }}" alt="">
                        </div>
                        <div class="col-2">
                            <input type="number" id="input_{{ $pronostic->pronostic_id }}_1" name="input_{{ $pronostic->pronostic_id }}_1" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->pronostic_club_1 }}" >
                        </div>

                        <div class="col-2 text-center">
                            <button id="btnUpdatePronostic" name="btnUpdatePronostic" type="button" onclick="updatePronostic({{ $pronostic->pronostic_id }})" class="btn btn-primary btn-sm"><i class="fa fa-refresh fa-sm"></i></button>
                        </div>

                        <div class="col-2">
                            <input type="number" id="input_{{ $pronostic->pronostic_id }}_2" name="input_{{ $pronostic->pronostic_id }}_2" class="form-control col-sm" max="99" min="0" value="{{ $pronostic->pronostic_club_2 }}" >
                        </div>
                        <div class="col-3">
                            <img src="{{ asset('img/banderas/') }}/{{ $pronostic->img_club_2 }}" alt="">{{ $pronostic->nombre_club_2 }} 
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

</section>

@endsection