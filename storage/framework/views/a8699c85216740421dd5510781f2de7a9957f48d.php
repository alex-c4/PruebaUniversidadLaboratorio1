<?php $__env->startSection('content'); ?>


<hr/>

<input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">

<section id="contact" class="section-bg wow bounceInLeft" >
<div class="section-header container">
        <h3>Quiniela</h3>
        <p>Listado de quinielas públicas y privadas creadas por la comunidad de XportGold</p>
        
        <form action="<?php echo e(url('quiniela/save')); ?>" method="post">

            <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

            <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">
            
            Publicas
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Quiniela</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Creación</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $misQuinelasPublicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quinielaPublica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <tr>
                        <th scope="row"><?php echo e($quinielaPublica->idQuiniela); ?></th>
                        <td><?php echo e($quinielaPublica->nombreQuiniela); ?></td>
                        <td><?php echo e($quinielaPublica->nombreCampeonato); ?></td>
                        <td><?php echo e($quinielaPublica->tipoQuiniela); ?></td>
                        <td><?php echo e($quinielaPublica->fechaCreacionQuiniela); ?></td>
                        <td><a href="<?php echo e(url('quiniela/searchGames/')); ?>/<?php echo e($quinielaPublica->idQuiniela); ?>" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Agregar nuevo pronostico"><i class="fa fa-plus-circle fa-sm"></i></a></td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>


            Privadas
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Quiniela</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Creación</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $misQuinielasPrivadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quinielaPrivada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <tr>
                        <th scope="row"><?php echo e($quinielaPrivada->idQuiniela); ?></th>
                        <td><?php echo e($quinielaPrivada->nombreQuiniela); ?></td>
                        <td><?php echo e($quinielaPrivada->nombreCampeonato); ?></td>
                        <td><?php echo e($quinielaPrivada->tipoQuiniela); ?></td>
                        <td><?php echo e($quinielaPrivada->fechaCreacionQuiniela); ?></td>
                        <td><a href="<?php echo e(url('quiniela/searchGames/')); ?>/<?php echo e($quinielaPrivada->idQuiniela); ?>" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Agregar nuevo pronostico"><i class="fa fa-plus-circle fa-sm"></i></a></td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>



            

        </form>
</div>


</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>