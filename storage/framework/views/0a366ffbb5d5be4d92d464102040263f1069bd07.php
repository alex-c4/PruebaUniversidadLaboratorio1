<?php $__env->startSection('content'); ?>


<hr/>
<section id="contact" class="section-bg wow fadeInUp" >
<div style='padding: 50px;'>
    <div class="section-header">
        <h3>REGISTRO DE PAGOS</h3>
        
    </div>
    <div>
        <div class="alert alert-success" role="alert">
            
            <p>Su pago fue realizado con exito...</p>
            <hr>
            <p><a href="<?php echo e(route('searchPronostics')); ?>" class="btn btn-outline-info">Volver a mis pronósticos</a></p>
            
        </div>
    </div>  
</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>