<?php $__env->startSection('content'); ?>


<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
</style>
<hr/>

<section id="coct" class="section-bg wow fadeInUp" >
      <div class="container" >

        <div class="section-header">
          <h3>Mensajeria</h3>
          <p>comunicate con el usuario que posee la barajita de tu interes</p>
        </div>


        <form method="POST" action="<?php echo e(route('register')); ?>">

        <form method="POST" action="<?php echo e(route('enviar_msj')); ?>">


          <?php echo e(csrf_field()); ?>


          <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">
          

          <div class="form-row">
            <!-- Nombre -->
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" class="form-control <?php echo e($errors->has('name') ? 'border-danger' : ''); ?>" name="name" id="name" placeholder="Name" value="<?php echo e(old('name')); ?>">
              <?php echo $errors->first('name', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Apellido -->
            <div class="form-group col-md-6">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control <?php echo e($errors->has('lastName') ? 'border-danger' : ''); ?>" name="lastName" id="lastName" placeholder="Last name" value="<?php echo e(old('lastName')); ?>" >
              <?php echo $errors->first('lastName', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Email -->
            <div class="form-group col-md-6" >
              <label for="email">Email</label>
              <input type="email" class="form-control <?php echo e($errors->has('email') ? 'border-danger' : ''); ?>" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">
              <?php echo $errors->first('email', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Clave 1 -->
            <div class="form-group col-md-3">
              <label for="password">Password</label>
              <input type="password" class="form-control <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" name="password" id="password" placeholder="Contraseña">
              <?php echo $errors->first('password', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Clave confirm -->
            <div class="form-group col-md-3">
              <label for="password">Confirm Password</label>
              <input type="password" class="form-control <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" name="password_confirmation" id="password-confirm" placeholder="Contraseña">
              <?php echo $errors->first('password', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Fecha de Nacimiento -->
            <div class="form-group col-md-6">
              <label for="birthday">Birthdate</label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control <?php echo e($errors->has('birthday') ? 'border-danger' : ''); ?>" name="birthday" id="birthday" value="<?php echo e(old('birthday')); ?>" >
                  <?php echo $errors->first('birthday', '<span class="text-danger">:message</span>'); ?>

                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Telefono 1             -->
            <div class="form-group col-md-3">
              <label for="phone1">Phone 1</label>
              <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone" value="<?php echo e(old('phone1')); ?>">
            </div>

            <!-- Telefono 2 -->
            <div class="form-group col-md-3">
              <label for="phone2">Phone 2</label>
              <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Phone"  value="<?php echo e(old('phone2')); ?>">
            </div>

            <!-- Pais -->
            <div class="form-group col-md-3">
              <label for="country_id">Country</label>
              <select class="custom-select <?php echo e($errors->has('country_id') ? 'border-danger' : ''); ?>" id="country_id" name="country_id" placeholder="...">
                <option selected>...</option>
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($country['id']); ?>"><?php echo e($country->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
              </select>

              <?php echo $errors->first('country_id', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Estado -->
            <div class="form-group col-md-3">
              <label for="state_id">State</label>
              <select class="custom-select <?php echo e($errors->has('state_id') ? 'border-danger' : ''); ?>" id="state_id" name="state_id" placeholder="...">
              </select>
              <?php echo $errors->first('state_id', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Ciudad -->
            <div class="form-group col-md-6">
              <label for="city_id">City</label>
              <select type="text" class="custom-select <?php echo e($errors->has('city_id') ? 'border-danger' : ''); ?>" id="city_id" name="city_id" placeholder="...">
              </select>
            </div>
          </div>

          <!-- Direccion -->
          <div class="form-group" >
            <label for="direction">Address</label>
            <input type="text" class="form-control" id="direction" name="direction" placeholder="Address" value="<?php echo e(old('direction')); ?>">
          </div>

          <!-- Boton Aceptar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>

      </div>
    </section>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>