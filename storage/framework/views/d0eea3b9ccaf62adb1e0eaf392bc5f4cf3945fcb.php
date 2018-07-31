<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow bounceInLeft" >
    <form method="POST" action="<?php echo e(route('')); ?>" id="formCreateQuiniela">

        <div class="section-header">

            <h3>Registro Quiniela</h3>
            <p>Panel para la creación y registro de las predicciones de los juegos del mundial Rusia 2018</p>

            <div class="container">
            

            </div>
        </div>

    </form>
    
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>