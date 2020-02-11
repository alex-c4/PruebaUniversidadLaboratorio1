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
            <div class="form-group col-md-12 text-center">
                <p>Resultado de juego realizado con exito...</p>
            </div>
            <hr>
            <div class="form-group col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('result.listChampionships') }}">Cargar más resultados</a>
            </div>
            
        </div>
    </div>  
</div>
</section>

@endsection