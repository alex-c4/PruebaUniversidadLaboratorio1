<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow fadeInUp" >
    <div class="section-header">
        
        <hr/>
    
        <h3>Dashboard</h3>
        <p>Panel de control</p>



        <h2>Bienvenido <?php echo e(auth()->user()->name); ?></h2>

        <a class="btn btn-primary" href="<?php echo e(url('sticker')); ?>" role="button">Ir panel de barajitas</a>

        <a class="btn btn-primary" href="<?php echo e(url('conv')); ?>" role="button">Ir a Conversaciones</a>


    </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>