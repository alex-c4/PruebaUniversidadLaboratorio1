@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("coct").style.visibility = "visible";
    });
</script>

<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}

#espaciador{
  margin-top: 10%;
}
</style>
<hr/>
<div id="espaciador" ></div>
<section id="coct" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="container" >
      <div class="section-header">
         <h3>Nuevo Mensaje</h3>
         <p class="help-block">contacta al usuario para realizar un intercambio.</p>
      </div>
       <form method="POST" action="{{ route('mensajeria.register') }}">

        {{ csrf_field() }}
        
        <input type="hidden" id="id_destinatario" name="id_destinatario" value="{{$datos->id_destinatario}}">
        <input type="hidden" id="id_intercambio" name="id_intercambio" value="{{$intercambio}}">
        <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
          <div class="form-group"> 
            <label for="mensaje">Escribe un mensaje para <b>{{ ucfirst($datos->name)." ". ucfirst($datos->lastName) }}</b> para intercambiar el cromo numero: <b>{{$datos->sticker_num}}</b>:</label>
            <textarea class="form-control" name="mensaje" id="mensaje" rows="5" data-rule="required" data-msg=" por favor, debes escribir algo" placeholder="Mensaje"></textarea>
            <div class="validation"></div>
            {!! $errors->first('mensaje', '<span class="text-danger">:message</span>') !!}
          </div>
            <!-- Boton Aceptar -->
          <div id="oscuro" class="text-center">
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
        
       </form>     
    </div>
</section>
    
@endsection