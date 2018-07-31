<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow jackInTheBox" >
<form method="POST" action="<?php echo e(route('savePronostic')); ?>" method>

    <div class="section-header">

        <h3>Adicionar Pronosticos</h3>
        <p>Panel con los pronósticos registrados, podra adicionar los nuevos pronosticos a siguientes fases</p>

        <div class="container">
            <?php if(count($pronostics) > 0): ?>
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quiniela</th>
                        <th scope="col">Campeonato</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pronostics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pronostic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <tr>
                            <th scope="row"><?php echo e($key+1); ?></th>
                            <td><?php echo e($pronostic->quiniela); ?></td>
                            <td><?php echo e($pronostic->championshipName); ?></td>
                            <td>
                                <?php if($pronostic->isActive == 1): ?>
                                    <a href="<?php echo e(url('quiniela/showNewPronosticByPhase/')); ?>/<?php echo e($pronostic->id_quiniela); ?>/<?php echo e($pronostic->betId); ?>/<?php echo e($pronostic->phase); ?>" class="btn btn-outline-warning btn-sm" role="button" aria-pressed="true" title="Sumar nuevos pronósticos"><?php echo e($pronostic->phase); ?></a>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Información!</h4>
                <p>Aún no posee pronósticos cargados, por favor dirijase al módulo de registro de pronósticos <a href="<?php echo e(route('quiniela')); ?>">aqui</a> y complete su primer pronóstico.</p>
                <hr>
                <p class="mb-0">El equipo de XportGold le desea mucho éxito en su pronóstico.</p>
            </div>
            <?php endif; ?>

        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>