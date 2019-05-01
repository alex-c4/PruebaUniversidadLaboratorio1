<?php $__env->startSection('content'); ?>

<style type="text/css">
    #header{
        background: rgba(0, 0, 0, 0.9);
    }
    #espaciador{
        margin-top: 10%;
    }
</style>

<div id="espaciador"></div>

<div class="container">
<form id="formDestroy" action="<?php echo e(route('news.destroy', $news->id)); ?>" method="post">
    <?php echo e(method_field('DELETE')); ?>

    <?php echo e(csrf_field()); ?>


    <div class="section-header">
        <h3>Noticias XportGold</h3>
            <p>
                <a href="<?php echo e(url('/#news')); ?>" title="Ir a noticias"><i class="fa fa-reply"></i></a>
                <?php if(auth()->user() != null && auth()->user()->hasRoles('Administrator')): ?>
                    <span style="margin: 3px"></span>
                    <a href="<?php echo e(route('news.edit', $news->id)); ?>" title="Editar" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                    <span style="margin: 3px"></span>
                    <a href="#" onclick="document.getElementById('formDestroy').submit()" title="Ocultar noticia" class="btn btn-outline-danger"><i class="fa fa-eye-slash"></i></a>
                    <span style="margin: 3px"></span>
                    <a href="<?php echo e(route('news.index')); ?>" title="Lista de noticias" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>

                <?php endif; ?>
            </p>
    </div>
    </form>

    <div class="row" style="text-align: justify;">
        <div class="text-justify">
            <div class=" col-xs-6 col-lg-8">  
                <div class="thumbnail">
                <img src="<?php echo e(asset('img/notice/'.$news->name_img)); ?>" title="<?php echo e($news->titulo); ?>" class="img-thumbnail">
                <p> <?php echo e($news->fuente_imagen); ?></p> 
                </div>
            </div>

            <div class=" col-xs-6 col-lg-8">
                <div class="caption">
                    <h2 class="title"><?php echo e($news->titulo); ?></h2>

                    <p>
                        Fuente: <?php echo e($news->fuente_noticia); ?>

                        <br>
                        <br>
                        <?php echo nl2br(e($news->cuerpo)); ?>


                        <br>                  
                    </p> 

                    <a href="<?php echo e(url('/#news')); ?>" class="btn"><i class="fa fa-reply"></i> Volver a noticias</a>
                    <div id="espaciador"></div>

                </div>

            </div>
        </div >

    </div>       

</div>

    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layoutLogin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>