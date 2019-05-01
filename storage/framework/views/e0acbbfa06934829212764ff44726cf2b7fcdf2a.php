<?php $__env->startSection('content'); ?>


<hr/>
<section id="contact" class="section-bg wow fadeInUp" >
<div style='padding: 50px;'>
    <div class="section-header">
        <h3>Registro</h3>
        <p>Registro exitoso de usuario</p>
    </div>
    <div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bienvenid@</h4>
            <p>Su registro fue realizado correctamente, en breve llegara un correo de confirmación a su bandeja de entrada (<i><b><?php echo e($email); ?></b></i>), para completar el registro por favor hagla click en el enlace suministrado.</p>
            <hr>
            <p class="mb-0">Muchas gracias por elegirnos y esperemos disfrute y gane!</p>
        </div>
    </div>  
</div>

;

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>