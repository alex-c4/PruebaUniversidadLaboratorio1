@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >


<h1>Vamos bien...</h1>

@endsection

