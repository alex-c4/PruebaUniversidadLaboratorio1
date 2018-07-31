<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form method="POST" action="" method>

    <input type="hidden" id="routeCurrent" value="<?php echo e(url('/')); ?>">

    <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">

    <div class="section-header">

        <h3>Apuestas</h3>
        <p>Módulo para la consulta de apuestas</p>

        <div class="container">

           <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Quiniela</th>
                    <th scope="col">Ref Pago</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha Pago</th>
                    <th scope="col">Estatus Pago</th>
                    <th scope="col">Validar</th>
                    </tr>
                </thead>
                <tbody>
                     <?php $__currentLoopData = $bets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <tr>
                        <th scope="row"><?php echo e($bet->id); ?></th>
                        <td><?php echo e($bet->id_user); ?></td>
                        <td><?php echo e($bet->id_quiniela); ?></td>
                        <td><?php echo e($bet->ref_pago); ?></td>
                        <td><?php echo e($bet->amount); ?></td>
                        <td><?php echo e($bet->payment_date); ?></td>                        
                        <?php if($bet->verification == '' or $bet->verification == '0' ): ?>
                            <td>Sin Verificar</td>
                            <td>
                                <a href="<?php echo e(route('validarPagoBets',[ 'betId'=> $bet->id, 'validacion'=>'1'])); ?>" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="ValidarPago">ValidarPago</a>
                            </td>    
                        <?php elseif($bet->verification == 1 ): ?>
                            <td>Verificado</td>
                            <td>
                                <a href="<?php echo e(route('validarPagoBets',[ 'betId'=> $bet->id, 'validacion'=>'0'])); ?>" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Rechazar pago">Rechazar pago</a>
                            </td>
                        <?php endif; ?>
                        </td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
                          
                    
            </div>

        </div>
    </div>

</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>