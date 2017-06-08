<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="images/favicon.png">
<title>Club Andino Piramide</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


<!-- FontAweasome Icon -->
<link  href="css/font-awesome.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/jquery.circliful.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" >



</head>
<!-- NAVBAR
================================================== -->
<body>
<div class="navbar-wrapper">
  <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
           <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
           <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <!--<a class="navbar-brand" href="#homeSlider">Club Andino Piramide</a> -->
        <a class="" href="#homeSlider"><img src="/img/site/logo22.png" alt="" height=50 style="margin:5px;"></a>
    </div>

      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#home">INICIO</a></li>
          <li><a href="#actividades">ACTIVIDADES</a></li>
          <li><a href="#club">CLUB</a></li>
          <li><a href="#socios">SOCIOS</a></li>
          <li><a href="#galeria">GALERIA</a></li>
          <li><a href="#noticias">NOTICIAS</a></li>
          <li><a href="#contacto">CONTACTO</a></li>
          @if(Auth::user())
          <li><a href="/home">MI CUENTA</a></li>
          @else
          <li><a href="/login">LOGIN</a></li>
          @endif

        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Carousel
    ================================================== -->
<div id="home">
  <div id="homeSlider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active" style="background-image:url({{url('/img/slider/slide1.png')}});">
        <div class="container">
          <div class="carousel-caption">
              <div class="">
                  <img src="/img/site/logo24.png" alt="" height=100 style="margin:5px;">
                </div>
            <h2 class="sltext">Cub Andino<br> Piramide
            </h2>
            </div>
        </div>
      </div>
      <div class="item" style="background-image:url({{url('/img/slider/slide2.png')}});">
        <div class="container">
          <div class="carousel-caption">
            <div class="">
               </div>
            <h2 class="sltext">Ascenciones,<br> Trekking <br>y mucha Aventura!</h2>
             </div>
        </div>
      </div>
      <div class="item" style="background-image:url({{url('/img/slider/slide3.png')}});">
        <div class="container">
          <div class="carousel-caption">
            <div class="">
              </div>
            <h2 class="sltext">¿Quieres Conocernos?</h2>
            </div>
        </div>
      </div>
    </div>
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#homeSlider" data-slide-to="0" class="active"></li>
      <li data-target="#homeSlider" data-slide-to="1"></li>
      <li data-target="#homeSlider" data-slide-to="2"></li>
    </ol>
  </div>
</div>
<!-- /carousel Close -->

<!-- Service Section
    ================================================== -->
<div class="services" id="actividades">
<div class="feature">
  <div class="container">
      <div class="head_section">
        <h2>Que Hacemos?</h2>
        <p></p>
      </div>
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="service_tiem">
          <div class=""><img class="fa" src="/img/icons/snowed-mountains.png" alt="" height=70 ></div>
          <h2>Ascenciones & Travesias</h2>
          <p>Baja , Media y Alta Montaña, en toda temporada y con diferentes condiciones climaticas (controlando el riesgo), con metas tanto de altitud (msnm), como de conocer nuevas rutas y lugares.</p>
         </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service_tiem">
    <div class=""><img class="fa" src="/img/icons/climbing-sport.png" alt="" height=70 ></div>
          <h2>Trekking, Senderismo & Campamentos</h2>
          <p>Realizamos actividades de baja a media dificultad, conociendo parques y reservas naturales y lugares de visita poco frecuente, disfrutando de la naturaleza y el compañerismo. </p>
           </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service_tiem">
           <div class=""><img class="fa" src="/img/icons/plate-fork-and-knife.png" alt="" height=70 ></div>
          <h2>Confraternizacion & Ayuda a la Comunidad</h2>
          <p>No solo realizamos actividades en la montaña si no que tambien realizamos actividades de celebraciones, jornadas de cine, entre otras. Tambien de impacto a la comunidad, como limpieza de lugares y ayuda en caso de catastrofes. </p>
          </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="service_tiem">
          <div class=""><img class="fa" src="/img/icons/classroom.png" alt="" height=70 ></div>
          <h2>Capacitacion e Instruccion</h2>
          <p>Instruimos a cada uno de nuestros socios antes de una salida, asi tambien enseñamos de las distintas diciplinas como: equipo y uso, planificacion, orientacion, clima, alimentacion, manejo de riesgos y liderazgo, primeros auxilios, escalada & uso de cuerdas, nieve y glaciar, campamentos, etc...</p>
          </div>
      </div>

    </div>
  </div>


  </div>
