<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Listado</h3>
            <p>
                <a href="<?php echo e(route('games.create')); ?>" title="Crear juegos" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
            </p>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Encuentro</th>
                <th scope="col">Fase</th>
                <th scope="col">Grupo</th>
                <th scope="col" >Fecha / Hora</th>
                <th scope="col" colspan="4"></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($game->id); ?></th>
                <td ><?php echo e($game->nombre_club_1); ?> vs <?php echo e($game->nombre_club_2); ?></td>
                <td><?php echo e($game->fase); ?></td>
                <td><?php echo e($game->grupo); ?></td>
                <td><?php echo e($game->date); ?> / <?php echo e($game->time); ?></td>
                
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </tbody>
        </table>
    </div> 
</section>


    
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>