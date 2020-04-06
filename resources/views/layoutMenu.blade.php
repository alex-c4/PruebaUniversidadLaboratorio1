<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Xport Gold</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.ico') }}" rel="icon">
  <!-- 
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon"> 
  -->

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet"> -->
  <link href="{{ asset('css/googleFontsOpenSans.css') }}" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    
  <!-- Libraries CSS Files -->   
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!--<link href="{{ asset('css/fontawesome.css')}}" rel="stylesheet"> Sustitido por la de arriba--> 
  <link href="{{ asset('lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{ asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{ asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>

  <link href="{{ asset('css/jquery-confirm.css')}}" rel="stylesheet">
  <link href="{{ asset('css/jquery-confirm.less')}}" > 
  

  <!-- Main Stylesheet File -->
  
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
 
  
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
        <a href="#intro"><img src="{{ url('img/logoNew230x80.png')}}" alt="" title="" /></a>
     
	  
	     </div>

    <!-- Ubicacions del gold pot
		      
            &emsp;&emsp;&emsp;
            <img src="{{ url('img/goldpot_menu_final2.png')}}" class="img-circle">

            
            <bold>1.350</bold> | <ok> GOLD</ok>
        -->
                        
  
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          
		  
		  
		      <li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
           <!--
           <li><a href="{{ url('/#result') }}">Posiciones Quiniela</a></li>
          -->
          @if(Auth::check())
            <li><a href="{{ url('/dashboard') }}">XPORTGAME</a></li>
          @else
           <li><a href="{{ url('/#about') }}">XPORTGAME</a></li>
          @endif
          <li><a href="{{ url('/#news') }}">XPORT Noticias</a></li>
          <li><a href="{{ url('/#blogs') }}">GOLD BLOG</a></li>
         
          <!--<li><a href="{{ url('/#portfolio') }}">BRASIL 2019</a></li>-->
          <li><a href="{{ url('/#contact') }}">Contactanos</a></li>
          <br>
          @if(Auth::check())   
            @if(Auth::user()->rollId == 1)         
              <li><a href="{{ url('/result/2') }}">Result</a></li>
              <li><a href="{{ url('/listarBetsPay') }}">Validar Pagos</a></li>
            @endif
            <li class="menu-has-children"><a href="{{ url('/dashboard') }}">Dashboard</a>
              <!-- Apagado para subir a produccion solo cromos
              <ul>
              <li><a href="{{ url('sticker') }}">Panel de cromos</a></li>
              <li><a href="{{ url('conv')  }}">Mensajeria de Intercambio</a></li>
                <li><a href="{{ route('searchPronostics') }}">Mis Pronósticos</a></li>
                <li><a href="{{ route('addPronosticsNewPhase') }}">Agregar resultado nueva fase</a></li>
                <li><a href="{{ url('/puntuacionesQui/1') }}">Tabla de Posiciones Quiniela</a></li>
                @if(auth()->user() != null && auth()->user()->hasRoles('Administrator'))
                  <li class="menu-has-children"><a href="{{ route('news.index') }}">Noticias</a>
                    <ul><a href="{{ route('news.create') }}">Agregar noticia</a></ul>
                  </li>
                  <li class="menu-has-children"><a href="{{ route('blogs.index') }}">Blogs</a>
                    <ul><a href="{{ route('blogs.create') }}">Agregar Blog</a></ul>
                  </li>
                  <li>
                    <a href="{{ route('games.create') }}">Crear Juegos</a>
                  </li>
                @endif
              </ul>
              -->
            </li>
            <li><a href="{{ url('/logout') }}">Cerrar sesion</a></li>
          @else
            <!--
            <li><a href="" data-toggle="modal" data-target="#registerModal">Registrarse</a></li>
            <li><a href="{{ url('/register') }}">Registrarse</a></li>
          -->
          
            <!-- <li>
              <a href="" data-toggle="modal" data-target="#exampleModal">
              <button type="button" id="btnLogin" class="btn btn-outline-light"><i class="fa fa-user" aria-hidden="true">&nbsp;login&nbsp;</i></button>
              </a>
            </li> -->
            <li><a href="" data-toggle="modal" data-target="#exampleModal">login</a></li>
            <li><a href="{{ url('/register') }}">Registrarse</a></li>
           
          @endif
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>

