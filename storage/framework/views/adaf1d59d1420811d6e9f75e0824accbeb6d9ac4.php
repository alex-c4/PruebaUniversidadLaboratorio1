<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow" >
      <div class="container" >

        <div class="section-header">
          <br>
          <h3>Configuración</h3>
          <p>Actualiza tus datos y se parte de XportGold...</p>
        </div>

        <form method="POST" action="<?php echo e(route('userUpdate')); ?>">

          <?php echo e(csrf_field()); ?>


          <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">
        
          <div class="form-row">
            <!-- Nombre -->
            <div class="form-group col-md-4">
              <label for="name">Name</label>
              <input type="text"  class="form-control <?php echo e($errors->has('name') ? 'border-danger' : ''); ?>" name="name" id="name" placeholder="Name" value="<?php echo $user->name; ?>">
              <?php echo $errors->first('name', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Apellido -->
            <div class="form-group col-md-4">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control <?php echo e($errors->has('lastName') ? 'border-danger' : ''); ?>" name="lastName" id="lastName" placeholder="Last name" value="<?php echo $user->lastName; ?>" >
              <?php echo $errors->first('lastName', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Genero -->
            <div class="form-group col-md-4" >
              <label for="genderOptions">Género</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" <?php echo e($user->gender == 'M' ? 'checked' : ''); ?> type="radio" name="genderOptions" id="inlineRadio1" value="M">
                  <label class="form-check-label" for="inlineRadio1">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" <?php echo e($user->gender == 'F' ? 'checked' : ''); ?> type="radio" name="genderOptions" id="inlineRadio2" value="F">
                  <label class="form-check-label" for="inlineRadio2">Femenino</label>
                </div>
              </div>
              <?php echo $errors->first('genderOptions', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Fecha de Nacimiento -->
            <div class="form-group col-md-4">
              <label for="birthday">Birthdate</label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control <?php echo e($errors->has('birthday') ? 'border-danger' : ''); ?>" name="birthday" id="birthday" value="<?php echo $user->birthday; ?>" >
                  <?php echo $errors->first('birthday', '<span class="text-danger">:message</span>'); ?>

                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Telefono 1             -->
            <div class="form-group col-md-4">
              <label for="phone1">Phone 1</label>
              <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone" value="<?php echo $user->phone; ?>">
            </div>

            <!-- Telefono 2 -->
            <div class="form-group col-md-4">
              <label for="phone2">Phone 2</label>
              <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Phone"  value="<?php echo $user->phone2; ?>">
            </div>

            <!-- Pais -->
            <div class="form-group col-md-4">
              <label for="country_id">Country</label>
              <select class="custom-select <?php echo e($errors->has('country_id') ? 'border-danger' : ''); ?>" id="country_id" name="country_id" placeholder="...">
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($user->country_id == $country->id): ?>
                    <option selected value="<?php echo e($country['id']); ?>"><?php echo e($country->name); ?></option>
                  <?php else: ?>
                    <option value="<?php echo e($country['id']); ?>"><?php echo e($country->name); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
              </select>

              <?php echo $errors->first('country_id', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Estado -->
            <div class="form-group col-md-4">
              <label for="state_id">State</label>
              <select class="custom-select <?php echo e($errors->has('state_id') ? 'border-danger' : ''); ?>" id="state_id" name="state_id" >
              <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($user->state_id == $state->id): ?>
                    <option selected value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                  <?php else: ?>
                    <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                  <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php echo $errors->first('state_id', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Ciudad -->
            <div class="form-group col-md-4">
              <label for="city_id">City</label>
              <select type="text" class="custom-select <?php echo e($errors->has('city_id') ? 'border-danger' : ''); ?>" id="city_id" name="city_id">
              <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->city_id == $city->id): ?>
                  <option selected value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                <?php else: ?>
                  <option value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

            <!-- Direccion -->
            <div class="form-group col-md-12" >
                <label for="direction">Address</label>
                <input type="text" class="form-control" id="direction" name="direction" placeholder="Address" value="<?php echo $user->direction; ?>">
            </div>
            
          </div>
      

          <!-- Boton Aceptar -->
          <div class="text-center form-group" >
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>

      </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>