</div>
<!-- / Services Close -->

<!-- Parallax 04
    ================================================== -->
<div class="parallax parallax_d">
  <div class="container">

    <div class="clearfix"></div>
    </div>
</div>
<!-- / Parallax Close Close -->

<!-- About Us Section
    ================================================== -->
<div class="aboutus" id="club">
  <div class="container">
      <div class="head_section">
        <h2>NUESTRO CLUB</h2>
        <p></p>
      </div>

    <div class="row">
      <div class="col-md-4">
        <div class="about_item">

          <div class="who_weare">
          <ul class="process">
            <li>
              <div class="process-title">
                <div class="process-badge"><i class="fa fa-users" aria-hidden="true"></i></div>
                Quienes Somos</div>
                @if(isset($site->who_are))
                {!! html_entity_decode($site->who_are) !!}
                @endif
            </li>
          </ul>


          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="choos_us">

          <div class="whchoise">
              <ul class="process">
                <li>
                  <div class="process-title">
                    <div class="process-badge"><i class="fa fa-birthday-cake" aria-hidden="true"></i></div>
                    Fecha de Fundacion</div>
                  @if(isset($site->birthdate))
                  <p>{{$site->birthdate}}</p>
                  @endif
                </li>
                <li>
                  <div class="process-title">
                    <div class="process-badge"><i class="fa fa-history" aria-hidden="true"></i></div>
                    Reseña Historica</div>
                    @if(isset($site->history))
                {!! html_entity_decode($site->history) !!}
                @endif
                </li>

              </ul>

          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="the_process">

          <ul class="process">
            <li>
              <div class="process-title">
                <div class="process-badge"><i class="fa fa-calendar"></i></div>
                Horario</div>
              <p>asdasdasdaa asd asd asd asd asd</p>
            </li>
            <li>
              <div class="process-title">
                <div class="process-badge"><i class="fa fa-map-marker"></i></div>
                Lugar</div>
              <p>Semper eget Donec eget tellus. Maecenas non dolo acnunc malesuada elementum. Suspendisse elit</p>
            </li>
            <li>
              <div class="process-title">
                <div class="process-badge"><i class="fa fa-dot-circle-o"></i></div>
                Objetivos</div>
              <p>Semper eget Donec eget tellus. Maecenas non dolo acnunc malesuada elementum. Suspendisse elit</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>






</div>
<!-- / about us close -->

<!-- Parallax
    ================================================== -->
<div class="parallax parallax_a">
  <div class="container">

     </div>
</div>
<!-- / Parallax Close Close -->

<!-- Our Team Section
    ================================================== -->
<div class="ourteam" id="socios">
  <div class="container">
    <div class="head_section">
      <h2>NUESTROS SOCIOS</h2>
      <div class="team-carousel-control"> <a class="left" href="#team-carousel" data-slide="prev"><i class=" fa fa-angle-left"></i></a> <a class="right" href="#team-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a> </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div id="team-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">


        <?php
        $i_user = 0;
        $i = 0;
        foreach ( $users as $user){
         if($i_user == 0 && $i == 0)
            {
                echo  '<div class="item active"><div class="row">';
            }
          if($i_user == 0 && $i >0)
          {
              echo  '<div class="item"><div class="row">';
          }
        ?>
              <div class="col-sm-3">
                <div class="member">
                  <div class="photo"> <img  src="{{ url('/img/profile/'.$user->photo)}}" alt="" class="img-circle"  /> </div>
                  <div class="info">
                    <h4 class="name">{{ $user->name }} {{ $user->last_name }}</h4>
                    <span class="designation">
                        @if($user->club_position == 'only_member') Socio @endif
                        @if($user->club_position == 'president') Presidente @endif
                        @if($user->club_position == 'secretary') Secretario @endif
                        @if($user->club_position == 'treasurer') Tesorero @endif
                        @if($user->club_position == 'director') Director Asociado @endif
                        @if($user->club_position == null) Socio @endif
                    </span>
                    <p>
                        {{ $user->experience }}
                    </p>
                    <ul class="member_social">
                      <li><a href="{{ $user->facebook_url}}"><i class="fa fa-facebook"></i></a></li>
                    </ul>
                  </div>
                </div>
              </div>


          <?php
              if($i_user == 3 && $i >= 0 || $users->count() == $i+1)
              {
                  echo  '</div></div>';
              }

            if($i_user == 3){ $i_user = 0; }else{ $i_user++; }
           $i++;
            }
            ?>

        </div>
      </div>
    </div>

  </div>
