@extends('layoutMenu')

@section('content')




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

    <script type="text/javascript" src="{{asset('lib/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" /> -->

	<!-- <script type="text/javascript" src="{{asset('lib/dash/lineandbars.js')}} "></script>

	<script type="text/javascript" src="{{asset('lib/dash/dash-charts.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/dash/gauge.js')}}"></script> -->

	<!-- NOTY JAVASCRIPT -->
	<!-- <script type="text/javascript" src="{{asset('lib/dash/noty/jquery.noty.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/dash/noty/layouts/top.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/dash/noty/layouts/topLeft.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/dash/noty/layouts/topRight.js')}}"></script>
	<script type="text/javascript" src="{{asset('lib/dash/noty/layouts/topCenter.js')}}"></script> -->

	<!-- You can add more layouts if you want -->
	<!-- <script type="text/javascript" src="{{asset('lib/dash/noty/themes/default.js')}}"></script> -->
    <!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
	<script type="text/javascript" src="http://code.highcharts.com/highcharts.js"></script>
	<!-- <script src="{{asset('lib/dash/jquery.flexslider.js')}}" type="text/javascript"></script> -->

    <!-- <script type="text/javascript" src="{{asset('lib/dash/admin.js')}}"></script> -->

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
    console.log("cargo!!");

  </script>

  </head>
  <body>

  
    <div class="container" >
    
	  <!-- FIRST ROW OF BLOCKS -->
      <div class="row" style="display: none">

      <!-- USER PROFILE BLOCK -->
        <div class="col-sm-3 col-lg-3">
      		<div class="dash-unit">
	      		<dtitle>Usuario</dtitle>
	      		<hr>
				<div class="thumbnail">
					<img src="img/LoginIcon.png" alt="Marcel Newman" class="img-circle">
				</div><!-- /thumbnail -->
        <br>

        <div class="alert alert-primary" role="alert">
          {{ auth()->user()->name }}
        </div>
				
				<br>
					<div class="info-user">
						<a href="{{ route('userEdit') }}"><span aria-hidden="true" class="li_user fs1"></span>
             <!-- 
						<a href="{{ route('userEdit') }}"><span aria-hidden="true" class="li_settings fs1"></span></a>
            -->

						<!--<span aria-hidden="true" class="li_mail fs1"></span>-->
						<a href="{{ route('resetPassw') }}"><span aria-hidden="true" class="li_key fs1"></span></a>
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
                            <div class="alert alert-primary" role="alert">
                              Cromos
                            </div>
        									</li>
        									<li><a class="tt" href="{{ url('sticker') }}">  -- Panel de Cromos --<span class="tooltip"><span class="triangle-obtuse">Puedes consultar tus cromos adquiridas, repetidas y de interes desde tu panel</span></span></a></li>
	                        <li><a class="tt" href="{{ url('conv') }}"> Mensajerias de Intercambio <span class="tooltip"><span class="triangle-obtuse">Consulta tus intercambios de cromos y sus respectivas conversaciones </span></span></a></li>

                          <!--<li><a class="tt" href="files/Instructivo Intercambio Cromos XportGold.pdf" target="_blank">Descargar Instructivo Cromos <span class="tooltip"><span class="triangle-obtuse">Descarga aquí el archivo PDF que te explicara como intercambiar fácilmente tus cromos a través de nuestro sitio</span></span></a></li>
                          
        									<li class="footer_row"><a href="{{ url('sticker') }}" class="hosting-button">cromos</a></li>-->

                          <li><a class="tt" href="{{ asset('files/Instructivo Intercambio Cromos XportGold.pdf') }}  " target="_blank">Descargar Instructivo Cromos <span class="tooltip"><span class="triangle-obtuse">Descarga aquí el archivo PDF que te explicara como intercambiar fácilmente tus cromos a través de nuestro sitio</span></span></a></li>
                          <li><a class="tt" href="#" target="_blank"> - <span class="tooltip"></a></li>
                          <li><a class="tt" href="#" target="_blank"> - <span class="tooltip"></a></li>  
        									
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

                         <li>
                              <a class="tt" href="{{ asset('/files/Instructivo Quiniela Fase Final Rusia 2018_XportGold.pdf') }} " target="_blank">Instructivo de Juego <span class="tooltip"><span class="triangle-obtuse">Descarga aquí el archivo PDF que te explicará como jugar fácilmente tu quiniela a través de nuestro sitio</span></span></a>
                            
                          </li>
                          <li>
                              <a class="tt" href="{{ asset('/files/Reglamento Quiniela Fase Final Rusia 2018 XportGold.pdf') }} " target="_blank">Reglamento de Juego<span class="tooltip"><span class="triangle-obtuse">Descarga aquí el archivo PDF que te explicará como jugar fácilmente tu quiniela a través de nuestro sitio</span></span></a>
                          </li>
                          @if(false)
                          <li>
                            <a class="tt" href="{{ route('quiniela') }}">Nuevo Pronóstico</a>
                          </li>
                          @endif
                          <li>
                            <a class="tt" href="{{ route('searchPronostics') }}">Mis Pronósticos<span class="tooltip"><span class="triangle-obtuse">Consulta, Modifica y registra el pago de tus pronosticos...</span></span></a>
                          </li>
                          <li>
                            <a class="tt" href="{{ route('addPronosticsNewPhase') }}">Registro Pronósticos<span class="tooltip"><span class="triangle-obtuse">Agrega pronostico para la nueva fase</span></span></a>
                          </li>
                          <!-- <li>
                            <a class="tt" href="{{ url('/puntuacionesQui/1') }}"> Tabla de Posiciones Quiniela <span class="tooltip"><span class="triangle-obtuse">listado de pronosticos y puntuaciones Quiniela Rusia 2018</span></span></a>
                          </li>-->
                          @if(Auth::user()->rollId == 1)      
                          <li>
                            <a class="tt" href="{{ route('createPrivateQuiniela') }}">Crear quiniela<span class="tooltip"><span class="triangle-obtuse">Registrar nueva quiniela</span></span></a>
                          </li>    
                          <li>
                            <a class="tt" href="{{ route('games.create') }}">Crear Juegos<span class="tooltip"><span class="triangle-obtuse">Registrar nuevo juego</span></span></a>
                          </li>
                          @endif
                          <li>
                            <a class="tt" href="{{ url('/puntuacionesQui/1') }}"> Tabla de Posiciones Quiniela <span class="tooltip"><span class="triangle-obtuse">listado de pronosticos y puntuaciones Quiniela Rusia 2018</span></span></a>
                          </li>	                               									
        								</ul>
        							</div><!--/ column-->
        						</div><!--/ Table Style-->
        					</div><!--/ Hosting Table-->
              		</div><!-- /span3 -->


                      <!-- Saldo del Usuario -->
                  <div class="col-sm-3 col-lg-3">
                    <div class="dash-unit">
                      <dtitle>GOLDPOT: FASE FINAL RUSIA 2018 "GOLD"</dtitle>
                      <hr>
                      <div class="cont">
                            <br>
                       

                            <p><bold>220</bold> | <ok> GOLD</ok></p>
                            <br>
                            </div>
                            <div class="thumbnail">
                            <img src="img/goldpot.png" class="img-circle">


                          </div><!-- /thumbnail  -->
                    </div>
                  </div>            	
    </div> <!-- /container -->
