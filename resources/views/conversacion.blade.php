@extends('layoutMenu')

@section('content')
<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
#espaciador{
  margin-top: 10%;
}

</style>
<hr/>    
  <section id="contact" style="background:#f7f7f7">  
   
    <div class="section-header">
      <h3>Mensajes </h3>
      <p> conversacion con <b>{{ $datos->name."".$datos->lastName}}. </b> Intercambio de la barajita Numero: <b>{{ $datos->sticker_num}} </b></p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro">
            <div class="col-lg-12 oscuro-links"> 
              <h4>Mensajes: <span class="vinculogris"><i class="fa">{{$conversacion->count()}}</i></span></h4>             
              
                @foreach($conversacion as $mensaje)  
                  @if($mensaje->id_remitente =='99')
                    <div><i class="ion-ios-arrow-right"></i><b>Yo: </b>{{$mensaje->texto." "}}</div> 
                  @endif    
                  @if($mensaje->id_remitente != '99')
                   <div class="gris-interlinea";"><b>{{ $datos->name."".$datos->lastName}}:</b> {{$mensaje->texto." " }}<i class="ion-ios-arrow-left pull-right"></i></div> 
                  @endif
                  
                @endforeach
              
            </div>      
          </div>  
           <div  id="area-botones" class="text-center">
            <a href="{{ route('mensajeria.create',['user'=>$datos->id_propietario,'intercambio'=>$datos->id_intercambio])}}" id="escribir" class=" btn btn-data-target">Escribir</a>       
          </div> 
        </div>
    </div>
  </section>

     @endsection
