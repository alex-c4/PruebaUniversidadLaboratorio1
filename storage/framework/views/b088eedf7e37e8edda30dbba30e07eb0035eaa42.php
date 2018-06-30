<?php $__env->startSection('content'); ?>
<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
#espaciador{
  margin-top: 10%;
}
  

</style>
<hr/>    
  <section id="contact" style="background: #f7f7f7">  
   
    <div class="section-header">
      <h3>Tabla de Posiciones Quiniela </h3>
      <p> listado de puntuaciones por pronostico </p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro ">
            <div class="col-lg-6 oscuro-links"> 
             
            <h4 class="text-center"><?php echo e($quiniela->nombre." "." **GOLD**"); ?> </h4>
              <!--<p>Total Pronosticos registrados:<span class="vinculogris"><i class="fa"><?php echo e(count($puntuaciones)); ?></i></span></p>-->
              <ul>
                <?php $__currentLoopData = $puntuaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puntuacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                       
                  <li>
                    <i class="ion-ios-arrow-right"></i>
                    <a href="<?php echo e(route('pronosticGet',['betId'=>$puntuacion->bet_id])); ?>"><?php echo e($puntuacion->name." ".$puntuacion->lastName ."  - Pronostico Nro: ". $puntuacion->bet_id); ?></a>
                    - Total: <strong class="textGold"><?php echo e($puntuacion->puntos); ?></strong> Ptos.                        
                  
                  </li>    

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <!--bloque dos de datos...
            se puede eliminar cuando se muestre una solo listado de posiciones porquuiniela-->
            <div class="col-lg-6 oscuro-links"> 
             
              <h4 class="text-center"><?php echo e($quiniela->nombre." "." **FREE**"); ?> </h4>
              <!--<p>Total Pronosticos registrados:<span class="vinculogris"><i class="fa"><?php echo e(count($puntuaciones2)); ?></i></span></p>--></span></p>
              <ul>
                <?php $__currentLoopData = $puntuaciones2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puntuacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                       
                  <li>
                    <i class="ion-ios-arrow-right"></i>
                    <a href="<?php echo e(route('pronosticGet',['betId'=>$puntuacion->bet_id])); ?>"><?php echo e($puntuacion->name." ".$puntuacion->lastName ."  - Pronostico Nro: ". $puntuacion->bet_id); ?></a>
                    - Total: <strong class="textGold"><?php echo e($puntuacion->puntos); ?></strong> Ptos.                        
                  
                  </li>    

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>

            <!-- fin bloque dos dedatos-->
          </div>
        </div>
    </div>
  </section>

     <?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>