<br>
<br>

    <div id="divLoading" class="col-sm-12" style="display:display; margin-top: 50px">
      <div class="text-center">
          <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
          <span class="sr-only">Loading...</span>
      </div>
    </div>

    <div id="divDashboard" style="visibility: hidden" class="container wow fadeInUp" data-wow-delay="0.1s">
    
    <h1>{{ ucfirst(auth()->user()->name) }} {{ ucfirst(auth()->user()->lastName) }}</h1>
    <div class="row text-center">

    
      <div class="col-lg-3 col-sm-6">
        <a href="{{ route('userEdit') }}">
          <img src="{{ asset('img/icons_new_panel/user_information.png') }}" alt="panel de cromos" srcset="">
          <p>
            Información
          </p>
        </a>
      </div>

      <div class="col-lg-3 col-sm-6">
        <a href="{{ route('resetPassw') }}">
          <img src="{{ asset('img/icons_new_panel/user_[assword.png') }}" alt="panel de cromos" srcset="">
          <p>
            Cambiar Clave
          </p>
        </a>
      </div>
    </div>  



    <div class="row text-center">
          <!-- <div class="alert alert-dark  col-sm-12" role="alert">
            Cromos
          </div> -->
          
        <div class="col-lg-12 titleDashboard">
        <button type="button" class="btn btn-outline-info btn-lg btn-block" disabled>Cromos</button>
          <!-- <h4>Cromos</h4> -->
          <hr>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="{{ url('sticker') }}">
            <img src="{{ asset('img/icons_new_panel/cromo_panel.png') }}" alt="panel de cromos" srcset="">
            <p>
              Panel de cromos
            </p>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="{{ url('conv') }}">
            <img src="{{ asset('img/icons_new_panel/cromos_messages.png') }}" alt="panel de cromos" srcset="">
            <p>
              Mensajeria de Intercambio
            </p>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
          
          <a href="{{ asset('files/Instructivo Intercambio Cromos XportGold.pdf') }}" target="_blank">
            <img src="{{ asset('img/icons_new_panel/quiniela_descargar_instructivo.png') }}" alt="panel de cromos" srcset="">
            <p>
              Descargar Instructivo Cromos
            </p>
          </a>
        </div>
        <div class="col-lg-3 col-sm-6">
        </div>
      </div>

      <br>

