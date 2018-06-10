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
  <section id="contact" style="background: #f7f7f7">  
   
    <div class="section-header">
      <h3>Tabla de Posiciones Quiniela </h3>
      <p> listado de puntuaciones por pronostico </p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro">
            <div class="col-lg-12 oscuro-links"> 
             
              </ul>
              <h4 class="text-center">{{$quiniela->nombre}} </h4>
              <p>Total Pronosticos registrados:<span class="vinculogris"><i class="fa">{{count($puntuaciones)}}</i></span></p>
              <ul>
                @foreach($puntuaciones as $puntuacion)                                       
                  <li>
                    <i class="ion-ios-arrow-right"></i>
                    <a href="{{ route('pronosticGet',['betId'=>$puntuacion->bet_id])}}">{{ $puntuacion->name." ".$puntuacion->lastName ."  - Pronostico Nro: ". $puntuacion->bet_id }}</a>
                    - Total: <strong class="textGold">{{ $puntuacion->puntos}}</strong> Ptos.                        
                  
                  </li>    

                @endforeach
              </ul>
            </div>       
            
          </div>
          
        </div>
    </div>
  </section>

     @endsection
