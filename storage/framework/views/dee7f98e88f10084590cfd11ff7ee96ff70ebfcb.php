<?php $__env->startSection('content'); ?>

<script>
     $(document).ready(function () {
        document.getElementById("stickers").style.visibility = "visible";
    });
</script>
<br>
<br>
<br>
<hr/>

<input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">

<section id="stickers" style="visibility: hidden" class="section-bg <?php echo e(env('EFECT_WOW')); ?>" >
    <div class="section-header">
        <h3>Control Cromo</h3>
        <p>Panel de control del conjunto de cromos coleccionados y posibles cromos intercabiables</p>
      
        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
        
        <div class="form-row align-items-center" style="margin-left: 40%;;">
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" id="album_id" name="album_id">
                    <option value="0" selected>...</option>
                <?php $__currentLoopData = $albumList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($album['id']); ?>"><?php echo e($album['name']); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            
            </div>
            <div class="col-auto my-1">
                <button id="btn-update" type="button" title="Actualizar panel" class="btn btn-outline-success"><i class="fa fa-refresh"></i></button>
            </div>
            <div class="col-auto my-1">
                <a alt="Ir panel de mensajes" title="Ir panel de mensajes" class="btn btn-outline-info" href="<?php echo e(url('conv')); ?>"><i class="fa fa-commenting"></i></a>
            </div>
        </div>
    </div>

    <h1>Panel de Cromos</h1> 
    <div class="container-fluid">
            
        <div class="row">
            <div class="col-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Descripción</h5>
                    <p class="card-text">Cromos de tu álbum + repetidos.</p>
                </div>
                </div>
            </div>
            <div class="col-6 text-right">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Descripción</h5>
                    <p class="card-text">Selecciona el cromo faltante para que intercambies.</p>
                </div>
                </div>
            </div>
        </div>






    </div>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-12" id="div-container-stickerPanel"></div>
        </div>
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
        
        <!-- Modal sticker Adquiridos-->
        <div class="modal fade" id="stickerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Panel de Cromos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <h1><i> Cromo <strong class="num-sticker" style="color:#9e7622;">#</strong></i></h1>

                    <div class="form-group">
                        <label for="txtquantity">¿Cuantos tienes?</label>
                    </div>
                                     
                    <div class="form-group">                    
                        <div class="input-group mb-3">
                            <input placeholder="cantidad" id="txtquantity" name="txtquantity" type="text" class="form-control" placeholder="Cantidad de cromos" aria-label="Cantidad de cromos" aria-describedby="basic-addon2">
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
                <div class="modal-footer" >
                    <div >
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                        <button type="button" id="btnRegisterSticker" name="btnRegisterSticker" class="btn btn-success btn-sm" >Registrar</button>
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Modal lista usuarios con sticker por adquirir -->
        <div class="modal fade" id="stickerModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-info-circle fa-lg"></i> &nbsp; Panel de Cromo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <h1><i> Cromo <strong class="num-sticker" style="color:#9e7622;">#</strong></i></h1>

                    <div class="form-group">
                        <input type="hidden" name="htxtalbid" id="htxtalbid">
                        <input type="hidden" name="htxtstickerid" id="htxtstickerid">
                        <input type="hidden" name="htxtnumber" id="htxtnumber">
                    </div>
                    
                    <div id="stickerUserList"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
                    
                </div>
                </div>
            </div>
        </div>


    
    
    </div>

    



</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>