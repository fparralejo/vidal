<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Coches Vidal</title>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/estilo.css')}}">
        <link rel="shortcut icon" href="{{URL::asset('favicon.ico')}}" type="image/x-icon"/>
        <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet'  type='text/css'>
        
        <style>
/*body {
	background-color:#fcfcfc;
}

 make the well swell 
.well {
	border-color:#c9c9c9;
}


.post h4 {
  margin-bottom: 9px;
}

.post h4 a {
  color: #333;
}

.post img.image {
  max-width: 100%;
  margin-top: 9px;
}

.info {
	padding:4px;
}*/

/* Isotope Transitions
------------------------------- */
.isotope,
.isotope .item {
  -webkit-transition-duration: 0.8s;
     -moz-transition-duration: 0.8s;
      -ms-transition-duration: 0.8s;
       -o-transition-duration: 0.8s;
          transition-duration: 0.8s;
}

.isotope {
  -webkit-transition-property: height, width;
     -moz-transition-property: height, width;
      -ms-transition-property: height, width;
       -o-transition-property: height, width;
          transition-property: height, width;
}

.isotope .item {
  -webkit-transition-property: -webkit-transform, opacity;
     -moz-transition-property:    -moz-transform, opacity;
      -ms-transition-property:     -ms-transform, opacity;
       -o-transition-property:         top, left, opacity;
          transition-property:         transform, opacity;
}
  
  
/* responsive media queries */
  
@media (max-width: 480px) {

}

@media (max-width: 768px) {
  header h1 small {
    display: block;
  }

  header div.description {
    padding-top: 9px;
    padding-bottom: 4px;
  }

  .isotope .item {
    position: static ! important;
    -webkit-transform: translate(0px, 0px) ! important;
       -moz-transform: translate(0px, 0px) ! important;
            transform: translate(0px, 0px) ! important;
  }
}

@media (max-width: 980px) {
  header p.lead span {
    display: block;
  }
}

@media (min-width: 480px) and (max-width: 768px) {

}


@media (min-width: 768px) and (max-width: 980px) {
    .span3 {
      width: 450px;
    }
    .thumbnail{
      width: 95%;
    }
}

@media (min-width: 980px) and (max-width: 1200px) {
    .span3 {
      width: 400px;
    }
    .thumbnail{
      width: 95%;
    }
}

@media (min-width: 1200px) {
    .span3 {
      width: 350px;
    }
    .thumbnail{
      width: 95%;
    }
}

.row{
    align-content: center;
}
            
        </style>

        <meta name="description" content="">
        <meta name="author" content="">
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
                                <button type="text" onclick="javascript:window.href={{ URL::asset('/') }}" class="btn btn-primary"><span class="glyphicon glyphicon-share"></span>Publica tu anuncio</button>
                            </form>
                        </ul>

                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>

            
            <section id="posts">
<!--            <div id="posts" class="row">-->
                
                <div id="1" class="post item span3">
<!--                    <div class="col-sm-6 col-md-4">-->
                    <div class="thumbnail">
                        <img src="images/pic.jpg" alt="..." class="img-responsive">

                        <div class="caption">

                            <h3>Título producto 1</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida sdfasdf sdfsf asdf fgfg fg dfgdfgdfg dfgdfg dfg dfg dfg dg at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.

                            </p>


                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>


                        </div>
                    </div>
                </div>

                <div id="2" class="post item span3">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/kc31ZHYvQ8g?feature=player_detailpage"></iframe>
                        </div>
                        <div class="caption">
                            <h3>Título producto 2 <span class="label label-danger">Sin stock</span></h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit ess
                            </p>

                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div id="3" class="post item span3">
                    <div class="thumbnail">

                        <img src="images/pic2.jpg" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>Título producto 3</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>
<!--            </div>
            
            <div class="row">-->
                <div id="4" class="post item span3">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <img src="images/pic3.jpg" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>Título producto 4 <span class="label label-info">En rebaja</span></h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget sdsdsd sdsds dsd werw ew e wewewe wewe we wew ewe metus. Nullam id dolor id nibh ultricies vehicula ut id elit. lor</p>
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div id="5" class="post item span3">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <img src="images/pic3.jpg" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>Título producto 4 <span class="label label-warning">En rebaja</span></h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget we we wew ewe metus. Nullam id dolor id nibh ultricies vehicula ut id elit. lor</p>
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div id="6" class="post item span3">
                    <div class="thumbnail">
                        <span class="badge">39.99 USD</span>
                        <img src="images/pic4.jpg" alt="..." class="img-responsive">
                        <div class="caption">
                            <h3>Título producto 5 <span class="label label-success">Nuevo</span></h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>



<!--            </div>-->
            </section>

        </div>

        <script src="{{URL::asset('js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('js/bootstrap.js')}}"></script>
        <script>
        $.getScript('//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js',function(){

        /* activate jquery isotope */
        $('#posts').imagesLoaded( function(){
          $('#posts').isotope({
            itemSelector : '.item'
          });
        });

      });
        </script>
    </body>
</html>