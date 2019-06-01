@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("conv").style.visibility = "visible";
    });
</script>

<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
.espaciador{
  margin-top: 100px;
}
  

</style>

  <section id="conv" style="background: #f7f7f7; visibility: hidden" class="{{env('EFECT_WOW') }}">  
   
    <div class="section-header espaciador">
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
                    @if ($intercambio->estatus=='EN PROCESO')
                        <span class="botones-filas ">
                          <a title="cancelar el intercambio" 
                              href="{{ route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'CANCELADO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])}}"
                           class="btn btn-data-target btn-sm derecha"> <i class="fa">X</i>
                         </a>
                        </span>                     
                    @else
                      <span class="derecha">{{ $intercambio->estatus}}</span>
                    @endif
                  </li>
                @endforeach
              </ul>
              <h4>intercambios solicitados por otros: <span class="vinculogris"><i class="fa">{{$intercambios2->count()}}</i></span></h4>
              <ul>
                @foreach($intercambios2 as $intercambio)  
                                     
                  <li>
                    <i class="ion-ios-arrow-right"></i>
                    <a href="{{ url('/men/'.$intercambio->id_intercambio)}}">{{$intercambio->name." ".$intercambio->lastName}}</a>
                     - barajita:{{ $intercambio->sticker_num}}
                    @if ($intercambio->estatus=='EN PROCESO')
                        <span class="botones-filas ">
                          <a title="cancelar el intercambio" 
                             href="{{ route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'CANCELADO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])}}"
                             class="btn btn-data-target btn-sm derecha" ><i class="fa">X</i>
                           </a>
                             <!--href="#ventana1" data-toggle="modal"-->

                          <a title="dar por concretado el intercambio y disminuir el numero de cromos"  
                              href="{{ route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'CONCRETADO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])}}"                                
                              class="btn btn-data-target btn-sm derecha"  ><i class="fa fa-check"></i>
                          </a>
                              <!--href="#ventana1"  data-toggle="modal"-->
                        </span>               
                              
                    @else
                      <span class="derecha">{{ $intercambio->estatus}}</span>
                    @endif
                  
                  </li>
                

                @endforeach
              </ul>
            </div>       
            
          </div>
          <!-- ventana modal 1-->
          <div class="modal fade" id="ventana1">
              <div class="modal-dialog">
                  <div class="modal-content"> 
                        <!-- header-->  
                        <div class="modal-header">
                          <h5 class="modal-title">concretar intercambio</h5>
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <!-- contenido-->    
                        <div class ="modal-body">
                          <p> Esta a punto de concretar el intercambio con <strong>{{$intercambio->name." ".$intercambio->lastName}}</strong>, esto actualizara su cantidad de cromos del numero:<strong>{{ $intercambio->sticker_num}}</strong>. ¿desea continuar?</p>
                          
                        </div>
                        <!-- footer-->    
                        <div class ="modal-footer ">
                          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                          <a href="{{ route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'CONCRETADO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])}}" 
                             id="completado" class=" btn btn-sm btn-success ">Continuar</a>
                        </div>                   
                  </div>
              </div>
          </div>

          <!-- fin ventana modal 1-->

          <!-- ventana modal 2-->
          <div class="modal fade" id="ventana2">
              <div class="modal-dialog">
                  <div class="modal-content"> 
                        <!-- header-->  
                        <div class="modal-header">
                          <h5 class="modal-title">cancelar intercambio</h5>
                          <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <!-- contenido-->    
                        <div class ="modal-body">
                          <p> Esta a punto de cancelar el intercambio con <strong>{{$intercambio->name." ".$intercambio->lastName}}</strong>, ¿desea continuar?</p>
                          
                        </div>
                        <!-- footer-->    
                        <div class ="modal-footer ">
                          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cancelar</button>
                          <a href="{{ route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'CANCELADO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])}}" id="completado" class=" btn btn-sm btn-success ">Continuar</a>
                        </div>                   
                  </div>
              </div>
          </div>

          <!-- fin ventana modal 2-->



        </div>
    </div>
  </section>

     @endsection
