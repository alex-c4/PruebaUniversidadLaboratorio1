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
  <link href="<?php echo e(asset('lib/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
  


  <!-- Libraries CSS Files -->
  <link href="<?php echo e(asset('lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('lib/lightbox/css/lightbox.min.css')); ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
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

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo e(url('/')); ?>">Home</a></li>
          <li><a href="#about">Como Jugar Qunielas</a></li>
          <li><a href="<?php echo e(url('/#notice')); ?>">Noticias</a></li>
          <li><a href="<?php echo e(url('/#portfolio')); ?>">Mundial Rusia 2018</a></li>
          <li><a href="#services">Mundial Rusia 2018</a></li>
          
          <?php if(Auth::check()): ?>
            <li><a href="<?php echo e(url('/register')); ?>">Home</a></li>
          <?php else: ?>
            <li><a href="<?php echo e(url('/register')); ?>">Registrar</a></li>
          <?php endif; ?>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <?php echo $__env->yieldContent('content'); ?>


  <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactanos</h3>
          <p></p>
        </div>

        <div class="row contact-info">
<!--
          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>
-->
        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="<?php echo e(URL::asset('/registerContact')); ?>" method="post" role="form">
		  
            <div class="form-row">
			<?php echo e(csrf_field()); ?>

              <div class="form-group col-md-6">
                <input type="text" name="nameContact" class="form-control" id="nameContact" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="emailContact" id="emailContact" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
           <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

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
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>            
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
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              
              <strong>Email:</strong> xportgold@gmail.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            
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
  