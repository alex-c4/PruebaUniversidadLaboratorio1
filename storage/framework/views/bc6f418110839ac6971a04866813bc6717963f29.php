<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Registro</h3>
            <p>Registro de noticias y reportajes XportGold</p>
        </div>

        <form action="<?php echo e(route('news.store')); ?>" method="post" id="form_create_news" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


        <!-- Titulo -->
        <div class="form-row" >
            <!-- Titulo -->
            <div class="form-group col-md-6">
              <label for="titulo">Titulo <span style="color: red">*</span></label>
              <input type="text" class="form-control <?php echo e($errors->has('titulo') ? 'border-danger' : ''); ?>" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo e(old('titulo')); ?>">
              <?php echo $errors->first('titulo', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Fuente noticia -->
            <div class="form-group col-md-6">
              <label for="fuente_noticia">Fuente de la noticia <span style="color: red">*</span></label>
              <input type="text" class="form-control <?php echo e($errors->has('fuente_noticia') ? 'border-danger' : ''); ?>" name="fuente_noticia" id="fuente_noticia" placeholder="Fuente de la noticia" value="<?php echo e(old('fuente_noticia')); ?>" >
              <?php echo $errors->first('fuente_noticia', '<span class="text-danger">:message</span>'); ?>

            </div>

            <!-- Fecha de Puvlicacion -->
            <div class="form-group col-md-6">
              <label for="fecha_publicacion">Fecha de publicación <span style="color: red">*</span></label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control <?php echo e($errors->has('fecha_publicacion') ? 'border-danger' : ''); ?>" name="fecha_publicacion" id="fecha_publicacion" value="<?php echo e(old('fecha_publicacion')); ?>" placeholder="Fecha de publicación" >
                  <?php echo $errors->first('fecha_publicacion', '<span class="text-danger">:message</span>'); ?>

                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Fuente imagen -->
            <div class="form-group col-md-6">
              <label for="fuente_imagen">Fuente de la imagen <span style="color: red">*</span></label>
              <input type="text" class="form-control <?php echo e($errors->has('fuente_imagen') ? 'border-danger' : ''); ?>" name="fuente_imagen" id="fuente_imagen" placeholder="Fuente de la imagen" value="<?php echo e(old('fuente_imagen')); ?>" >
              <?php echo $errors->first('fuente_imagen', '<span class="text-danger">:message</span>'); ?>

            </div>

        </div>



        <!-- Contenido -->  
        <div class="form-group">
            <label for="cuerpo">Cuerpo<span style="color: red">*</span></label>
            <textarea class="form-control <?php echo e($errors->has('cuerpo') ? 'border-danger' : ''); ?>" name="cuerpo" id="cuerpo" rows="5" placeholder="Cuerpo" ><?php echo e(old('cuerpo')); ?></textarea>
                <?php echo $errors->first('cuerpo', '<span class="text-danger">:content</span>'); ?>

        </div>

        <!-- Imagen -->
        <div class="form-group" >
            <label for="name_img">Imagen</label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="name_img" name="name_img" placeholder="Imagen" value="<?php echo e(old('name_img')); ?>">
            <?php echo $errors->first('name_img', '<span class="text-danger">:content</span>'); ?>

        </div>
        
        <!-- Boton Aceptar -->
        <div class="text-center">
            <button type="submit" id="btnAceptar" class="btn btn-success">Registrar</button>
        </div>

        </form>


    </div>
    
</section>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>