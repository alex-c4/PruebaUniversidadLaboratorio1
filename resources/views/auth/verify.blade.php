@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow fadeInUp" padding >
<div style='padding: 50px;'>
    <div class="section-header">
        <h3>Verificación</h3>
        <p>Comprobación y validación del correo electrónico</p>
    </div>
    <div >
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading">{!! $title !!}</h4>
            <p>{!! $message !!}</p>
            <hr>
            <p class="mb-0">{!! $footer !!}</p>
        </div>
    </div>
</div>
    
</section>

@endsection