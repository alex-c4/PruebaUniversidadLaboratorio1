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
        <h3>RESULTADOS</h3>
        
    </div>
    <div>
        <div class="alert alert-success" role="alert">
            
            <p>Resultado de juego realizado con exito...</p>
            <hr>
            
        </div>
    </div>  
</div>
</section>

@endsection