<!-- Apagado para subir a produccion solo cromos-->
<!--

      <div class="row text-center">
          <!-- <div class="alert alert-dark   col-sm-12" role="alert">
          Quinielas
          </div> -->

<!--
        <div class="col-lg-12 titleDashboard">
          <button type="button" class="btn btn-outline-info btn-lg btn-block" disabled>Quinielas</button>
          <!-- <h4>Quinielas</h4> -->

<!--
          <hr>
        </div>
        <div class="col-lg-3 col-sm-6">
          <a href="{{ asset('/files/Instructivo Quiniela Fase Final Rusia 2018_XportGold.pdf') }}" target="_blank">
            <img src="{{ asset('img/icons_new_panel/download_manual.png') }}" alt="Instructivo de Juego" srcset="">
            <p>
              Instructivo de Juego
            </p>
          </a>
        </div>
        
        <div class="col-lg-3 col-sm-6">
          <a href="{{ asset('/files/Reglamento Quiniela Fase Final Rusia 2018 XportGold.pdf') }}" target="_blank">
            <img src="{{ asset('img/icons_new_panel/quiniela_rules.png') }}" alt="Reglamento de Juego" srcset="">
            <p>
              Reglamento de Juego
            </p>
          </a>
        </div>
          
        <div class="col-lg-3 col-sm-6">
          <a href="{{ route('quiniela') }}">
            <img src="{{ asset('img/icons_new_panel/quiniela_add_pronostics.png') }}" alt="Nuevo Pronósticos" srcset="">
            <p>
              Nuevo Pronósticos
            </p>
          </a>
        </div>
          
        <div class="col-lg-3 col-sm-6">
          <a href="{{ route('searchPronostics') }}">
            <img src="{{ asset('img/icons_new_panel/quiniea_my_pronostics.png') }}" alt="Mis Pornósticos" srcset="">
            <p>
              Mis Pronósticos
            </p>
          </a>
        </div>

        <div class="col-lg-3 col-sm-6">
          <a href="{{ route('addPronosticsNewPhase') }}">
            <img src="{{ asset('img/icons_new_panel/quiniela_add.png') }}" alt="Registro de Pronósticos" srcset="">
            <p>
              Registro de Pronósticos
            </p>
          </a>
        </div>

        <div class="col-lg-3 col-sm-6">
          <a href="{{ route('createPrivateQuiniela') }}">
            <img src="{{ asset('img/icons_new_panel/quiniela_pronostics.png') }}" alt="Crear Quiniela" srcset="">
            <p>
              Crear Quiniela
            </p>
          </a>
        </div>
        
        @if(Auth::user()->rollId == 1) 
          
          <div class="col-lg-3 col-sm-6">
            <a href="{{ route('games.create') }}">
              <img src="{{ asset('img/icons_new_panel/quiniela_add_games.png') }}" alt="Crear Juego" srcset="">
              <p>
                Crear Juego
              </p>
            </a>
          </div>
        @endif
        <div class="col-lg-3 col-sm-6">
          <a href="{{ url('/puntuacionesQui/1') }}">
            <img src="{{ asset('img/icons_new_panel/quiniela_position_table.png') }}" alt="Crear Juego" srcset="">
            <p>
              Tabla de Posiciones Quiniela
            </p>
          </a>
        </div>

      </div>
-->


<hr>
<br>



  </body>
</html>

@endsection
