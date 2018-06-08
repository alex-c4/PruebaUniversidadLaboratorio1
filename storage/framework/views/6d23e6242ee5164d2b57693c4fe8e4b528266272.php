<?php $__env->startSection('content'); ?>


<hr/>

<input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">

<section id="contact" class="section-bg wow fadeInUp" >
    <div class="section-header">
        <h3>Consulta de Puntuaciones</h3>
        <p>Sleccione la quiniela a consultar </p>

    </div>    
    <form method="POST" id="form_list_quinielas" action="<?php echo e(route('quiniela.puntuaciones')); ?>">
        <?php echo e(csrf_field()); ?>

        <div class="form-row align-items-center" style="margin-left: 40%;">
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" id="quiniela_id" name="quiniela_id">
                    <option value="0" selected>...</option>
                    <?php $__currentLoopData = $publicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiniela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                        <option value="<?php echo e($quiniela->id_quiniela); ?>"><?php echo e($quiniela->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $privadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiniela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($quiniela->id_quiniela); ?>"><?php echo e($quiniela->nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                </select>
            
            </div>
            
        </div>
        <div id="oscuro">
            <div id="area-botones" class="container text-center">
                <button id="enviarQuiniela" name="enviarQuiniela" type="submit" class="btn btn-success">Enviar</button>
                <a class="btn btn-data-target" href="<?php echo e(URL::previous()); ?>">volver</a>            
            </div>
        </div>
        <div id="divEspaciador"></div>
        <div id="messageError-got" name="messageError-got" class="text-center" ><!--divpara mostrar mensaje de error--></div> 
    </form>    



    



</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>