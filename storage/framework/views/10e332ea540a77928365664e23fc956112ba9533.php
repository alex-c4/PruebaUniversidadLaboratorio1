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
                    <p>Su registro fue exitoso!, Gracias por preferirnos, el equipo de XportGold les desea mucho éxito en su pronostico!</p>
                    <p><a href="<?php echo e(route('quiniela')); ?>" class="btn btn-outline-info">volver</a></p>
                </div>
            </div>
        </div>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>