<?php $__env->startSection('content'); ?>




<html><head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">


    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-style.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <!-- DATA TABLE CSS -->
    <link href="css/table.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo e(asset('lib/jquery/jquery.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="<?php echo e(asset('lib/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('lib/bootstrap/css/bootstrap.min.css')); ?>" /> -->

	<!-- <script type="text/javascript" src="<?php echo e(asset('lib/dash/lineandbars.js')); ?> "></script>

	<script type="text/javascript" src="<?php echo e(asset('lib/dash/dash-charts.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('lib/dash/gauge.js')); ?>"></script> -->

	<!-- NOTY JAVASCRIPT -->
	<!-- <script type="text/javascript" src="<?php echo e(asset('lib/dash/noty/jquery.noty.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('lib/dash/noty/layouts/top.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('lib/dash/noty/layouts/topLeft.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('lib/dash/noty/layouts/topRight.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('lib/dash/noty/layouts/topCenter.js')); ?>"></script> -->

	<!-- You can add more layouts if you want -->
	<!-- <script type="text/javascript" src="<?php echo e(asset('lib/dash/noty/themes/default.js')); ?>"></script> -->
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<!-- <script src="<?php echo e(asset('lib/dash/jquery.flexslider.js')); ?>" type="text/javascript"></script> -->

    <!-- <script type="text/javascript" src="<?php echo e(asset('lib/dash/admin.js')); ?>"></script> -->

    <style type="text/css">
      body {
        padding-top: 60px;
      }
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

  <script type="text/javascript">
    $(document).ready(function () {

        document.getElementById("divDashboard").style.visibility = "visible";
        document.getElementById("divLoading").style.display = "none";
        

    });

  </script>

  </head>
  <body>
    
<br>
<br>

    <div id="divLoading" class="col-sm-12" style="display:display; margin-top: 50px">
      <div class="text-center">
          <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
          <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div id="divDashboard" style="visibility: hidden" class="container wow fadeInUp" data-wow-delay="0.1s">
    
      <h1><?php echo e(ucfirst(auth()->user()->name)); ?> <?php echo e(ucfirst(auth()->user()->lastName)); ?></h1>
      <div class="row text-center">

    
      <div class="col-lg-3 col-sm-6">
        <a href="<?php echo e(route('userEdit')); ?>">
          <img src="<?php echo e(asset('img/icons_new_panel/user_information.png')); ?>" height="50" alt="panel de cromos" srcset="">
          <p>
            Información
          </p>
        </a>
      </div>

      <div class="col-lg-3 col-sm-6">
        <a href="<?php echo e(route('resetPassw')); ?>">
          <img src="<?php echo e(asset('img/icons_new_panel/user_password.png')); ?>" height="50" alt="panel de cromos" srcset="">
          <p>
            Cambiar Clave
          </p>
        </a>
      </div>
    </div>  

    <!-- bloqueado temporalmente -->
    <?php if(1 == 0): ?>
    <div class="row text-center">
          <!-- <div class="alert alert-dark  col-sm-12" role="alert">
            Cromos
          </div> -->
          
        <div class="col-lg-12 titleDashboard">
        <button type="button" class="btn btn-outline-info btn-lg btn-block" disabled>Cromos</button>
          <!-- <h4>Cromos</h4> -->
          <br>
          
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(url('sticker')); ?>">
            <img src="<?php echo e(asset('img/icons_new_panel/cromo_panel.png')); ?>" height="50" alt="panel de cromos" srcset="">
            <p>
              Panel de cromos
            </p>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(url('conv')); ?>">
            <img src="<?php echo e(asset('img/icons_new_panel/cromos_messages.png')); ?>" height="50" alt="panel de cromos" srcset="">
            <p>
              Mensajeria de Intercambio
            </p>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(asset('files/Instructivo Intercambio Cromos XportGold.pdf')); ?>" target="_blank">
            <img src="<?php echo e(asset('img/icons_new_panel/quiniela_descargar_instructivo.png')); ?>" height="50" alt="panel de cromos" srcset="">
            <p>
              Descargar Instructivo Cromos
            </p>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
        </div>
      </div>

      <br>
      <?php endif; ?>
<!-- Apagado para subir a produccion solo cromos-->
      <div class="row text-center">
          <!-- <div class="alert alert-dark   col-sm-12" role="alert">
          Quinielas
          </div>  -->


        <div class="col-lg-12 titleDashboard">
          <button type="button" class="btn btn-outline-info btn-lg btn-block" disabled>XportGames</button>
          <!-- <h4>Quinielas</h4> -->

          <br>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(asset('/files/Instructivo Quiniela Fase Final Rusia 2018_XportGold.pdf')); ?>" target="_blank">
            <img src="<?php echo e(asset('img/icons_new_panel/download_manual.png')); ?>" height="50" alt="Instructivo de Juego" srcset="">
            <p>
              Instructivo de Juego
            </p>
          </a>
        </div>
        
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(asset('/files/Reglamento Quiniela Fase Final Rusia 2018 XportGold.pdf')); ?>" target="_blank">
            <img src="<?php echo e(asset('img/icons_new_panel/quiniela_rules.png')); ?>" height="50" alt="Reglamento de Juego" srcset="">
            <p>
              Reglamento de Juego
            </p>
          </a>
        </div>
          
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(route('quiniela')); ?>">
            <img src="<?php echo e(asset('img/icons_new_panel/quiniela_add_pronostics.png')); ?>" height="50" alt="Nuevo Pronósticos" srcset="">
            <p>
              Registrar Pronósticos
            </p>
          </a>
        </div>
          
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(route('searchPronostics')); ?>">
            <img src="<?php echo e(asset('img/icons_new_panel/quiniea_my_pronostics.png')); ?>" height="50" alt="Mis Pornósticos" srcset="">
            <p>
              Mis Pronósticos
            </p>
          </a>
        </div>

        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(route('codeQuiniela')); ?>">
            <img src="<?php echo e(asset('img/icons_new_panel/quiniela_add.png')); ?>" height="50" alt="Registro de Pronósticos" srcset="">
            <p>
              Unirse a XportGame
            </p>
          </a>
        </div>

        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(route('createPrivateQuiniela')); ?>">
            <img src="<?php echo e(asset('img/icons_new_panel/quiniela_pronostics.png')); ?>" height="50" alt="Crear Quiniela" srcset="">
            <p>
              Registrar XportGames 
            </p>
          </a>
        </div>
        
          <?php if(auth()->user()->hasRoles('Administrator')): ?> 

          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo e(route('clubs.index')); ?>">
              <img src="<?php echo e(asset('img/icons_new_panel/quiniela_club.png')); ?>" height="50" alt="Ver Clubes" srcset="">
              <p>
                Registrar Clubes
              </p>
            </a>
          </div>
          
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo e(route('games.create')); ?>">
              <img src="<?php echo e(asset('img/icons_new_panel/quiniela_add_games.png')); ?>" height="50" alt="Crear Juego" srcset="">
              <p>
                Crear Juego
              </p>
            </a>
          </div>
          
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo e(url('/listarBetsPay')); ?>">
              <img src="<?php echo e(asset('img/icons_new_panel/Paypal.png')); ?>" height="50" alt="Crear Juego" srcset="">
              <p>
                Validar pago
              </p>
            </a>
          </div>
          
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo e(route('championship.index')); ?>">
              <img src="<?php echo e(asset('img/icons_new_panel/championship.png')); ?>" height="50" alt="Crear Juego" srcset="">
              <p>
                Campeonatos/Copa/Jornada
              </p>
            </a>
          </div>
          
          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo e(route('result.listChampionships')); ?>">
              <img src="<?php echo e(asset('img/icons_new_panel/soccer-livescore2.png')); ?>" height="50" alt="Crear Juego" srcset="">
              <p>
                Registrar resultados
              </p>
            </a>
          </div>

        <?php endif; ?>
        <div class="col-lg-3 col-sm-6">
          <a href="<?php echo e(route('result.positionsTable')); ?>">
            <img src="<?php echo e(asset('img/icons_new_panel/quiniela_position_table.png')); ?>" height="50" alt="Crear Juego" srcset="">
            <p>
              Tabla de Posiciones XportGames
            </p>
          </a>
        </div>

      </div>

      <br>

    <?php if(auth()->user()->hasRoles('Administrator') || auth()->user()->hasRoles('Blog')): ?>
      <div class="row text-center">
        <div class="col-lg-12 titleDashboard">
          <button type="button" class="btn btn-outline-info btn-lg btn-block" disabled>Blog / Noticias</button>
          <br>
        </div>

          <div class="col-lg-3 col-sm-6">
            <a href="<?php echo e(route('blogs.index')); ?>">
              <img src="<?php echo e(asset('img/icons_new_panel/blogger.png')); ?>" height="50" alt="Crear Juego" srcset="">
              <p>
                Blogs
              </p>
            </a>
          </div>
      <?php if(auth()->user()->hasRoles('Administrator')): ?>
            <div class="col-lg-3 col-sm-6">
              <a href="<?php echo e(route('news.index')); ?>">
                <img src="<?php echo e(asset('img/icons_new_panel/news-reader.png')); ?>" height="50" alt="Crear Juego" srcset="">
                <p>
                  Noticias
                </p>
              </a>
            </div>
      <?php endif; ?>
    
      </div>
    <?php endif; ?>

      </div>


<hr>
<br>



  </body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>