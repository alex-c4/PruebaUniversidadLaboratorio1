<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow bounceInLeft" >
<form method="POST" action="<?php echo e(route('savePronostic')); ?>" method>

    <div class="section-header">

        <h3>Registro</h3>
        <p>Su registro de pronóstico fue llevado a cabo correctamente!</p>

        <div class="container">
            <div >
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">Registro Satisfactorio</h4>
                    <p>Su registro fue exitoso!, Gracias por preferirnos, el equipo de <b>XportGold</b> le desea mucho éxito en su pronóstico!</p>
                    <p><a href="<?php echo e(route('searchPronostics')); ?>" class="btn btn-outline-info">Ver mis pronósticos</a></p>
                </div>
            </div>
        </div>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>