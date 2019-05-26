<?php $__env->startSection('content'); ?>

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>
<section id="contact" style="visibility: hidden" class="section-bg <?php echo e(env('EFECT_WOW')); ?>" >
<div style='padding: 50px;'>
   
   
    <div>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-warning"><?php echo $title; ?></h4>
            <p> <i><b><?php echo $message; ?></b></i></p>
            <hr>
            <p class="mb-0"><?php echo $footer; ?></p>
        </div>
    </div> 


    <div id="oscuro">
    	<div id="area-botones" class="container text-center">
    		<a class="btn btn-data-target" href="<?php echo e(URL::previous()); ?>">volver</a>
    	</div>
    </div>	
    


</div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>