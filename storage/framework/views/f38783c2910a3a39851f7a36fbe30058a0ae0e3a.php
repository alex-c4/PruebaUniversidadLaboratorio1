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
  <section id="contact" style="background:#f7f7f7">  
   
    <div class="section-header">
      <h3>Conversaciones </h3>
      <p> A continuacion se listan las conversaciones asociadas a los intercambios mas recientes </p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro">
            <div class="col-lg-12 oscuro-links"> 
              <h4>intercambios solicitados por mi: <span class="vinculogris"><i class="fa"><?php echo e($intercambios->count()); ?></i></span></h4>             
              <ul>
                <?php $__currentLoopData = $intercambios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intercambio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                  <li>
                    <i class="ion-ios-arrow-right"></i> <a href="<?php echo e(url('/men/'.$intercambio->id_intercambio)); ?>"><?php echo e($intercambio->name." ".$intercambio->lastName); ?></a>
                    barajita:<?php echo e($intercambio->sticker_num); ?>

                    <?php if($intercambio->estatus=='EN PROCESO'): ?>
                        <span class="botones-filas ">
                          <a class="derecha" href="<?php echo e(route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'INCOMPLETO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])); ?>"  class="btn  btn-sm btn-data-target"><i class="fa">X</i></a>
                        </span>                     
                    <?php else: ?>
                      <span class="derecha"><?php echo e($intercambio->estatus); ?></span>
                    <?php endif; ?>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
              <h4>intercambios solicitados por otros: <span class="vinculogris"><i class="fa"><?php echo e($intercambios2->count()); ?></i></span></h4>
              <ul>
                <?php $__currentLoopData = $intercambios2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $intercambio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                     
                  <li>
                    <i class="ion-ios-arrow-right"></i>
                    <a href="<?php echo e(url('/men/'.$intercambio->id_intercambio)); ?>"><?php echo e($intercambio->name." ".$intercambio->lastName); ?></a>
                     - barajita:<?php echo e($intercambio->sticker_num); ?>

                    <?php if($intercambio->estatus=='EN PROCESO'): ?>
                        <span class="botones-filas ">
                          <a title="dar por concretado el intercambio y disminuir el numero de cromos" class="derecha" href="<?php echo e(route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'COMPLETADO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])); ?>" id="completado" class=" btn  btn-sm btn-data-target"><i class="fa fa-check"></i></a>

                          <a title="cancelar el intercambio" class="derecha" href="<?php echo e(route('intercambio.act',['id_intercambio'=>$intercambio->id_intercambio, 'estatus'=>'INCOMPLETO', 'id_sticker'=>$intercambio->id_barajita, 'id_propietario'=>$intercambio->id_propietario])); ?>"  class="btn  btn-sm btn-data-target"><i class="fa">X</i></a>
                        </span>                     
                    <?php else: ?>
                      <span class="derecha"><?php echo e($intercambio->estatus); ?></span>
                    <?php endif; ?>
                  
                  </li>
                

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>       
            
          </div>        
        </div>
    </div>
  </section>

     <?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>