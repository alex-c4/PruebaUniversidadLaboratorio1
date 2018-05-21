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
      <h3>Mensajes </h3>
      <p> conversacion con <b><?php echo e($datos->name."".$datos->lastName); ?>. </b> Intercambio de la barajita Numero: <b><?php echo e($datos->sticker_num); ?> </b></p>
    </div>
    <div id="oscuro" >
        
        <div class="container">
          <div class="row oscuro">
            <div class="col-lg-12 oscuro-links"> 
              <h4>Mensajes: <span class="vinculogris"><i class="fa"><?php echo e($conversacion->count()); ?></i></span></h4>             
              
                <?php $__currentLoopData = $conversacion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mensaje): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                  <?php if($mensaje->id_remitente == $user_log): ?>
                    <div><i class="ion-ios-arrow-right"></i><b>Yo: </b><?php echo e($mensaje->texto." "); ?></div> 
                  <?php endif; ?>    
                  <?php if($mensaje->id_remitente != $user_log): ?>
                   <div class="gris-interlinea ";">
                    <b><?php echo e($datos->name."".$datos->lastName); ?>:</b>
                      <?php echo e($mensaje->texto." "); ?>

                      <span class="derecha"><i class="ion-ios-arrow-left"></i></span>
                  </div> 
                  <?php endif; ?>
                  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </div>      
          </div>  
           <div  id="area-botones" class="text-center">
            <a href="<?php echo e(route('mensajeria.create',['intercambio'=>$datos->id_intercambio])); ?>" id="escribir" class=" btn btn-data-target">Escribir</a>
            <a href="<?php echo e(route('conversaciones.lista')); ?>" id="escribir" class=" btn btn-data-target">volver</a>       
          </div> 
        </div>
    </div>
  </section>

     <?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>