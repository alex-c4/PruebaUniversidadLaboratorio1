<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow fadeInUp" padding >
<div style='padding: 50px;'>
    <div class="section-header">
        <h3>Verificación</h3>
        <p>Comprobación y validación del correo electrónico</p>
    </div>
    <div >
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading"><?php echo $title; ?></h4>
            <p><?php echo $message; ?></p>
            <hr>
            <p class="mb-0"><?php echo $footer; ?></p>
        </div>
    </div>
</div>
    
;

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>