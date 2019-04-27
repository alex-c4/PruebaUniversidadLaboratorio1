<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Listado</h3>
            <p>Noticias y reportajes XportGold</p>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fuente de la noticia</th>
                <th scope="col" colspan="4">Fecha de publicación</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr <?php if($new->borrado == 1): ?> class="bg-warning" <?php endif; ?>>
                <th scope="row"><?php echo e($new->id); ?></th>
                <td ><a href="<?php echo e(route('news.show', $new->id)); ?>" title="Ver noticia"><?php echo e($new->titulo); ?></a></td>
                <td><?php echo e(str_limit($new->fuente_noticia, $limit = 20)); ?></td>
                <td><?php echo e($new->fecha_publicacion); ?></td>
                <td>
                    <a href="<?php echo e(route('news.edit', $new->id)); ?>" title="Editar II" data-toggle="tooltip" data-placement="left" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a href="<?php echo e(route('news.show', $new->id)); ?>" title="Ver noticia" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                </td>
                <td>
                    <?php if($new->borrado == 1): ?>
                        <form id="formRestore_<?php echo e($new->id); ?>" action="<?php echo e(route('news.restore', $new->id)); ?>" method="post">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" onclick="document.getElementById('formRestore_<?php echo e($new->id); ?>').submit()" title="Activar noticia" class="btn btn-outline-dark"><i class="fa fa-undo"></i></a>
                        </form>
                    <?php else: ?>
                        <form id="formDestroy_<?php echo e($new->id); ?>" action="<?php echo e(route('news.destroy', $new->id)); ?>" method="post">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" onclick="document.getElementById('formDestroy_<?php echo e($new->id); ?>').submit()" title="Ocultar noticia" class="btn btn-outline-danger"><i class="fa fa-eye-slash"></i></a>
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
    </div> 
</section>

    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>