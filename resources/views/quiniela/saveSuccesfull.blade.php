@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow bounceInLeft" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <div class="section-header">

        <h3>Registro</h3>
        <p>Su registro de pronóstico fue llevado a cabo correctamente!</p>

        <div class="container">
            <div >
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Registro Satisfactorio</h4>
                    <p>Su registro fue exitoso!, Gracias por preferirnos, el equipo de XportGold les desea mucho éxito en su pronostico!</p>
                    <p><a href="{{ route('searchPronostics') }}" class="btn btn-outline-info">Ver mis quinielas</a></p>
                </div>
            </div>
        </div>