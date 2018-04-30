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
   <div class="container-fluid">

        <div class="section-header">
          <h3>noticias </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>


          <div class="row" style="text-align: center;">
            <div class="text-center">
            <div class=" col-xs-6 col-lg-8">  
              <div class="thumbnail">
                <img src="{{asset('img/notice/notice-2.jpg')}}" alt="" class="img-thumbnail">
              </div>
            </div>

            <div class=" col-xs-6 col-lg-8">
              <div class="caption">
                 <br>
                 <h2 class="title">{{ $arreglo[0] }}</h2>
                <p>
                  {{$arreglo[1]}} 
                </p>
              </div>

            </div>
            </div >

          </div>       

      </div>
    
     @endsection

