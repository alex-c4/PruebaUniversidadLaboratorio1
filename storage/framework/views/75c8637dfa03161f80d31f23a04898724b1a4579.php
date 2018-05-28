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
<div id="espaciador" ></div>
<section id="coct" class="section-bg wow fadeInUp" >
    <div class="container" >
      <div class="section-header">
         <h3>Nuevo Mensaje</h3>
         <p class="help-block">contacta al usuario para realizar un intercambio.</p>
      </div>
       <form method="POST" action="<?php echo e(route('mensajeria.register')); ?>">

        <?php echo e(csrf_field()); ?>

        
        <input type="hidden" id="id_destinatario" name="id_destinatario" value="<?php echo e($datos->id_destinatario); ?>">
        <input type="hidden" id="id_intercambio" name="id_intercambio" value="<?php echo e($intercambio); ?>">
        <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">
          <div class="form-group"> 
            <label for="mensaje">Escribe un mensaje para <b><?php echo e($datos->name."".$datos->lastName); ?></b> para intercambiar el cromo numero: <b><?php echo e($datos->sticker_num); ?></b>:</label>
            <textarea class="form-control" name="mensaje" id="mensaje" rows="5" data-rule="required" data-msg=" por favor, debes escribir algo" placeholder="Mensaje"></textarea>
            <div class="validation"></div>
            <?php echo $errors->first('mensaje', '<span class="text-danger">:message</span>'); ?>

          </div>
            <!-- Boton Aceptar -->
          <div id="oscuro" class="text-center">
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
        
       </form>     
    </div>
</section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>