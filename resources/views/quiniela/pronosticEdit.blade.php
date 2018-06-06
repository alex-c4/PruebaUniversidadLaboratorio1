@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <div class="section-header">

        <h3>Edición Juegos</h3>
        <p>Módulo para la edición de pronósticos</p>

        <div class="container">

            lista de pronosticos

        </div>
    </div>

</section>

@endsection