</div>
<!-- / our team close -->

<!-- Parallax 02
    ================================================== -->
<div class="parallax parallax_b">
  <div class="container">
    <div class="clearfix"></div>
     </div>
</div>
<!-- / Parallax Close Close -->

<!-- PORTFOLIO Section
    ================================================== -->
<div class="portfolio" id="galeria">
  <div class="container">
    <div class="head_section">
      <h2>GALERIA</h2>
      <p>ALGUNOS MOMENTOS DE NUESTRO CLUB</p>
    </div>
  </div>
  <div class="folio">
    <ul class="option-set clearfix" id="portfolioFilter">
      <li><a href="#" data-filter="*" class="current">ALL</a></li>
      <li><a href="#" data-filter=".branding">BRANDING</a></li>
      <li><a href="#" data-filter=".web">WEB</a></li>
      <li><a href="#" data-filter=".logo">LOGO DESIGN</a></li>
      <li><a href="#" data-filter=".photography">PHOTOGRAPHY</a></li>
      <li><a href="#" data-filter=".recent">MOST RECENT</a></li>
    </ul>
    <div class="portfolioContainer">
      <div class="item people web">
        <a href="/img/slider/slide1.png" data-fancybox="gallery"><div class="pimg-wrap"> <img src="/img/slider/slide1.png" alt="image" style="max-height:450px;">
          <div class="pmask" style=""> <i class="fa fa-eye" aria-hidden="true"></i> VER IMAGEN</div>
        </div></a>
      </div>
      <div class="item branding recent">
        <div class="pimg-wrap"> <img src="http://placehold.it/600x450" alt="image" style="max-height:450px;">
          <div class="pmask"> <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> VER</a></div>
        </div>
      </div>
      <div class="item people web">
        <div class="pimg-wrap"> <img src="http://placehold.it/600x450" alt="image" style="max-height:450px;">
          <div class="pmask"><a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> VER</a></div>
        </div>
      </div>
      <div class="item branding photography">
        <div class="pimg-wrap"> <img src="http://placehold.it/600x450" alt="image" style="max-height:450px;">
          <div class="pmask"><a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> VER</a></div>
        </div>
      </div>
      <div class="item recent web photography">
        <div class="pimg-wrap"> <img src="http://placehold.it/600x450" alt="image" style="max-height:450px;">
          <div class="pmask"> <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> VER</a> </div>
        </div>
      </div>
      <div class="item branding logo">
        <div class="pimg-wrap"> <img src="http://placehold.it/600x450" alt="image" style="max-height:450px;">
          <div class="pmask"> <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> VER</a></div>
        </div>
      </div>
      <div class="item photography">
        <div class="pimg-wrap"> <img src="http://placehold.it/600x450" alt="image" style="max-height:450px;">
          <div class="pmask"> <a href="#"> <i class="fa fa-eye" aria-hidden="true"></i> VER</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>

</div>
<!-- / portfolio Close -->

<div class="clearfix"></div>
<!-- Parallax 03
    ================================================== -->
<div class="parallax parallax_c">
  <div class="container">
     </div>
</div>
<!-- / Parallax Close Close -->

<div class="clearfix"></div>




<div class="clearfix"></div>
<!--BLOG Section
    ================================================== -->
