<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow bounceInLeft" >
<form method="POST" action="<?php echo e(route('savePronostic')); ?>" method>

    <div class="section-header">

        <h3>Registro Quiniela</h3>
        <p>Panel para la creación y registro de las predicciones de los juegos del mundial Rusia 2018</p>

        <div class="container">

            <div class="row">
                <div class="col-12" id="div-container-quinielaPanel"></div>
            </div>
                
            <div class="section-header">
                    <h3>Registro Juegos</h3>
                    <p>Módulo para el registro de pronósticos</p>
                        <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
                        
                        <input type="hidden" name="quiniela_id" id="quiniela_id" value="<?php echo e($info['id_quiniela']); ?>">
                        <input type="hidden" name="championship_id" id="championship_id" value="<?php echo e($info['id_championship']); ?>">

                        <div class="container">
                            <div class="row align-items-center">
                                <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col-12 text-center font-italic text-info">
                                        <?php echo e($game->date); ?>

                                    </div>
                                    <div class="col-12 text-center font-weight-light">
                                    <span class="text-success"> <?php echo e($game->estadium); ?> </span> / <span class="font-weight-bold">Grupo <?php echo e($game->grupo); ?></span>
                                    </div>
                                    <div class="col-4 text-right">
                                    <?php echo e($game->nombre_club_1); ?><img src="<?php echo e(asset('img/banderas/Francia.png')); ?>" alt="">
                                    </div>
                                    <div class="col-2">
                                    <input type="number" id="input_<?php echo e($game->id); ?>_1" name="input_<?php echo e($game->id); ?>_1" class="form-control col-sm" max="99" min="0" >
                                    </div>
                                    <div class="col-2">
                                    <input type="number" id="input_<?php echo e($game->id); ?>_2" name="input_<?php echo e($game->id); ?>_2" class="form-control col-sm" max="99" min="0" >
                                    </div>
                                    <div class="col-4">
                                        <img src="<?php echo e(asset('img/banderas/Rusia.png')); ?>" alt=""><?php echo e($game->nombre_club_2); ?> 
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            
                        </div>
                    
            </div>
        

        </div

        <br>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
        
    </div>
    
</form>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>