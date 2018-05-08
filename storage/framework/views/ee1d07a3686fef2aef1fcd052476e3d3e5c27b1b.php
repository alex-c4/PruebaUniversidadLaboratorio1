<?php $__env->startSection('content'); ?>


<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
</style>
<hr/>

<section id="contact" class="section-bg wow fadeInUp" >
      <div class="container" >

        <div class="section-header">
          <h3>Register</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <form method="POST" action="<?php echo e(route('register')); ?>">

          <?php echo e(csrf_field()); ?>


          <div class="form-row">
            <!-- Nombre -->
            <div class="form-group col-md-6">
              <label for="name">Nombre</label>
              <input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
            </div>

            <!-- Apellido -->
            <div class="form-group col-md-6">
              <label for="Apellido">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido">
            </div>

            <!-- Email -->
            <div class="form-group col-md-6" >
              <label for="email">Email</label>
              <input type="email" class="form-control <?php echo e($errors->has('email') ? 'border-danger' : ''); ?>" name="email" placeholder="Email">
              <?php echo $errors->first('email', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Clave 1 -->
            <div class="form-group col-md-3">
              <label for="password">Password</label>
              <input type="password" class="form-control <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" name="password" placeholder="Contraseña">
              <?php echo $errors->first('password', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Clave confirm -->
            <div class="form-group col-md-3">
              <label for="password">Confirmar Password</label>
              <input type="password" class="form-control <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" name="password" placeholder="Contraseña">
              <?php echo $errors->first('password', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Fecha de Nacimiento -->
            <div class="form-group col-md-6">
              <label for="birthday">Fecha de Nacimiento</label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Telefono 1             -->
            <div class="form-group col-md-3">
              <label for="phone1">Teléfono 1</label>
              <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Teléfono">
            </div>

            <!-- Telefono 2 -->
            <div class="form-group col-md-3">
              <label for="phone2">Teléfono 2</label>
              <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Teléfono">
            </div>

            <!-- Pais -->
            <div class="form-group col-md-3">
              <label for="country">Pais</label>
              <select class="custom-select" id="country" name="country">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>

            <!-- Estado -->
            <div class="form-group col-md-3">
              <label for="state">Estado</label>
              <select class="custom-select" id="state" name="state">
                <option selected>Choose...</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>

            <!-- Ciudad -->
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
          </div>

          <!-- Direccion -->
          <div class="form-group" >
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
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