<div class="blog" id="noticias">
  <div class="container">
    <div class="head_section">
      <h2>ULTIMAS NOTICIAS</h2>
      <p>ALGUNAS DE NUESTRAS ACTIVIDADES Y REUNIONES</p>
      <div class="blog-carousel-control"> <a class="left fa fa-angle-left" href="#blogCarousel" data-slide="prev"></a> <a class="right fa fa-angle-right" href="#blogCarousel" data-slide="next"></a> </div>
    </div>
    <div class="row">
      <div id="blogCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="item active">
            <div class="row">
              <div class="col-sm-4">
                <div class="post-item">
                  <div class="post-headre">
                    <div class="post-seam">
                      <div class="date"> <span>10</span> FEB </div>
                      <div class="auther-pic"><img src="http://placehold.it/140x140" alt=""></div>
                    </div>
                    <div class="post-image"> <a href="#"><i class="fa fa-film"></i></a> <img src="http://placehold.it/740x450" alt="" /></div>
                  </div>
                  <div class="post-content">
                    <h4>SUSPENDISSE NUNC SUSPE</h4>
                    <p>Eed in pulvinar sollicitudin augul Suspend mauris tort
                      posere semper eget cosngue eget arcu. Nam leo
                      pharetra in blandit adg tincidunt</p>
                  </div>

                </div>
              </div>
              <div class="col-sm-4">
                <div class="post-item">
                  <div class="post-headre">
                    <div class="post-seam">
                      <div class="date"> <span>10</span> FEB </div>
                      <div class="auther-pic"><img src="http://placehold.it/75x75" alt=""></div>
                    </div>
                    <div class="post-image"> <a href="#"><i class="fa fa-film"></i></a> <img src="http://placehold.it/740x450" alt="" /></div>
                  </div>
                  <div class="post-content">
                    <h4>SUSPENDISSE NUNC SUSPE</h4>
                    <p>Eed in pulvinar sollicitudin augul Suspend mauris tort
                      posere semper eget cosngue eget arcu. Nam leo
                      pharetra in blandit adg tincidunt</p>
                  </div>

                </div>
              </div>
              <div class="col-sm-4">
                <div class="post-item">
                  <div class="post-headre">
                    <div class="post-seam">
                      <div class="date"> <span>10</span> FEB </div>
                      <div class="auther-pic"><img src="http://placehold.it/75x75" alt=""></div>
                    </div>
                    <div class="post-image"> <a href="#"><i class="fa fa-film"></i></a> <img src="http://placehold.it/740x450" alt="" /></div>
                  </div>
                  <div class="post-content">
                    <h4>SUSPENDISSE NUNC SUSPE</h4>
                    <p>Eed in pulvinar sollicitudin augul Suspend mauris tort
                      posere semper eget cosngue eget arcu. Nam leo
                      pharetra in blandit adg tincidunt</p>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="row">
              <div class="col-sm-4">
                <div class="post-item">
                  <div class="post-headre">
                    <div class="post-seam">
                      <div class="date"> <span>10</span> FEB </div>
                      <div class="auther-pic"><img src="http://placehold.it/140x140" alt=""></div>
                    </div>
                    <div class="post-image"> <a href="#"><i class="fa fa-film"></i></a> <img src="http://placehold.it/740x450" alt="" /></div>
                  </div>
                  <div class="post-content">
                    <h4>SUSPENDISSE NUNC SUSPE</h4>
                    <p>Eed in pulvinar sollicitudin augul Suspend mauris tort
                      posere semper eget cosngue eget arcu. Nam leo
                      pharetra in blandit adg tincidunt</p>
                  </div>

                </div>
              </div>
              <div class="col-sm-4">
                <div class="post-item">
                  <div class="post-headre">
                    <div class="post-seam">
                      <div class="date"> <span>10</span> FEB </div>
                      <div class="auther-pic"><img src="http://placehold.it/75x75" alt=""></div>
                    </div>
                    <div class="post-image"> <a href="#"><i class="fa fa-film"></i></a> <img src="http://placehold.it/740x450" alt="" /></div>
                  </div>
                  <div class="post-content">
                    <h4>SUSPENDISSE NUNC SUSPE</h4>
                    <p>Eed in pulvinar sollicitudin augul Suspend mauris tort
                      posere semper eget cosngue eget arcu. Nam leo
                      pharetra in blandit adg tincidunt</p>
                  </div>

                </div>
              </div>
              <div class="col-sm-4">
                <div class="post-item">
                  <div class="post-headre">
                    <div class="post-seam">
                      <div class="date"> <span>10</span> FEB </div>
                      <div class="auther-pic"><img src="http://placehold.it/75x75" alt=""></div>
                    </div>
                    <div class="post-image"> <a href="#"><i class="fa fa-film"></i></a> <img src="http://placehold.it/740x450" alt="" /></div>
                  </div>
                  <div class="post-content">
                    <h4>SUSPENDISSE NUNC SUSPE</h4>
                    <p>Eed in pulvinar sollicitudin augul Suspend mauris tort
                      posere semper eget cosngue eget arcu. Nam leo
                      pharetra in blandit adg tincidunt</p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / blog Close -->
