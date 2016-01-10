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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
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


                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>


            @yield('principal')



            @include('includes.footer')

        </div>

    </body>
</html>