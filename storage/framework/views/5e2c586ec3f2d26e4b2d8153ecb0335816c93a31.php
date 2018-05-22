<?php $__env->startSection('content'); ?>


<!doctype html>


<html><head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Carlos Alvarez - Alvarez.is">

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />

    <link href="css/main.css" rel="stylesheet">
    <link href="css/font-style.css" rel="stylesheet">
    <link href="css/flexslider.css" rel="stylesheet">
    <!-- DATA TABLE CSS -->
    <link href="css/table.css" rel="stylesheet">

    <script type="text/javascript" src="dash/js/jquery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="dash/js/lineandbars.js"></script>

	<script type="text/javascript" src="dash/js/dash-charts.js"></script>
	<script type="text/javascript" src="dash/js/gauge.js"></script>

	<!-- NOTY JAVASCRIPT -->
	<script type="text/javascript" src="dash/js/noty/jquery.noty.js"></script>
	<script type="text/javascript" src="dash/js/noty/layouts/top.js"></script>
	<script type="text/javascript" src="dash/js/noty/layouts/topLeft.js"></script>
	<script type="text/javascript" src="dash/js/noty/layouts/topRight.js"></script>
	<script type="text/javascript" src="dash/js/noty/layouts/topCenter.js"></script>

	<!-- You can add more layouts if you want -->
	<script type="text/javascript" src="dash/js/noty/themes/default.js"></script>
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<script src="dash/js/jquery.flexslider.js" type="text/javascript"></script>

    <script type="text/javascript" src="dash/js/admin.js"></script>

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

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

    $(window).load(function () {

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>
  </head>
  <body>

	<br>
  <br>
  <br>
  <br>

    <div class="container">

	  <!-- FIRST ROW OF BLOCKS -->
      <div class="row">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>Usuario</dtitle>
	      		<hr>
				<div class="thumbnail">
					<img src="img/LoginIcon.png" alt="Marcel Newman" class="img-circle">
				</div><!-- /thumbnail -->
        <br>
				<h1><?php echo e(auth()->user()->name); ?></h1>
				
				<br>
					<div class="info-user">
						<span aria-hidden="true" class="li_user fs1"></span>
						<span aria-hidden="true" class="li_settings fs1"></span>
						<span aria-hidden="true" class="li_mail fs1"></span>
						<span aria-hidden="true" class="li_key fs1"></span>
					</div>
				</div>
        </div>



        <!-- OPCIONES -->

              	

                  <!-- OPCION 1 Cromos -->
              			<div class="col-sm-3 col-lg-3">
              				<div id="hosting-table">
        						<div class="table_style4">
        							<div class="column">
        								<ul>

        									<li class="header_row">
        										<h1>Cromos</h1>
        									</li>
        									<li>Panel de Cromos<a class="tt" href="<?php echo e(url('sticker')); ?>"> (-- Ir --)<span class="tooltip"><span class="triangle-obtuse">Puedes consultar tus cromos adquiridas, repetidas y de interes desde tu panel</span></span></a></li>
	                        <li>Mensajerias de Intercambio<a class="tt" href="<?php echo e(url('conv')); ?>"> (-- Ir --)<span class="tooltip"><span class="triangle-obtuse">Consulta tus intercambios de cromos y sus respectivas conversaciones </span></span></a></li>
                          <li>-</li>


        									<li class="footer_row"><a href="#" class="hosting-button">cromos</a></li>
        								</ul>
        							</div><!--/ column-->
        						</div><!--/ Table Style-->
        					</div><!--/ Hosting Table-->
              			</div><!-- /span3 -->


                    <!-- OPCION 2 Quinielas -->
                			<div class="col-sm-3 col-lg-3">
                				<div id="hosting-table">
          						<div class="table_style4">
          							<div class="column">
          								<ul>

          									<li class="header_row">
          										<h1>Quinielas</h1>
          									</li>
          									<li>Nueva Quiniela Privada<a class="tt" href="#"> (-- Ir --)<span class="tooltip"><span class="triangle-obtuse">Puedes consultar tus cromos adquiridas, repetidas y de interes desde tu panel</span></span></a></li>
  	                        <li>Quiniela Principal<a class="tt" href="#"> (-- Ir --)<span class="tooltip"><span class="triangle-obtuse">Consulta tus intercambios de cromos y sus respectivas conversaciones </span></span></a></li>
                            <li>-</li>

          									<li class="footer_row"><a href="#" class="hosting-button">QUINIELAS</a></li>
          								</ul>
          							</div><!--/ column-->
          						</div><!--/ Table Style-->
          					</div><!--/ Hosting Table-->
                			</div><!-- /span3 -->

                      <!-- Saldo del Usuario -->
                          <div class="col-sm-3 col-lg-3">
                            <div class="dash-unit">
                              <dtitle>Tu Saldo</dtitle>
                              <hr>
                              <div class="cont">
                                <br>
                                <br>
                            <p><bold>879</bold> | <ok> GOLD</ok></p>
                            <br>
                          </div>

                        </div>
                          </div>


              	

	</div> <!-- /container -->


</body></html>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layoutMenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>