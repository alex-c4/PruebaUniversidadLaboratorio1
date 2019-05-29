@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
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
  <section id="contact" style="background:#f7f7f7; visibility: hidden" class="{{env('EFECT_WOW') }}">  
   
    <div class="section-header">
      <h3>Mensajes </h3>
      <p> conversacion con <b>{{ $datos->name." ".$datos->lastName}}. </b> Intercambio de la barajita Numero: <b>{{ $datos->sticker_num}} </b></p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro">
            <div class="col-lg-12 oscuro-links"> 
              <h4>Mensajes: <span class="vinculogris"><i class="fa">{{$conversacion->count()}}</i></span></h4>             
              
                @foreach($conversacion as $mensaje)  
                  @if($mensaje->id_remitente == $user_log)
                    <div><i class="ion-ios-arrow-right"></i><b>Yo: </b>{{$mensaje->texto." "}}</div> 
                  @endif    
                  @if($mensaje->id_remitente != $user_log)
                   <div class="gris-interlinea ";">
                    <b>{{ $datos->name."".$datos->lastName}}:</b>
                      {{$mensaje->texto." " }}
                      <span class="derecha"><i class="ion-ios-arrow-left"></i></span>
                  </div> 
                  @endif
                  
                @endforeach
              
            </div>      
          </div>  
           <div  id="area-botones" class="text-center">
            <a href="{{ route('mensajeria.create',['intercambio'=>$datos->id_intercambio])}}" id="escribir" class=" btn btn-data-target">Escribir</a>
            <a href="{{ route('conversaciones.lista')}}" id="escribir" class=" btn btn-data-target">volver</a>       
          </div> 
        </div>
    </div>
  </section>

     @endsection