<!-- Contador -->
<!--	
<div style="margin: 0px 0px 0px;" align="center"><noscript><div style="width: 140px; border: 1px solid rgb(204, 204, 204); text-align: center; color: rgb(158, 118, 34); font-weight: bold; font-size: 12px; background-color: rgb(0, 0, 0);" align="center"><a href="http://mycountdown.org/tag.php?tag=world cup" style="text-decoration: none; font-size: inherit; color: rgb(158, 118, 34);">World cup Countdown</a></div></noscript><script type="text/javascript" src="http://mycountdown.org/countdown.php?cp2_Hex=000000&cp1_Hex=9e7622&img=1&hbg=0&fwdt=300&lab=1&ocd=Tournament&text1=Rusia 2018&text2=&group=Event&countdown=Tournament&widget_number=3011&event_time=1528934400&timezone=America/Caracas"></script>
</div>
-->


  </header><!-- #header -->

 
		  

  @yield('content')


  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div id="logo" class="col-lg-3 col-md-6 footer-info">
            <a href="#intro"><img src="{{ asset('img/logo3_03.png')}}" alt="" title="XportGold" style="padding-bottom: 19px;" /></a>
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
              <li><i class="ion-ios-arrow-right"></i> <a href="{{ url('/') }}">Home</a></li> 
              <!--
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">Intercambiar Cromos</a></li>
              -->
               <li><i class="ion-ios-arrow-right"></i> <a href="#about">XportGame</a></li>

              <li><i class="ion-ios-arrow-right"></i> <a href="#news">Xport Noticias</a></li>
             
              <li><i class="ion-ios-arrow-right"></i> <a href="#blogs">Gold Blog</a></li>

              <li><i class="ion-ios-arrow-right"></i> <a href="#contact">Contactanos</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              
              <strong>Email:</strong> xportgoldmail@xportgold.com<br>
            </p>

            <div class="social-links">
              <!--
              <a href="https://twitter.com/xportg"  target="_blank" class="twitter"><i class="fa fa-twitter"></i></a>
              -->
              <a href="https://www.facebook.com/XportGold-100830458156185/"  target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="https://www.instagram.com/xport.gold/"  target="_blank" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="https://wa.me/584129327820" class="google-plus"><i class="fa fa-whatsapp"></i></a>
                <!--
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                -->
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Quieres enterarte primero de todas nuestras noticias y contenidos...</p>
            <form action="{{ route('contact.store') }}" method="post" id="form_user_email" name="form_user_email">
              {{ csrf_field() }}
              <input type="email" id="email_only" name="email_only"><input type="submit" value="Subscribe">
            </form>
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
  <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{asset('lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <script src="{{asset('js/jquery-confirm.js')}}"></script>

  <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
  <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('js/main.js')}}"></script>

  <!-- Script para registrar/login usuario -->
  <script src="{{asset('js/scriptLogin.js')}}"></script>

  <!-- Script para datepicker -->
  <!-- <script src="js/datepicker.js"></script> -->

  <!-- Script para barajitas -->
  <script src="{{ asset('js/sticker.js') }} "></script>
  <script src="{{asset('js/datepicker.js')}}"></script>

  <!-- script para registro de usuario -->
  <script src="{{ asset('js/register.js') }}"></script>

  <!-- script para registro de quiniela -->
  <script src="{{ asset('js/quiniela.js') }}"></script>
  
  <!-- Script para puntuaciones quinielas -->
  <script src="{{asset('js/puntuaciones.js')}}"></script>
  
  
  
</body>
</html>
  