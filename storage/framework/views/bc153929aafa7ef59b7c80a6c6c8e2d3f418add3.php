<?php $__env->startSection('content'); ?>

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg <?php echo e(env('EFECT_WOW')); ?>" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Listado</h3>
            <p>Blogs XportGold</p>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col" colspan="4">Fecha de publicación</th>
                <th scope="col" colspan="4"></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr <?php if($blog->borrado == 1): ?> class="bg-warning" <?php endif; ?>>
                <th scope="row"><?php echo e($blog->id); ?></th>
                <td ><a href="<?php echo e(route('blogs.show', $blog->id)); ?>" title="Ver noticia"><?php echo e($blog->title); ?></a></td>
                <td><?php echo e($blog->created_at); ?></td>
                <td>
                    <a href="<?php echo e(route('blogs.edit', $blog->id)); ?>" title="Editar" data-toggle="tooltip" data-placement="left" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a href="<?php echo e(route('blogs.show', $blog->id)); ?>" title="Ver Blog" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                </td>
                <td>
                    <?php if($blog->borrado == 1): ?>
                        <form id="formRestore_<?php echo e($blog->id); ?>" action="<?php echo e(route('blogs.restore', $blog->id)); ?>" method="post">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" onclick="document.getElementById('formRestore_<?php echo e($blog->id); ?>').submit()" title="Activar noticia" class="btn btn-outline-dark"><i class="fa fa-undo"></i></a>
                        </form>
                    <?php else: ?>
                        <form id="formDestroy_<?php echo e($blog->id); ?>" action="<?php echo e(route('blogs.destroy', $blog->id)); ?>" method="post">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <a href="#" onclick="document.getElementById('formDestroy_<?php echo e($blog->id); ?>').submit()" title="Ocultar noticia" class="btn btn-outline-danger"><i class="fa fa-eye-slash"></i></a>
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