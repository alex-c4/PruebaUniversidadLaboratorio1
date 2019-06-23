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
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
 

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  

</head>

<body>

  @extends('layoutMenu')

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('img/intro-carousel/1_ca.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>COPA AMERICA BRASIL 2019</h2>
                <p>Todo lo que Necesitas Saber de la Copa America Brasil 2019....</p>
                <!-- <a href="#featured-services" class="btn-get-started scrollto">Get Started</a> -->
                <a href="#notice" class="btn-get-started scrollto">Ver</a>
                <!-- <button type="button" class="btn-get-started scrollto" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Get Started</button> -->

              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url('img/intro-carousel/3_xp.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>INTERCAMBIA TUS CROMOS</h2>
                <p>Llena tu álbum del mundial de forma Rápida, organizada y Divertida...</p>
                <!-- <a href="#featured-services" class="btn-get-started scrollto">Get Started</a> -->
                <a href="" data-toggle="modal" data-target="#exampleModal" class="btn-get-started scrollto">Empezar</a>
              </div>
            </div>
          </div>  
          
          <div class="carousel-item" style="background-image: url('img/intro-carousel/2_xp.jpg');">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>JUEGA XPORTGAME</h2>
                <p>Demuestra lo que sabes y saborea el éxito....</p>
                <!-- <a href="#featured-services" class="btn-get-started scrollto">Get Started</a> -->
                <a href="" data-toggle="modal" data-target="#exampleModal" class="btn-get-started scrollto">Jugar</a>
              </div>
            </div>
          </div>
             
        

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        
      </div>
      
    </div>

    
  </section><!-- #intro -->

  

  <main id="main">

    @extends('layoutLogin')
    @extends('layoutRegister')
    

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
		 
            <i class="ion-ios-football"></i>
            <h4 class="title"><a href="">COPA AMERICA 2019</a></h4>
            <p class="description">En nuestro sitio encontraras el mejor contenido de la Copa America Brasil 2019... </p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">CROMOS</a></h4>
            <p class="description">Por fin un sitio web donde podras administrar tus cromos y ademas la posibilidad de intercambiar las repetidas con otros usuarios... </p>
          </div>

           <div class="col-lg-4 box box-bg">
            <i class="ion-compose"></i>
            <h4 class="title"><a href="">QUINIELA</a></h4>
            <p class="description">Te ofrecemos la forma mas divertida y millonaria de vivir el mundial Rusia 2018, jugando nuestra Quiniela XportGold...  </p>
          </div>

        </div>
      </div>
    </section>
    <!-- #featured-services -->

<!--==========================
      Facts Section
    ============================-->
    <!--
    <section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Resultados</h3>
          <p>Resultados de los últimos encuentros del mundial Rusia 2018

            <br><br>
            <a href="whatsapp://send?text=Resultados Mundial Rusia 2018 - {{ url('/#facts') }}" data-action="share/whatsapp/share" target="_blank" class="btn btn-success btn-sm" style=""><i class="fa fa-whatsapp fa-sm">  Compartir</i></a>


          </p>
        </header>

        
        <div class="row counters">
          <div class="container">
            <div class="row align-items-center">
            @foreach($myResults as $result)
                <div class="col-12 text-center font-italic text-info">
                    {{ $result->estadium }} {{ $result->date }} (<b>Grupo {{ $result->grupo }}</b>)
                </div>
                <div class="col-5 text-right">
                  {{ $result->nombre_club_1 }}<img src="{{ asset('img/banderas/') }}/{{ $result->img_club_1 }}" alt="">
                </div>
                <div class="col-1">
                  <span data-toggle="counter-up" class="text-center">{{ $result->resultado_club_1 }}</span>
                  
                  <hr>
                </div>
                <div class="col-1">
                  <span data-toggle="counter-up" class="text-center">{{ $result->resultado_club_2 }}</span>
                  <hr/>
                </div>
                <div class="col-5">
                  <img src="{{ asset('img/banderas/') }}/{{ $result->img_club_2 }}" alt="">{{ $result->nombre_club_2 }}

                </div>
                

            @endforeach
            </div>

          </div>

  			</div>
        <br>
      </div>
    </section>
    -->
    <!-- #facts -->

    <!--==========================
      Result Us Section
    ============================-->

    <!--
    <section id="result">
      <div class="container">

        <header class="section-header">
          <h3>Tabla de posiciones Quinielas...</h3>
        </header>
        <div class="row about-cols">
          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">               
                  
            <div class="about-col"> 
                 <div id="oscuro" > 

                      <div class="row oscuro">
                        
                        <br>
                          <img src="img/goldpot_tabla.png" class="img-circle">
                          
                          <h4 class="text-center">{{$quiniela->nombre." "." **GOLD**"}} </h4>
                          
                          <ul>
                            @foreach($puntuaciones as $puntuacion)                                       
                              <li>
                                
                                <a href="{{ route('pronosticGet',['betId'=>$puntuacion->bet_id])}}">{{ $puntuacion->name." ".$puntuacion->lastName ."  - Pro ID: ". $puntuacion->bet_id }}</a>
                                - Total: <strong class="textGold">{{ $puntuacion->puntos}}</strong> Ptos.                        
                              
                              </li>    

                            @endforeach
                          </ul>
                      </div>                  
                  </div>                
             </div>
          </div>

          

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
             
              <h2 class="title">RESULTADOS:</h2>
              

                <div class="row align-items-center" style="font-size: 13px;">
                @foreach($myResults as $result)
                    <div class="col-12 text-center font-italic text-info">
                      <hr style="color: #ffffff;" />
                        {{ $result->date }} 

                    </div>

                    <div class="col-4 text-right">
                        {{ $result->nombre_club_1 }}<img src="{{ asset('img/banderas/') }}/{{ $result->img_club_1 }}" style="width: 25px;" alt="">
                    </div>
                    <div class="col-2">
                      <span class="text-center" >{{ $result->resultado_club_1 }} @if($result->penalty == '1') (<b>{{ $result->resultado_club_1_penalty }}</b>) @endif</span>
                    </div>
                    <div class="col-2">
                      <span class="text-center" >{{ $result->resultado_club_2 }} @if($result->penalty == '1') (<b>{{ $result->resultado_club_2_penalty }}</b>) @endif</span>
                    </div>
                    <div class="col-4">
                        <img src="{{ asset('img/banderas/') }}/{{ $result->img_club_2 }}" style="width: 25px;"  alt="">{{ $result->nombre_club_2 }}

                    </div>
                

                @endforeach
                -->

                <!-- Boton whatsapp
                <p>
                  <a href="whatsapp://send?text=Resultados Mundial Rusia 2018 - {{ url('/#result') }}" data-action="share/whatsapp/share" target="_blank" class="btn btn-success btn-sm" style=""><i class="fa fa-whatsapp fa-sm">  Compartir</i></a>
                </p>    
                -->

                  <!--
                </div>


            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">              
                 <div id="oscuro" >           
                      <div class="row oscuro">
                          
                          <h4 class="text-center">{{$quiniela->nombre." "." **FREE**"}} </h4>
                          <ul>
                            @foreach($puntuaciones_free as $puntuacion)                                       
                              <li>
                                
                                <a href="{{ route('pronosticGet',['betId'=>$puntuacion->bet_id])}}">{{ $puntuacion->name." ".$puntuacion->lastName ."  - Pro ID: ". $puntuacion->bet_id }}</a>
                                - Total: <strong class="textGold">{{ $puntuacion->puntos}}</strong> Ptos.                        
                              
                              </li>    

                            @endforeach
                          </ul>
                      </div>                  
                  </div>                
             </div>
          </div>

        

      </div>
    </section>
  
    -->

    <!-- #result -->

    <!--==========================
      About Us Section modificado
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Como Jugar XportGame Brasil 2019...</h3>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col">
              <div class="img">
                <img src="img/about_registro.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-edit"></i></div>
              </div>
              <h2 class="title"><a href="{{ url('/register') }}">PASO 1:</a></h2>
              <p>
               Registrate y disfruta la experiencia de ser un usuario exclusivo de XportGold...      
         
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col">
              <div class="img">
                <img src="img/about_pronosticos.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="" data-toggle="modal" data-target="#exampleModal">PASO 2</a></h2>
              <p>
            Ingresa como usuario XportGold, registra tu pronóstico de resultados de los partidos...
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col">
              <div class="img">
                <img src="img/about_goldpot.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-trophy"></i></div>
              </div>
              <h2 class="title"><a href="#">PASO 3</a></h2>
              <p>
               ...Ganale el Fabuloso “GOLDPOT” acumulado a los mejores pronosticadores de XportGame...
              </p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- #about -->

    <!--==========================
      Services Section
    ============================-->
     <!--<section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Services</h3>
          <p>Laudem latine persequeris id sed, ex fabulas delectus quo. No vel partiendo abhorreant vituperatoribus, ad pro quaestio laboramus. Ei ubique vivendum pro. At ius nisl accusam lorenta zanos paradigno tridexa panatarel.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Lorem Ipsum</a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
            <h4 class="title"><a href="">Dolor Sitema</a></h4>
            <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="">Magni Dolores</a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="">Nemo Enim</a></h4>
            <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
            <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
          </div>

        </div>

      </div>
    </section>-->
    <!-- #services -->

    <!--==========================
      Call To Action Section
    ============================-->
     <!--<section id="call-to-action" class="wow fadeIn">
      <div class="container text-center">
        <h3>Call To Action</h3>
        <p> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <a class="cta-btn" href="#">Call To Action</a>
      </div>
    </section>-->
    <!-- #call-to-action -->

    <!--==========================
      Skills Section
    ============================-->
     <!--<section id="skills">
      <div class="container">

        <header class="section-header">
          <h3>Our Skills</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip</p>
        </header>

        <div class="skills-content">

          <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">HTML <i class="val">100%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">CSS <i class="val">90%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">JavaScript <i class="val">75%</i></span>
            </div>
          </div>

          <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100">
              <span class="skill">Photoshop <i class="val">55%</i></span>
            </div>
          </div>

        </div>

      </div>
    </section>-->

    <!--==========================
      Facts Section
    ============================-->
     <!--<section id="facts"  class="wow fadeIn">
      <div class="container">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </header>

        <div class="row counters">

  				<div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">274</span>
            <p>Clients</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">421</span>
            <p>Projects</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">1,364</span>
            <p>Hours Of Support</p>
  				</div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">18</span>
            <p>Hard Workers</p>
  				</div>

  			</div>

        <div class="facts-img">
          <img src="img/facts-img.png" alt="" class="img-fluid">
        </div>

      </div>
    </section>-->
    <!-- #facts -->





 
    <!--==========================
      Notice section
    ============================-->
	
	

    <section id="news">
      <div class="container">

        <header class="section-header">
          <h3>NOTICIAS</h3>
          <p> Enterate de lo mas destacado de la Copa America Brasil 2019 en nuestra sección de noticias </p>
        </header>

  
        <div class="row news-cols">
         
         @foreach($misnoticias as $noticia)
         
          <div class="col-md-4 wow fadeInUp">
            <div class="news-col">
              <div class="img">
                <img src="img/notice/{{$noticia['name_img']}}" alt="" class="img-fluid">
                
                
              </div>
              <h2 class="title"><a href="{{ url('/news/'.$noticia['id']) }}">{{ $noticia['titulo']}}
              </a></h2>

              <p style="text-align: justify;">
                </br>{{ substr($noticia['fecha_publicacion'],0,10)}}
                </br></br>{{ substr($noticia['cuerpo'],0,200).'...'}}
              </p>
              <a href="{{ route('news.show', $noticia->id) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
              @if(auth()->user() != null && auth()->user()->hasRoles('Administrator'))
                <a href="{{ route('news.edit', $noticia->id) }}" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
              @endif
              
              <a href="whatsapp://send?text={{ $noticia['titulo']}} - {{ url('/news/'.$noticia['id']) }}" img src="img/notice/{{$noticia['name_img']}}" data-action="share/whatsapp/share" target="_blank" class="btn btn-success btn-sm" style="" ><i class="fa fa-whatsapp fa-sm">  Compartir</i></a>
              <!--
              <a href="whatsapp://send?text=https://scriptbc.com" data-action="share/whatsapp/share">
                <img src="RUTA-IMAGEN" width="XX" height="YY">
              </a>
              -->
              <!--              
              <a href="whatsapp://send?text=Como crear un boton de compartir en whatsapp - https://jonathanmelgoza.com/blog/boton-de-compartir-en-whatsapp" data-action="share/whatsapp/share" target="_blank"><img src="https://jonathanmelgoza.com/blog/resources/whatssapp-sharing.png" style="display: inline;" data-lazy-loaded="true"><noscript><img src="https://jonathanmelgoza.com/blog/resources/whatssapp-sharing.png"/></noscript></a>
              -->
              
            </div>
          </div>
        
         @endforeach

        </div>

        <!--==========================
          Blog Section
        ============================-->
        <section id="blogs">
          <div class="container">

            <header class="section-header wow fadeInUp">
              <h3>GOLD BLOG</h3>
              <p>Disfruta del contenido mas destacado de la Copa America Brasil 2019 en nuestra sección de blogs.</p>
            </header>

            

            @foreach($blogs as $blog)
              <div class="row news-cols">

                <div class="col-lg-4 col-md-6">
                  <img src="{{ url('img/blog/thumbnails/') }}/{{$blog->thumbnails}}" alt="" srcset="" class="img_blog img-thumbnail">
                </div>
                <div class="col-lg-8 col-md-6" style="margin-top: 5px">
                  <h4>
                    <a href="{{ url('/blogs/'.$blog->id) }}">{{ $blog->title }}</a> 
                    @if(auth()->user() != null && auth()->user()->hasRoles('Administrator'))
                      <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                    @endif
                  </h4>
                  <p>
                    {{ $blog->summary }}<a href="{{ url('/blogs/'.$blog->id) }}">... leer más</a>
                  </p>
                  
                  <div  class="row">

                    <div class="col-lg-2 col-sm-3 col-3">
                      <img src="{{ url('img/avatars') }}/{{ $blog->avatarName }}" alt="avatar" class="img_avatar">
                    </div>

                    <div class="col-lg-10 col-sm-9 col-9">
                      <h5>{{ mb_convert_case($blog->name, MB_CASE_TITLE, "UTF-8") }} {{ mb_convert_case($blog->lastName, MB_CASE_TITLE, "UTF-8") }}</h5>
                      <h6>{{ substr($blog->created_at,0,10)}}</h6>
                    </div> 

                  </div>

                </div>
              </div>
              <hr>
            @endforeach

        </section>
        <!-- #Blog -->

      </div>
    </section>
    <!-- #notice -->


    

    <!--==========================
      PortfBLogolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">COPA AMERICA 2019</h3>
        </header>

        <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Estadios</li>
              <li data-filter=".filter-card">Selecciones</li>
              <li data-filter=".filter-web">Imagenes Oficiales</li>
            </ul>
          </div>
        </div>

		<!-- ESTADIO 1 Maracaná-->
        <div class="row portfolio-container">
		   <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/maracana2.jpg" class="img-fluid" alt="">
                <a href="img/galeria/maracana2.jpg" data-lightbox="portfolio" data-title="Maracaná" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>
              <div class="portfolio-info">
                <h4><a href="#">Maracaná</a></h4>
                <p>Portugués: Estádio do Maracanã</p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/oficial_logo_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/oficial_logo_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Logo Oficial" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Logo Oficial</a></h4>
                <p>Logo Oficial</p>
              </div>
            </div>
          </div>

  <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_venezuela.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_venezuela.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Seleccion de Venezuela</a></h4>
                <p>"La Vinotinto"</p>
              </div>
            </div>
          </div>


	<!-- ESTADIO 2 Luzhniki_Stadium-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/morumbi.jpg" class="img-fluid" alt="">
                <a href="img/galeria/morumbi.jpg" class="link-preview" data-lightbox="portfolio" data-title="Luzhniki_Stadium" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Morumbi</a></h4>
                <p>Estadio Cícero Pompeu de Toledo</p>
              </div>
            </div>
          </div>


 <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/oficial_mascota_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/oficial_mascota_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Mascota Oficial" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Mascota Oficial</a></h4>
                <p>"Zizito"</p>
              </div>
            </div>
          </div>


          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_brasil_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_brasil_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Seleccion de Brasil</a></h4>
                <p>"La Canarinha"</p>
              </div>
            </div>
          </div>

<!-- ESTADIO 3 Otkrytie Arena-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/corinthians_3.jpg" class="img-fluid" alt="">
                <a href="img/galeria/corinthians_3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Otkrytie Arena" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Arena Corinthians</a></h4>
                <p>Arena Corinthians</p>
              </div>
            </div>
          </div>




          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/oficial_balon_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/oficial_balon_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Balon Oficial</a></h4>
                <p>"Nike Rabisco"</p>
              </div>
            </div>
          </div>




          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_colombia_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_colombia_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Seleccion de Colombia" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Seleccion de Colombia</a></h4>
                <p>"Los Cafeteros"</p>
              </div>
            </div>
          </div>

<!-- ESTADIO 4 Krestovski-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/mineirao_2.jpg" class="img-fluid" alt="">
                <a href="img/galeria/mineirao_2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Krestovski" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Mineirao</a></h4>
                <p>Governador Magalhães Pinto</p>
              </div>
            </div>
          </div>
 
 <!-- ESTADIO 5 Kaliningrado-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/gremio.jpg" class="img-fluid" alt="">
                <a href="img/galeria/gremio.jpg" class="link-preview" data-lightbox="portfolio" data-title="Kaliningrado" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Arena do Grêmio</a></h4>
                <p>Arena do Grêmio</p>
              </div>
            </div>
          </div>
 
 
 <!-- ESTADIO 6 Nizhni Nóvgorod-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/fonte_nova.jpg" class="img-fluid" alt="">
                <a href="img/galeria/fonte_nova.jpg" class="link-preview" data-lightbox="portfolio" data-title="Nizhni Nóvgorod" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Arena Fonte Nova</a></h4>
                <p>Itaipava Arena Fonte Nova</p>
              </div>
            </div>
          </div>
 
 
<div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_uruguay_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_uruguay_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Seleccion de Uruguay" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Seleccion de Uruguay</a></h4>
                <p>"La Garra Charrúa"</p>
              </div>
            </div>
          </div>
 
 
 <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_peru_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_peru_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Selección de Peru" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Seleccion de Peru</a></h4>
                <p>Los Incas</p>
              </div>
            </div>
          </div>
		  
		  
		  <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_argentina_ca.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_argentina_ca.jpg" class="link-preview" data-lightbox="portfolio" data-title="Seleccion de Argentina" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Selección de Argentina</a></h4>
                <p>"La Albiceleste"</p>
              </div>
            </div>
          </div>
 
 
 <!-- ESTADIO 7 Volgogrado Arena-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_bolivia.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_bolivia.jpg" class="link-preview" data-lightbox="portfolio" data-title="Volgogrado Arena" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Selección de Bolivia</a></h4>
                <p>"Los Altiplánicos"</p>
              </div>
            </div>
          </div>
 
 
 <!-- ESTADIO 8 Olímpico Fisht-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_chile.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_chile.jpg" class="link-preview" data-lightbox="portfolio" data-title="Olímpico Fisht" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Selección de Chile</a></h4>
                <p>"La Roja"</p>
              </div>
            </div>
          </div>
		  
		  
		  
		  
		  <!-- ESTADIO 9 Rostov Arena-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_ecuador.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_ecuador.jpg" class="link-preview" data-lightbox="portfolio" data-title="Rostov Arena" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Selección de Ecuador</a></h4>
                <p>"La Tri"</p>
              </div>
            </div>
          </div>
		  
		  
		  
		  <!-- ESTADIO 10 Mordovia Arena-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_paraguay.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_paraguay.jpg" class="link-preview" data-lightbox="portfolio" data-title="Mordovia Arena" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#a">Selección de Paraguay</a></h4>
                <p>"La Albirroja"</p>
              </div>
            </div>
          </div>
 
 
 <!-- ESTADIO 11 Samara Arena-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_japon.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_japon.jpg" class="link-preview" data-lightbox="portfolio" data-title="Samara Arena" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Selección de Japon</a></h4>
                <p>"Los Samuráis Azules"</p>
              </div>
            </div>
          </div>
		  
		  
		  
		  
		  <!-- ESTADIO 12 Kazán Arena-->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/galeria/seleccion_qatar.jpg" class="img-fluid" alt="">
                <a href="img/galeria/seleccion_qatar.jpg" class="link-preview" data-lightbox="portfolio" data-title="Kazán Arena" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Selección de Qatar</a></h4>
                <p>Arabe: منتخب قطر لكرة القدم</p>
              </div>
            </div>
          </div> 
		  
		  
		  
 
    </section>
    <!-- #portfolio -->

    <!--==========================
      Clients Section
    ============================-->
     <!--<section id="clients" class="wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Our Clients</h3>
        </header>

        <div class="owl-carousel clients-carousel">
          <img src="img/clients/client-1.png" alt="">
          <img src="img/clients/client-2.png" alt="">
          <img src="img/clients/client-3.png" alt="">
          <img src="img/clients/client-4.png" alt="">
          <img src="img/clients/client-5.png" alt="">
          <img src="img/clients/client-6.png" alt="">
          <img src="img/clients/client-7.png" alt="">
          <img src="img/clients/client-8.png" alt="">
        </div>

      </div>
    </section>-->
    <!-- #clients -->

    <!--==========================
      Clients Section testimonials
    ============================-->
    <!--<section id="testimonials" class="section-bg wow fadeInUp">
      <div class="container">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
            <h3>Saul Goodman</h3>
            <h4>Ceo &amp; Founder</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
            <h3>Sara Wilsson</h3>
            <h4>Designer</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
            <h3>Jena Karlis</h3>
            <h4>Store Owner</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/testimonial-4.jpg" class="testimonial-img" alt="">
            <h3>Matt Brandon</h3>
            <h4>Freelancer</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="img/testimonial-5.jpg" class="testimonial-img" alt="">
            <h3>John Larson</h3>
            <h4>Entrepreneur</h4>
            <p>
              <img src="img/quote-sign-left.png" class="quote-sign-left" alt="">
              Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
              <img src="img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

        </div>

      </div>
    </section>-->
    <!-- #testimonials -->

    <!--==========================
      Team Section
    ============================-->
     <!--<section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Team</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="img/team-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="img/team-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="img/team-4.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- #team -->

    
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
          <form action="{{ URL::asset('/registerContact') }}" method="post" role="form">
		  
            <div class="form-row">

			{{csrf_field()}}

              <!-- Nombre Contacto-->
              <div class="form-group col-md-6">
                <input type="hidden" id="routeCurrent" value="{{ url('/#contacto') }}">
                <input type="text" class="form-control {{ $errors->has('nameContact') ? 'border-danger' : '' }}" name="nameContact" id="nameContact" placeholder="Name" value="{{ old('nameContact') }}">
              {!! $errors->first('nameContact', '<span class="text-danger">:message</span>') !!}
            </div>


               

               <!-- Mail -->
            <div class="form-group col-md-6">
              <input type="text" class="form-control {{ $errors->has('emailContact') ? 'border-danger' : '' }}" name="emailContact" id="emailContact" placeholder="Mail" value="{{ old('emailContact') }}">
              {!! $errors->first('emailContact', '<span class="text-danger">:message</span>') !!}
            </div>
          </div>

            <!-- Asunto -->
            <div class="form-group">
             <input type="text" class="form-control {{ $errors->has('subject') ? 'border-danger' : '' }}" name="subject" id="subject" placeholder="Asunto" value="{{ old('subject') }}">
              {!! $errors->first('subject', '<span class="text-danger">:message</span>') !!}
            </div>

             <!-- Mensaje -->  
            <div class="form-group">
              <textarea class="form-control {{ $errors->has('message') ? 'border-danger' : '' }}" name="message" id="message" rows="5" placeholder="Mensaje">{{ old('message') }}</textarea>
                 {!! $errors->first('message', '<span class="text-danger">:message</span>') !!}

              
              
            </div>
           <div class="text-center">
            <button type="submit" class="btn btn-success">Enviar</button>
          </div>
          </form>
        </div>

      </div>

      
    </section><!-- #contact -->


</body>
</html>


