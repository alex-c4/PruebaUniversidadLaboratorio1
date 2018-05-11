@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow fadeInUp" >
    <div class="section-header">
        
        <hr/>
    
        <h3>Dashboard</h3>
        <p>Panel de control</p>



        <h2>Bienvenido {{ auth()->user()->name }}</h2>

        <a class="btn btn-primary" href="{{ url('sticker') }}" role="button">Ir panel de barajitas</a>

        <a class="btn btn-primary" href="{{ url('conv') }}" role="button">Ir a Conversaciones</a>


    </div>

</section>
@endsection