<?php $__env->startSection('content'); ?>
<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
#espaciador{
  margin-top: 10%;
}

</style>
   <div id="espaciador"></div>
   <div class="container">

        <div class="section-header">
          <h3>Noticias XportGold</h3>
        
        </div>


          <div class="row" style="text-align: justify;">
            <div class="text-justify">
            <div class=" col-xs-6 col-lg-8">  
              <div class="thumbnail">
                <img src="<?php echo e(asset('img/notice/'.$arreglo[3])); ?>" alt="" class="img-thumbnail">
              <p> <?php echo e($arreglo[4]); ?></p> 
              </div>
            </div>

            <div class=" col-xs-6 col-lg-8">
              <div class="caption">
                 
                 <h2 class="title"><?php echo e($arreglo[0]); ?></h2>
               <p>
                    Fuente: <?php echo e($arreglo[2]); ?>

                    <br>
                    <br>
                    <?php echo nl2br(e($arreglo[1])); ?>


                 <br>                  
                </p> 

                <a href="<?php echo e(url('/#news')); ?>" class="btn ">Volver</a>

              </div>

            </div>
            </div >

          </div>       

      </div>
    
     <?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>