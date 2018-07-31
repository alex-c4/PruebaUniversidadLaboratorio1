<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form method="POST" action="<?php echo e(route('savePronostic')); ?>" method>

    <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">

    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

    <div class="section-header">

        <h3>Edición Juegos por Fase</h3>
        <p>Módulo para la adición de pronósticos por Fase</p>

        <div class="container">

            <p><a href="<?php echo e(route('addPronosticsNewPhase')); ?>" class="btn btn-dark"><i class="fa fa-arrow-left"></i>&nbsp;Regresar</a></p>
            
                <div class="row align-items-center">
                    <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <div class="col-12 text-center font-italic text-info">
                            <?php echo e($game->date); ?>

                        </div>
                        <div class="col-12 text-center font-weight-light">
                            <span class="text-success">  <?php echo e($game->estadium); ?>  </span> / <span class="font-weight-bold">Grupo <?php echo e($game->grupo); ?> &nbsp; </span> <span id="actualizado_<?php echo e($game->id_pronostic); ?>" class="text-info" style="size:8px"></span>
                        </div>
                        <div class="col-3 text-right">
                            <?php echo e($game->nombre_club_1); ?><img src="<?php echo e(asset('img/banderas/')); ?>/<?php echo e($game->img_club_1); ?>" alt="">
                        </div>
                        <div class="col-2">
                            <input  type="number" id="input_<?php echo e($game->pronostic_id); ?>_1" name="input_<?php echo e($game->pronostic_id); ?>_1" class="form-control col-sm" max="99" min="0" >
                        </div>

                        <div class="col-2">
                            <input  type="number" id="input_<?php echo e($game->pronostic_id); ?>_2" name="input_<?php echo e($game->pronostic_id); ?>_2" class="form-control col-sm" max="99" min="0"  >
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('img/banderas/')); ?>/<?php echo e($game->img_club_2); ?>" alt=""><?php echo e($game->nombre_club_2); ?> 
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                </div>
        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>