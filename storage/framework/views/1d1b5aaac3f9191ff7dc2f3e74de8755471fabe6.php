<?php $__env->startSection('content'); ?>

<hr/>
<section id="contact" class="section-bg wow fadeInUp" >

    <div class="container" >
        <div style='padding: 50px;'>

            <div class="section-header">
                <h3>Actualización de Clave</h3>
                <p>Ingrese los campos a continuación para el cambio de clave</p>
            </div>

            <form method="POST" id="form" action="<?php echo e(route('updatePassw')); ?>">

                <?php echo e(csrf_field()); ?>



                <div class="row">
                    <div class="form-group col-md-3">&nbsp;</div>
                    <!-- Clave 1 -->
                    <div class="form-group col-md-6">
                        <label for="currentPassword">Password actual</label>
                        <input type="password" class="form-control <?php echo e($errors->has('currentPassword') ? 'border-danger' : ''); ?>" name="currentPassword" id="currentPassword" placeholder="Password actual">
                        <?php echo $errors->first('currentPassword', '<span class="text-danger">:message</span>'); ?>

                    </div>
                    <div class="form-group col-md-3">&nbsp;</div>

                    <div class="form-group col-md-3">&nbsp;</div>
                    <!-- Clave confirm -->
                    <div class="form-group col-md-6">
                        <label for="password">Nuevo Password</label>
                        <input type="password" class="form-control <?php echo e($errors->has('password') ? 'border-danger' : ''); ?>" name="password" id="password" placeholder="Nuevo password">
                        <?php echo $errors->first('password', '<span class="text-danger">:message</span>'); ?>

                    </div>
                    <div class="form-group col-md-3">&nbsp;</div>

                    <div class="form-group col-md-3">&nbsp;</div>
                    <!-- Clave confirm -->
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">Confirmar nuevo password</label>
                        <input type="password" class="form-control <?php echo e($errors->has('password_confirmation') ? 'border-danger' : ''); ?>" name="password_confirmation" id="password_confirmation" placeholder="Confirmar nuevo password">
                        <?php echo $errors->first('password_confirmation', '<span class="text-danger">:message</span>'); ?>

                    </div>
                    <div class="form-group col-md-3">&nbsp;</div>

                    <?php if(Session::has('message')): ?>
                    <div class="form-group col-md-3">&nbsp;</div>
                    <div class="form-group col-md-6">
                        <div class="alert alert-success" role="alert">
                            <?php echo e(Session::get('message')); ?>

                        </div>
                    </div>
                    <div class="form-group col-md-3">&nbsp;</div>
                    <?php endif; ?>

                    <?php if(Session::has('error')): ?>
                        <div class="form-group col-md-3">&nbsp;</div>
                        <div class="form-group col-md-6">
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(Session::get('error')); ?>

                            </div>
                        </div>
                        <div class="form-group col-md-3">&nbsp;</div>
                    <?php endif; ?>

                </div>

                <!-- Boton Aceptar -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success form-group">Actualizar</button>
                </div>

            </form>
            
        </div>

    </div>

</section>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>