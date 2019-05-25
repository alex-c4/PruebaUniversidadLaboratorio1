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
        <h3>Actualización</h3>
        <p>Edición exitosa</p>
    </div>
    <div>
        <div class="alert alert-success" role="alert">
            <p>Su registro fue realizado correctamente.</p>
            <hr>
            <p class="mb-0">Xport Gold</p>
        </div>
    </div>  
</div>
</section>

@endsection