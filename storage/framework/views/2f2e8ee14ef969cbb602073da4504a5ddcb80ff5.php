<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow jackInTheBox" >
<form method="POST" action="<?php echo e(route('savePronostic')); ?>" method>

    <div class="section-header">

        <h3>Pronósticos Creados</h3>
        <p>Panel con los pronósticos registrados, podra realizar el pago o actualización de alguno de ellos</p>

        <div class="container">
            <?php if(count($pronostics) > 0): ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quiniela</th>
                        <th scope="col">Campeonato</th>
                        <th scope="col">Validado</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pronostics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pronostic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <tr>
                            <th scope="row"><?php echo e($key+1); ?></th>
                            <td><?php echo e($pronostic->quiniela); ?></td>
                            <td><?php echo e($pronostic->championshipName); ?></td>
                            <td><input type="checkbox" disabled <?php if($pronostic->verification == "1"): ?>{ checked } <?php endif; ?>></td>
                            <td>
                                <a href="<?php echo e(url('quiniela.pronosticEdit/')); ?>/<?php echo e($pronostic->betId); ?>" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Editar pronóstico"><i class="fa fa-edit fa-sm"></i></a>
                                <a href="<?php echo e(url('payQuiniela/')); ?>" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Realizar pago pronóstico"><i class="fa fa-paypal fa-sm"></i></a>
                                <?php if($pronostic->refPago == ''): ?>
                                    <a href="<?php echo e(url('payment')); ?><?php echo e($pronostic->betId); ?>" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Realizar pago pronóstico"><i class="fa fa-credit-card fa-sm"></i></a>
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