<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Coches Vidal. Administración </title>

        @include('includes.header')


        <meta name="description" content="">
        <meta name="author" content="">
        <style>

            body {
                padding-top: 20px;
                padding-bottom: 40px;

            }

            .login {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;

            }

            #sha{
                max-width: 340px;
                -webkit-box-shadow: 0px 0px 18px 0px rgba(48, 50, 50, 0.48);
                -moz-box-shadow:    0px 0px 18px 0px rgba(48, 50, 50, 0.48);
                box-shadow:         0px 0px 18px 0px rgba(48, 50, 50, 0.48);
                border-radius: 6%;
            }
            #avatar{
                width: 96px;
                height: 96px;
                margin: 0px auto 10px;
                display: block;
                border-radius: 50%;
            } 

        </style>

    </head>
    <body>

        <div class="container well" id="sha">
            <div class="row">
                <div class="col-xs-12">
                    <span><center><h3>Coches Vidal</h3></center></span>	
                    <span><center><h5>Versión 1.0</h5></center></span>	
                    <br/>
                </div>
            </div>

            <form id="loginform" action="{{URL::to('login')}}" method="post">
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- ./ csrf token -->
                @if (Session::has('login_errors'))
                <p style='color:#FB1D1D' >El usuario o la clave no son correctos.</p>
                @else
                <p>Introduzca usuario y clave para continuar.</p>
                @endif
                <div class="form-group">
                    <input type="text" maxlength="15" class="form-control" placeholder="Empresa" name="empresa" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" maxlength="15" class="form-control" placeholder="Clave Empresa" name="passEmpresa" required>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" maxlength="15" class="form-control" placeholder="Usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <input type="password" maxlength="15" class="form-control" placeholder="Clave Usuario" name="passUsuario" required>
                </div>
                <div class="form-actions clearfix">                      
                    <input class="btn btn-block btn-primary btn-default" value="Acceder" type="submit">
                </div>
<!--                <div class="footer-login">
                    <div class="pull-left text">
                    </div>

                </div>-->
            </form>
        </div>


        @include('includes.js')

    </body>
</html>