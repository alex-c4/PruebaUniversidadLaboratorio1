@extends('layoutMenu')

@section('content')


<hr/>
<section id="contact" class="section-bg wow fadeInUp" >
<div style='padding: 50px;'>
    <div class="section-header">
        <h3>REGISTRO DE PAGOS</h3>
        
    </div>
    <div>
        <div class="alert alert-success" role="alert">
            <p>Acaba de completar el pago</p>
            <p>El Id. de transacción del pago es: <b>{{ $data["idTransaccion"] }}</b></p>
            <p>Enviaremos una confirmación por correo electrónico al comprador: <b>{{ $data["email"] }}</b></p>

            <hr>
            <p><a href="{{ route('searchPronostics') }}" class="btn btn-outline-info">Volver a mis pronósticos</a></p>
            
        </div>
    </div>  
</div>
</section>

@endsection