<div class="clearfix"></div>


<!-- CONTACT Section
    ================================================== -->
<div class="contact" id="contacto">
  <div class="container">
    <div class="head_section">
      <h2>CONTACTANOS</h2>
      <p>UBICANOS EN EL MAPA O ENVIANOS UN MENSAJE, TE CONTACTAREMOS A LA BREVEDAD</p>
    </div>
  </div>
  <div class="contact_wrap">
    <div class="row">
      <div class="col-sm-6">
        <div class="map-rap">
          <div id="test1" class="gmap3"></div>
          <div class="map-address">
            <ul>
              <li><i class="fa fa-map-marker"></i> <span>Universidad Adventista de Chile, km 12 Camino a Tanilvoro, Chillán, Chile</span> </li>
              <li> <i class="fa fa-envelope"></i><span> info@clubpiramide.cl</span></li>
              <li><i class="fa  fa-phone"></i> <span> +56968196511 (Marcelo Ramirez)</span></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="query">
          <h3>ENVIANOS UN MENSAJE</h3>
          <form action="/contacts" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
              <input type="text" class="form-control textfild" name="name" id="name" placeholder="Nombre">
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control textfild" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="text" name="subject" id="subject" class="form-control textfild" placeholder="Asunto">
            </div>
            <div class="form-group">
              <textarea name="message" id="textarea" class="form-control textareafild" placeholder="Mensaje"></textarea>
            </div>
            <div class="error"></div>
            <input type="button" value="Enviar" class="submit-btn" onClick="ValiDate()">
          </form>
          <div class="mailSuccessDiv"> Gracios por contactarnos!!! </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / contact Close -->

<!-- FOOTER Section
    ================================================== -->
<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-xs-6">
        <div class="mborder"></div>
      </div>
      <div class="col-xs-6">
        <div class="qborder"></div>
      </div>
    </div>
    <p>© 2017 Abner Galvez - All rights reserved. </p>
    <ul>
      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
    </ul>
  </div>
</div>
<!-- / contact Close -->

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/onepagenav.js"></script>
<script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="js/jquery.circliful.js"></script>
<script type="text/javascript" src="js/jquery.tubular.1.0.js"></script>
<script type="text/javascript" src="js/docs.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="js/gmap3.js"></script>
<script src="https://use.fontawesome.com/eece1d93dc.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>

<script type="text/javascript">


      $(function(){
        $('#test1').gmap3({
            map:{
              options:{
                center:[23.752555, 90.382226],
                zoom: 15
              }
            },
            marker:{
              values: [
                [23.752555, 90.382226], // #1 after average
                [23.752555, 90.382226] // no group
              ],
              cluster:{
                radius:60,
            		// This style will be used for clusters with more than 20 markers
            		0: {
            		  content: '<div class="cluster cluster-3">CLUSTER_COUNT</div>',
            			width: 60,
            			height: 94
            		}
            	}
            }
          });
      });
</script>
</body>
</html>


                  <!--  <form class="form" action="/contacts" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" class="form-control" name="name" placeholder="Nombre" required>
                        </div>

                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                          <label>Asunto o Tema</label>
                          <input type="text" class="form-control" name="subject" placeholder="Asunto" required>
                        </div>
                        <div class="form-group">
                          <label>Mensaje</label>
                          <textarea class="form-control" rows="5" name="message"></textarea>
                        </div>
                          <button type="submit" class="btn pull-right btn-success">Enviar!</button>
                    </form>-->
