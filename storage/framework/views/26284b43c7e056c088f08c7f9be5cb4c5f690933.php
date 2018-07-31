<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form method="POST" action="" method>

    <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">

    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

    <div class="section-header">

        <h3>Pronósticos</h3>
        <p>Módulo para la consulta de pronósticos</p>

        <div class="container">

            <div class="row align-items-center">
                <div class="col-12 text-center font-weight-bold">
                        <span class="text-info">Pronóstico Nro: </span><?php echo e($puntuacion['0']->bet_id); ?>

                        <span class="text-info">Usuario:</span><?php echo e($puntuacion['0']->name." ".$puntuacion['0']->lastName); ?>

                        <span class="text-info">Total:</span> <strong class="textGold"><?php echo e($puntuacion['0']->puntos); ?> Ptos.</strong>                          
                </div>          
                <?php $__currentLoopData = $pronosticsDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pronostic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="col-12 text-center font-italic text-info">
                         PRONOSTICO                         
                    </div>
                    <div class="col-12 text-center font-weight-light">
                        <span class="text-success">  <?php echo e($pronostic->date); ?> / <?php echo e($pronostic->estadium); ?>  </span> <?php if($pronostic->grupo != ""): ?> <?php endif; ?></span> <span id="actualizado_<?php echo e($pronostic->pronostic_id); ?>" class="text-info" style="size:8px"></span>
                    </div>
                    <div class="col-3 text-right">
                        <?php echo e($pronostic->nombre_club_1); ?><img src="<?php echo e(asset('img/banderas/')); ?>/<?php echo e($pronostic->img_club_1); ?>" alt="">
                    </div>
                    <div class="col-3 ">
                        <input type="text" id="input_<?php echo e($pronostic->pronostic_id); ?>_1" name="input_<?php echo e($pronostic->pronostic_id); ?>_1" class="form-control col-sm text-right" max="99" min="0" value="<?php echo e($pronostic->pronostic_club_1); ?>" disabled="true" >
                    </div>

                    <div class="col-3">
                        <input type="text" id="input_<?php echo e($pronostic->pronostic_id); ?>_2" name="input_<?php echo e($pronostic->pronostic_id); ?>_2" class="form-control col-sm" max="99" min="0" value="<?php echo e($pronostic->pronostic_club_2); ?>" disabled="true" >
                    </div>
                    <div class="col-3">
                        <img src="<?php echo e(asset('img/banderas/')); ?>/<?php echo e($pronostic->img_club_2); ?>" alt=""><?php echo e($pronostic->nombre_club_2); ?> 
                    </div>

                    <!--    + +++++      segunda linea, se muestran resultados del juego               ++++++        -->

                    <?php if($pronostic->game_estatus == 'FINALIZADO'): ?>
                        <div class="col-12 text-center font-italic text-info">
                             RESULTADO
                        </div>
                        
                        <div class="col-3 text-right">
                            <?php echo e($pronostic->nombre_club_1); ?><img src="<?php echo e(asset('img/banderas/')); ?>/<?php echo e($pronostic->img_club_1); ?>" alt="">
                        </div>
                        <div class="col-3 ">
                            <input type="text" id="input_<?php echo e($pronostic->pronostic_id); ?>_3" name="input_<?php echo e($pronostic->pronostic_id); ?>_3" class="form-control col-sm text-right" max="99" min="0" value="<?php echo e($pronostic->resultado_club_1); ?>" disabled="true" >
                        </div>
                        <div class="col-3">
                            <input type="text" id="input_<?php echo e($pronostic->pronostic_id); ?>_4" name="input_<?php echo e($pronostic->pronostic_id); ?>_4" class="form-control col-sm" max="99" min="0" value="<?php echo e($pronostic->resultado_club_2); ?>" disabled="true" >
                        </div>
                        <div class="col-3">
                            <img src="<?php echo e(asset('img/banderas/')); ?>/<?php echo e($pronostic->img_club_2); ?>" alt=""><?php echo e($pronostic->nombre_club_2); ?> 
                        </div>   
                         <div class="col-12 text-center font-italic text-success">
                             Puntos Obtenidos :<span class="font-weight-bold"><?php echo e($pronostic->pronostic_score); ?> Pts. </span> 
                        </div>
                        <div>&nbsp;</div>
                    <?php else: ?>
                        <div class="col-12 text-center font-italic font-weight-bold">
                             Juego <?php echo e($pronostic->game_estatus); ?>

                        </div>
                    <?php endif; ?>
                    

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>