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
      <h3>Conversaciones </h3>
      <p> A continuacion se listan las conversaciones asociadas a los intercambios mas recientes </p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro">
            <div class="col-lg-12 oscuro-links"> 
              <h4>intercambios solicitados por mi: <span class="vinculogris"><i class="fa">{{$intercambios->count()}}</i></span></h4>             
              <ul>
                @foreach($intercambios as $intercambio)  
                  <li>
                    <i class="ion-ios-arrow-right"></i> <a href="{{ url('/men/'.$intercambio->id_intercambio)}}">{{$intercambio->name." ".$intercambio->lastName}}</a>
                    barajita:{{ $intercambio->sticker_num}}
                  </li>
                @endforeach
              </ul>
              <h4>intercambios solicitados por otros: <span class="vinculogris"><i class="fa">{{$intercambios2->count()}}</i></span></h4>
              <ul>
                @foreach($intercambios2 as $intercambio)  
                  <li>
                    <i class="ion-ios-arrow-right"></i> <a href="{{ url('/men/'.$intercambio->id_intercambio)}}">{{$intercambio->name." ".$intercambio->lastName}}</a>
                    barajita:{{ $intercambio->sticker_num}}
                  </li>
                @endforeach
              </ul>
            </div>       
            
          </div>        
        </div>
    </div>
  </section>

     @endsection
