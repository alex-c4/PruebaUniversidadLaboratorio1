<?php $__env->startSection('content'); ?>

    
<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
</style>
<hr/>
<section id="contact" class="section-bg wow fadeInUp" >
    <div class="section-header">
        <h3>Register</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
    </div>
    <div style="background: #333">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Bienvenid@ <?php echo e($name); ?>, <?php echo e($lastName); ?></h4>
            <p>Su registro fue realizado correctamente, en breve llegara un correo de confirmacion a su bandeja de entrada (<i><b><?php echo e($email); ?></b></i>), para completar el registro por favor hagla click en el enlace suministrado.</p>
            <hr>
            <p class="mb-0">Muchas gracias por elegirnos y esperemos disfrute y gane!.</p>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>