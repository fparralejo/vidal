<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Coches Vidal</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <!-- Bootstrap core JavaScript
        ================================================== -->

        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.10.0/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
        <!-- Latest compiled and minified JavaScript -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous"><link href="css/style.css" rel="stylesheet" type="text/css">
        <link href="css/linecons.css" rel="stylesheet" type="text/css">
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="css/responsive.css" rel="stylesheet" type="text/css">
        <link href="css/animate.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="js/jquery.isotope.js"></script>
        <script type="text/javascript" src="js/wow.js"></script>
        <script type="text/javascript" src="js/classie.js"></script>
        
        <script src="{{URL::asset('js/docs.min.js')}}"></script>
        <script src="{{URL::asset('js/tools.js')}}"></script>

        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/responsive/1.0.0/css/dataTables.responsive.css">
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/responsive/1.0.0/js/dataTables.responsive.min.js"></script>
        <script src="{{URL::asset('lib/datepicker/js/bootstrap-datepicker.js')}}"></script>

        <link rel="stylesheet" href="{{URL::asset('css/formValidation.min.css')}}">
        <script src="{{URL::asset('js/formValidation.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.min.js')}}"></script>

        <!-- Custom styles for this template -->
        <link href="{{URL::asset('css/bootstrap-theme.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('css/dashboard.css')}}" rel="stylesheet">



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <link rel="icon" href="{{URL::asset('images/logo1.gif')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'  type='text/css'>

        <meta name="description" content="">
        <meta name="author" content="">

        <style>
            .thumbnail{
                /*height: 380px;*/
                /*overflow-y: scroll;*/
            }

            .caption p{
                vertical-align: bottom;
            }

            .embed-responsive-16by9{
                height: 180px;
            }
        </style>
        
        <!--[if lt IE 9]>
            <script src="js/respond-1.1.0.min.js"></script>
            <script src="js/html5shiv.js"></script>
            <script src="js/html5element.js"></script>
        <![endif]-->

        <script type="text/javascript">
                $(document).ready(function(e) {
                $('.res-nav_click').click(function(){
                        $('ul.toggle').slideToggle(600)	
                                });	

                $(document).ready(function() {
        $(window).bind('scroll', function() {
                 if ($(window).scrollTop() > 0) {
                     $('#header_outer').addClass('fixed');
                 }
                 else {
                     $('#header_outer').removeClass('fixed');
                 }
            });

                  });


                            });	
        function resizeText() {
                var preferredWidth = 767;
                var displayWidth = window.innerWidth;
                var percentage = displayWidth / preferredWidth;
                var fontsizetitle = 25;
                var newFontSizeTitle = Math.floor(fontsizetitle * percentage);
                $(".divclass").css("font-size", newFontSizeTitle)
        }
        </script>
    </head>
    <body>


        <div class="container">

            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="{{ URL::asset('/') }}">
                            <img src="{{URL::asset('images/logo1.gif')}}" style="max-width:100px; margin-top: -7px;" class="img-responsive">
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="#">2ª Mano <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Nuevos</a></li>
                            <li><a href="#">Noticias</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi Cuenta <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Entrar o Registrarme</a></li>
                                    <li><a href="#">Favoritos</a></li>
                                    <li><a href="#">Mis Alertas</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Mis Anuncios</a></li>
                                </ul>
                            </li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Buscar">
                                </div>
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                <a href="{{ URL::asset('publicar') }}" class="btn btn-primary"><span class="glyphicon glyphicon-share"></span>Publica tu anuncio</a>
                            </form>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>


            @yield('principal')



            @include('includes.footer')

        </div>

        <script type="text/javascript">
            $(document).ready(function(e) {
                $('#header_outer').scrollToFixed();
                $('.res-nav_click').click(function(){
                    $('.main-nav').slideToggle();
                    return false    

                });

            });
        </script> 
        <script>
            wow = new WOW(
              {
                animateClass: 'animated',
                offset:       100
              }
            );
            wow.init();
            document.getElementById('').onclick = function() {
              var section = document.createElement('section');
              section.className = 'wow fadeInDown';
                  section.className = 'wow shake';
                  section.className = 'wow zoomIn';
                  section.className = 'wow lightSpeedIn';
              this.parentNode.insertBefore(section, this);
            };
          </script> 
        <script type="text/javascript">
                $(window).load(function(){

                        $('a').bind('click',function(event){
                                var $anchor = $(this);

                                $('html, body').stop().animate({
                                        scrollTop: $($anchor.attr('href')).offset().top - 91
                                }, 1500,'easeInOutExpo');
                                /*
                                if you don't want to use the easing effects:
                                $('html, body').stop().animate({
                                        scrollTop: $($anchor.attr('href')).offset().top
                                }, 1000);
                                */
                                event.preventDefault();
                        });
                })
        </script> 
        <script type="text/javascript">


          jQuery(document).ready(function($){     

        // Portfolio Isotope
                var container = $('#portfolio-wrap');	


                container.isotope({
                        animationEngine : 'best-available',
                        animationOptions: {
                        duration: 200,
                        queue: false
                        },
                        layoutMode: 'fitRows'
                });	

                $('#filters a').click(function(){
                        $('#filters a').removeClass('active');
                        $(this).addClass('active');
                        var selector = $(this).attr('data-filter');
                        container.isotope({ filter: selector });
                setProjects();		
                        return false;
                });


                        function splitColumns() { 
                                var winWidth = $(window).width(), 
                                        columnNumb = 1;


                                if (winWidth > 1024) {
                                        columnNumb = 4;
                                } else if (winWidth > 900) {
                                        columnNumb = 2;
                                } else if (winWidth > 479) {
                                        columnNumb = 2;
                                } else if (winWidth < 479) {
                                        columnNumb = 1;
                                }

                                return columnNumb;
                        }		

                        function setColumns() { 
                                var winWidth = $(window).width(), 
                                        columnNumb = splitColumns(), 
                                        postWidth = Math.floor(winWidth / columnNumb);

                                container.find('.portfolio-item').each(function () { 
                                        $(this).css( { 
                                                width : postWidth + 'px' 
                                        });
                                });
                        }		

                        function setProjects() { 
                                setColumns();
                                container.isotope('reLayout');
                        }		

                        container.imagesLoaded(function () { 
                                setColumns();
                        });


                        $(window).bind('resize', function () { 
                                setProjects();			
                        });

        });
        $( window ).load(function() {
                jQuery('#all').click();
                return false;
        });
        </script>
    </body>
</html>