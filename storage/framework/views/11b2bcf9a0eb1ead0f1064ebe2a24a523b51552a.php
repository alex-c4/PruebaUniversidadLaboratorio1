<?php $__env->startSection('content'); ?>

<hr/>


<section id="contact" class="section-bg wow" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Registro</h3>
            <p>
                <a href="<?php echo e(route('games.index')); ?>" title="Lista de juegos" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>
            </p>
        </div>
        
        <form action="<?php echo e(route('games.store')); ?>" method="post" id="form_create_games" >
            <div class="form-row">

                <?php echo e(csrf_field()); ?>

                <div class="form-group col-md-12">
                    <label for="championships">Campeonato</label>
                    <select id="championships" name="championships" class="form-control"  >
                        <?php $__currentLoopData = $championships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $championship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($championship->id); ?>" ><?php echo e($championship->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <input type="hidden" name="nombre_club_2">

                <div class="form-group col-md-6">
                    <label for="club1">Pais / Club</label>
                    <select id="club1" name="club1" class="form-control" onchange="onchange_club1(this)">
                            <option>...</option>
                        <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($club->id_club); ?>"><?php echo e($club->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <input type="hidden" name="hClub1" id="hClub1">

                <div class="form-group col-md-6">
                    <label for="club2">Pais / Club </label>
                    <select id="club2" name="club2" class="form-control" onchange="onchange_club2(this)">
                        <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($club->id_club); ?>"><?php echo e($club->nombre); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <input type="hidden" name="hClub2" id="hClub2">

                <div class="form-group col-md-3">
                    <label for="fase">Fase</label>
                    <select id="fase" name="fase" class="form-control">
                        <option selected>eliminatoria</option>
                        <option>...</option>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="group">Grupo</label>
                    <select id="group" name="group" class="form-control">
                        <option selected>A</option>
                        <option >B</option>
                        <option >C</option>
                        <option >D</option>
                        <option >E</option>
                        <option >F</option>
                        <option >G</option>
                        <option >H</option>
                        <option >I</option>
                        <option >J</option>
                        <option>...</option>
                    </select>
                </div>

                <!-- Fecha de Juego -->
                <div class="form-group col-md-3">
                    <label for="date">Fecha de Juego </label>
                    <div class="input-group date dp-date">
                        <input type="text" class="form-control" name="date" id="date" placeholder="Fecha de Juego" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                </div>

                <!-- Hora de Juego -->
                <div class="form-group col-md-3">
                    <label for="time">Hora de Juego </label>
                    <input type="text" id="time" name="time" class="form-control" placeholder="16:00">
                </div>


                <div class="form-group col-md-12">
                    <label for="stadium">Estadio</label>
                    <input type="text" id="stadium" name="stadium" class="form-control" placeholder="Estadio">
                </div>

            </div>

               <!-- Boton Aceptar -->
                <div class="text-center">
                    <button type="submit" id="btnAceptar" class="btn btn-success">Registrar</button>
                </div>
        </form>
    </div>
</section>




<script>
    window.onload = function(){
        
        document.getElementById("championships").focus()

    };

    var onchange_club1 = function(me){
        
        document.getElementById("hClub1").value = me.options[me.selectedIndex].text
    }
    var onchange_club2 = function(me){
        
        document.getElementById("hClub2").value = me.options[me.selectedIndex].text
    }
</script>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>