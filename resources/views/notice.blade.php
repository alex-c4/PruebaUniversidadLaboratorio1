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
   <div id="espaciador"></div>
   <div class="container">

        <div class="section-header">
          <h3>Noticias XportGold</h3>
        
        </div>


          <div class="row" style="text-align: justify;">
            <div class="text-justify">
            <div class=" col-xs-6 col-lg-8">  
              <div class="thumbnail">
                <img src="{{asset('img/notice/'.$arreglo[3])}}" alt="" class="img-thumbnail">
              <p> {{ $arreglo[4] }}</p> 
              </div>
            </div>

            <div class=" col-xs-6 col-lg-8">
              <div class="caption">
                 
                 <h2 class="title">{{ $arreglo[0] }}</h2>
               <p>
                    Fuente: {{ $arreglo[2] }}
                    <br>
                    <br>
                    {!! nl2br(e($arreglo[1])) !!}

                 <br>                  
                </p> 

                <a href="{{ url('/#news') }}" class="btn ">Volver</a>

              </div>

            </div>
            </div >

          </div>       

      </div>
    
     @endsection

