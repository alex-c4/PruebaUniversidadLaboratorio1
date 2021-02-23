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
        <h3>Mi pronostico</h3>
        <p>Panel con la información de los pronósticos registrados</p>

        <div class="container">

        </div>

    </div>
</section>

@endsection
