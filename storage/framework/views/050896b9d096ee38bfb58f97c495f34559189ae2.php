<?php $__env->startSection('content'); ?>

<hr/>

<section id="contact" class="section-bg wow bounceInLeft" >

    <div class="container">
    
        <div class="section-header">
            <br>
            <h3>Registro Quiniela Privada</h3>
            <p>Panel para la creación y registro de las predicciones de los juegos del mundial Rusia 2018</p>
        </div>

        <form method="POST" action="<?php echo e(route('saveNewQuinielaPrivate')); ?>" id="formCreateQuiniela">

            <?php echo e(csrf_field()); ?>


            <div class="form-row">
                <!-- Competición -->
                <div class="form-group col-md-3">
                <label for="champ_id">Competición <span style="color: red">*</span></label>
                <select class="custom-select <?php echo e($errors->has('champ_id') ? 'border-danger' : ''); ?>" id="champ_id" name="champ_id" placeholder="...">
                    <option selected>...</option>
                    <?php $__currentLoopData = $championships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $champ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($champ['id']); ?>"><?php echo e($champ->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                </select>
                <?php echo $errors->first('champ_id', '<span class="text-danger">:message</span>'); ?>

                </div>

                <!-- Nombre -->
                <div class="form-group col-md-5">
                <label for="name">Nombre <span style="color: red">*</span></label>
                <input type="text" class="form-control <?php echo e($errors->has('name') ? 'border-danger' : ''); ?>" name="name" id="name" placeholder="Nombre" value="<?php echo e(old('name')); ?>">
                <?php echo $errors->first('name', '<span class="text-danger">:message</span>'); ?>

                </div>

                <!-- Tipo de quiniela -->
                <div class="form-group col-md-3">
                <label for="type_id">Tipo <span style="color: red">*</span></label>
                <select class="custom-select <?php echo e($errors->has('type_id') ? 'border-danger' : ''); ?>" id="type_id" name="type_id" placeholder="...">
                    <option selected>...</option>
                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if(Auth::user()->rollId != 1): ?>
                            <option selected value="<?php echo e($type['id']); ?>"><?php echo e($type->name); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($type['id']); ?>"><?php echo e($type->name); ?></option>
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
                </select>
                <?php echo $errors->first('type_id', '<span class="text-danger">:message</span>'); ?>

                </div>

                <!-- Nombre -->
                <div class="form-group col-md-1">
                    <label for="type_id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <button  type="submit" class="btn btn-outline-success" data-dismiss="modal"><i class="fa fa-plus"></i></button>
                </div>

            </div>
        </form>
        <h5>Mis quinielas</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Quiniela</th>
                <th scope="col">Campeonato</th>
                <th scope="col">Tipo</th>
                <th scope="col">Código</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $misQuinielas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$quinielaPrivada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                <tr>
                    <th scope="row"><?php echo e($key+1); ?></th>
                    <td><?php echo e($quinielaPrivada->nombre); ?></td>
                    <td><?php echo e($quinielaPrivada->championship); ?></td>
                    <td><?php echo e($quinielaPrivada->tipo); ?></td>
                    <td><?php echo e($quinielaPrivada->codigo); ?></td>
                </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>   
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>