@extends('layoutMenu')

@section('content')

<hr/>

<input type="hidden" id="routeCurrent" value="{{ url('/') }}">

<section id="contact" class="section-bg wow fadeInUp" >
   <!-- Modal sticker Adquiridos-->
        <div class="modal fade" id="stickerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">alert deejemplo</h5>
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



</section>

@endsection