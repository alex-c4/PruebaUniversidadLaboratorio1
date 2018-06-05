<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow fadeInUp" >
      <div class="container" >

        <div class="section-header">
          <br>
          <h3>Registro</h3>
          <p>Registro de resultados...</p>
        </div>



        <form method="POST" action="<?php echo e(route('result')); ?>">

          <?php echo e(csrf_field()); ?>


          <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">
          

            <div class="form-group col-md-6">
              <label for="id_game">Juego</label>
              <select class="custom-select <?php echo e($errors->has('id_game') ? 'border-danger' : ''); ?>" id="id_game" name="id_game" placeholder="...">
                <option selected>...</option>
                <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juego): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($juego['id']); ?>"><?php echo e($juego->id."-".$juego->nombre_club_1." vs ".$juego->nombre_club_2." Fecha: ". $juego->date." Hora: ". $juego->time); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
              </select>

              <?php echo $errors->first('id_game', '<span class="text-danger">:message</span>'); ?>

            </div>


          <div class="form-row">
            <!-- Resultado Equipo 1 -->
            <div class="form-group col-md-3">
              <label for="name">Equipo 1</label>
              <input type="text" class="form-control <?php echo e($errors->has('resultado_1') ? 'border-danger' : ''); ?>" name="resultado_1" id="resultado_1" placeholder="Resultado equipo 1" value="<?php echo e(old('resultado_1')); ?>">
              <?php echo $errors->first('resultado_1', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Resultado Equipo 2 -->
            <div class="form-group col-md-3">
              <label for="resultado_2">Resultado 2</label>
              <input type="text" class="form-control <?php echo e($errors->has('resultado_2') ? 'border-danger' : ''); ?>" name="resultado_2" id="resultado_2" placeholder="Resultado equipo 2" value="<?php echo e(old('resultado_2')); ?>" >
              <?php echo $errors->first('resultado_2', '<span class="text-danger">:message</span>'); ?>

            </div>

             <div class="form-group col-md-3">
              <label for="estatus">Estatus</label>
              <input type="text" class="form-control <?php echo e($errors->has('estatus') ? 'border-danger' : ''); ?>" name="estatus" id="estatus" placeholder="Estatus del partido" value="<?php echo e(old('estatus')); ?>" >
              <?php echo $errors->first('estatus', '<span class="text-danger">:message</span>'); ?>

            </div>  
            <div>
            </div>  
            


        

          <!-- Boton Aceptar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>

      </div>
     
        </div>
      </div>
    </div>
    
    ;
    
    </section>
    
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>