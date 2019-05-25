@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>


<hr/>
<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<div style='padding: 50px;'>
    <div class="section-header">
        <h3>CONTACTANOS</h3>
        
    </div>
    <div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">¡Un Cordial Saludo! </h4>
            <p>Su mensaje ha sido recibido con exito, en breve le estaremos respondiendo al correo suministrado...</p>
            <hr>
            <p class="mb-0">¡Muchas gracias por contactarnos!</p>
        </div>
    </div>  
</div>
</section>

@endsection