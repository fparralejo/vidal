<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Coches Vidal</title>

        @include('includes.header')


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




            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/KdjTTp1-Jnc" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 1</h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            </p>
                            <p class="botones"><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Ifx3buwm_xE" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 2 <span class="label label-danger">Sin stock</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...

                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/u2l6nk7pMQ0" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 3 <span class="label label-danger">Sin stock</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...

                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/hJhadhmJktQ" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 4</h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CWEDXBo5nMc" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 5 <span class="label label-info">En rebaja</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/AMnMutJBIjg" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 6 <span class="label label-warning">En rebaja</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">39.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Q_Le6AsIWrg" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 7 <span class="label label-success">Nuevo</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <span class="badge">5.99 USD</span>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/O9pBJkR7DqU" allowfullscreen></iframe>
                        </div>
                        <div class="caption">
                            <h4>Título producto 8 <span class="label label-info">En rebaja</span></h4>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida...
                            <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
                        </div>
                    </div>
                </div>


            </div>


            @include('includes.footer')

        </div>

    </body>
</html>