@extends('layoutMenu')

@section('content')


<hr/>

<input type="hidden" id="routeCurrent" value="{{ url('/') }}">

<section id="contact" class="section-bg wow fadeInUp" >
    <div class="section-header">
        <h3>Control Sticker</h3>
        <p>Panel de control del conjunto de sticker coleccionados y posibles sticker intercabiables</p>
      
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
        
        <div class="form-row align-items-center" style="margin-left: 40%;;">
            <div class="col-auto my-1">
            <select class="custom-select mr-sm-2" id="album_id" name="album_id">
            @foreach($albumList as $album)
                <option value="0" selected>...</option>
                <option value="{{ $album['id'] }}">{{ $album['name'] }}</option>
            @endforeach
            </select>
            </div>
            
        </div>
    </div>

    <h1>Panel de Sticker</h1>
                
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="container">
                    <div class="row" id="albumListGot">
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="container">
                    <div class="row" id="albumListWaiting">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Lista Adquiridas-->
        <div class="modal fade" id="stickerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Panel de Sticker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <h1><i> sticker <strong class="num-sticker" style="color:#9e7622;">#</strong></i></h1>

                    <div class="form-group">
                        <label for="txtquantity">¿Cuantas tienes?</label>
                    </div>
                                     
                    <div class="form-group">                    
                        <div class="input-group mb-3">
                            <input id="txtquantity" name="txtquantity" type="text" class="form-control" placeholder="Cantidad de sticker" aria-label="Cantidad de sticker" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Cantidad</span>
                            </div>
                        </div>  
                    </div>

                    <div class="form-group">
                        <div id="message-got">
                        
                        </div>
                    </div> 
                    
                    <div class="form-group">
                        <input type="hidden" name="htxtalbid" id="htxtalbid">
                        <input type="hidden" name="htxtstickerid" id="htxtstickerid">
                        <input type="hidden" name="htxtnumber" id="htxtnumber">
                    </div>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnRegisterSticker" name="btnRegisterSticker" class="btn btn-success btn-sm" >Registrar</button>
                    
                </div>
                </div>
            </div>
        </div>

        <!-- Modal lista por adquirir -->
        <div class="modal fade" id="stickerModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Panel de Sticker</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <h1><i> sticker <strong class="num-sticker" style="color:#9e7622;">#</strong></i></h1>

                    <div class="form-group">
                        <label for="txtquantity">¿Cuantas Deseas?</label>
                    </div>
                                     
                    <div class="form-group">                    
                        <div class="input-group mb-3">
                            <input id="txtquantity" name="txtquantity" type="text" class="form-control" placeholder="Cantidad de sticker" aria-label="Cantidad de sticker" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">Cantidad</span>
                            </div>
                        </div>  
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="htxtalbid" id="htxtalbid">
                        <input type="hidden" name="htxtstickerid" id="htxtstickerid">
                        <input type="hidden" name="htxtnumber" id="htxtnumber">
                    </div>
                    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="btnRegisterSticker" name="btnRegisterSticker" class="btn btn-success btn-sm" >Registrar</button>
                    
                </div>
                </div>
            </div>
        </div>


    
    
    </div>

    



</section>

@endsection