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
      <h3>Puntuaciones </h3>
      <p> listado de pronosticos </p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro">
            <div class="col-lg-12 oscuro-links"> 
             
              </ul>
              <h4>{{$quiniela->nombre}} - participantes:<span class="vinculogris"><i class="fa">{{$puntuaciones->count()}}</i></span></h4>
              <ul>
                @foreach($puntuaciones as $puntuacion)                                       
                  <li>
                    <i class="ion-ios-arrow-right"></i>
                    <a href="#">{{$puntuacion->name." ".$puntuacion->lastName}}</a>
                    - puntuacion:{{ $puntuacion->puntos}}                        
                  
                  </li>    

                @endforeach
              </ul>
            </div>       
            
          </div>
          
        </div>
    </div>
  </section>

     @endsection
