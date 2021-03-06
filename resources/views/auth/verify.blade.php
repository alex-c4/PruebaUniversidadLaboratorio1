@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" padding >
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
    
@extends('layoutLogin');

</section>

@endsection