<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Xport Gold</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  
  <link href="img/favicon.ico" rel="icon">
  <!-- 
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> 
  -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo e(asset('lib/bootstrap/css/bootstrap.css')); ?>" rel="stylesheet">
    
  <!-- Libraries CSS Files -->   
  <link href="<?php echo e(asset('lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/font-awesome/css/font-awesome.css')); ?>" rel="stylesheet">
  <!--<link href="<?php echo e(asset('css/fontawesome.css')); ?>" rel="stylesheet"> Sustitido por la de arriba--> 
  <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/lightbox/css/lightbox.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/jquery-confirm.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('css/jquery-confirm.less')); ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
  <style type="text/css">
    #header{
      background: rgba(0, 0, 0, 0.9);
    }
  </style>
</head>

<body>
  
<!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <!-- <h1><a href="#intro" class="scrollto">BizPage</a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="#intro"><img src="<?php echo e(url('img/logo.png')); ?>" alt="" title="" /></a>
     
	  
	   </div>

 
		 <!-- Boton PayPal -->
     <!-- 
		 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="D3NT46NQVQJYG">
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
</form>
-->

		 


      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
		  
		  
		  <li class="menu-active"><a href="<?php echo e(url('/')); ?>">Home</a></li>

          <?php if(Auth::check()): ?>
            <li><a href="<?php echo e(url('sticker')); ?>">Intercambiar Cromos</a></li>
          <?php else: ?>
           <li><a href="<?php echo e(url('/#about')); ?>">Intercambiar Cromos</a></li>
          <?php endif; ?>
          <li><a href="<?php echo e(url('/#notice')); ?>">Noticias</a></li>
          <li><a href="<?php echo e(url('/#portfolio')); ?>">Russia 2018</a></li>
          <li><a href="<?php echo e(url('/#contact')); ?>">Contactanos</a></li>
          <br>
          <?php if(Auth::check()): ?>            
            <li><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
            <li><a href="<?php echo e(url('/logout')); ?>">Cerrar sesion</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(url('/register')); ?>">Registrarse</a></li>
            <li><a href="" data-toggle="modal" data-target="#exampleModal">Iniciar sesion</a></li>
          <?php endif; ?>
          
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>

<!-- Contador -->
<!--	
<div style="margin: 0px 0px 0px;" align="center"><noscript><div style="width: 140px; border: 1px solid rgb(204, 204, 204); text-align: center; color: rgb(158, 118, 34); font-weight: bold; font-size: 12px; background-color: rgb(0, 0, 0);" align="center"><a href="http://mycountdown.org/tag.php?tag=world cup" style="text-decoration: none; font-size: inherit; color: rgb(158, 118, 34);">World cup Countdown</a></div></noscript><script type="text/javascript" src="http://mycountdown.org/countdown.php?cp2_Hex=000000&cp1_Hex=9e7622&img=1&hbg=0&fwdt=300&lab=1&ocd=Tournament&text1=Rusia 2018&text2=&group=Event&countdown=Tournament&widget_number=3011&event_time=1528934400&timezone=America/Caracas"></script>
</div>
-->


  </header><!-- #header -->

 
		  

  <?php echo $__env->yieldContent('content'); ?>


  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div id="logo" class="col-lg-3 col-md-6 footer-info">
            <a href="#intro"><img src="<?php echo e(asset('img/logo.png')); ?>" alt="" title="XportGold" style="padding-bottom: 19px;" /></a>
            <p></p>            
          </div>
          <!--
          <div class="col-lg-3 col-md-6 footer-info">
            <h3>BizPage</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>
          -->
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo e(url('/')); ?>">Home</a></li> 
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">Intercambiar Cromos</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo e(url('/#notice')); ?>">Noticias</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo e(url('/#portfolio')); ?>">Russia 2018</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="<?php echo e(url('/#contact')); ?>">Contactanos</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              
              <strong>Email:</strong> xportgoldmail@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="https://twitter.com/xportg"  target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="https://www.facebook.com/XportGold-203618576920498/"  target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#"  target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Atentos a nuestro lanzamiento de la forma mas divertida y millonaria de vivir el mundial...</p>
            
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Xport Gold</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        
        Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
		-->
      </div>
    </div>

    
     
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo e(asset('lib/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/jquery/jquery-migrate.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/easing/easing.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/superfish/hoverIntent.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/superfish/superfish.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/wow/wow.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/waypoints/waypoints.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/counterup/counterup.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/owlcarousel/owl.carousel.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/isotope/isotope.pkgd.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/lightbox/js/lightbox.min.js')); ?>"></script>
  <script src="<?php echo e(asset('lib/touchSwipe/jquery.touchSwipe.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/jquery-confirm.js')); ?>"></script>

  <script src="<?php echo e(asset('js/bootstrap-datepicker.min.js')); ?>"></script>
  <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap-datepicker.min.css')); ?>">
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo e(asset('contactform/contactform.js')); ?>"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo e(asset('js/main.js')); ?>"></script>

  <!-- Script para registrar/login usuario -->
  <script src="<?php echo e(asset('js/scriptLogin.js')); ?>"></script>

  <!-- Script para datepicker -->
  <script src="js/datepicker.js"></script>

  <!-- Script para barajitas -->
  <script src="js/sticker.js"></script>
  <script src="<?php echo e(asset('js/datepicker.js')); ?>"></script>
  
  
  
</body>
</html>
  