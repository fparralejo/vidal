<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>thumbnails</title>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{URL::asset('css/bootstrap.css')}}">
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
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">2ª Mano <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Nuevos</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi Cuenta <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Alta</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



<!--		<div class="jumbotron">
 
			<h1>Tienda Online</h1>
  		<p>Por Halloween descuento del 40% en disfraces</p>
  		<p><a class="btn btn-primary btn-lg" href="#" role="button">Ver más</a></p>
 
		</div> -->
 
	<div class="row">
		<div class="col-sm-6 col-md-4">
			 <div class="thumbnail">
			 	<img src="images/pic.jpg" alt="..." class="img-responsive">
 
			 	<div class="caption">
 
			 		<h3>Título producto 1</h3>
			 		        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
			 					
			 		        </p>
 
			 		       
			 		        <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
				
 
			 	</div>
			 </div>
 
		</div>
		
		<div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		    	
		      <img src="images/pic1.jpg" alt="..." class="img-responsive">
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
		
		<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
    	
      <img src="images/pic2.jpg" alt="..." class="img-responsive">
      <div class="caption">
        <h3>Título producto 3</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
        <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
      </div>
    </div>
  </div>
 
  <div class="col-sm-6 col-md-8">
    <div class="thumbnail">
    	<span class="badge">5.99 USD</span>
      <img src="images/pic3.jpg" alt="..." class="img-responsive">
      <div class="caption">
        <h3>Título producto 4 <span class="label label-info">En rebaja</span></h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit. lor</p>
        <p><a href="#" class="btn btn-primary" role="button">Detalles</a> <a href="#" class="btn btn-default" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar</a></p>
      </div>
    </div>
  </div>
 
  <div class="col-sm-6 col-md-4">
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
 
 
 
	</div>
 
 
	</div>
 
	<script src="{{URL::asset('js/jquery.min.js')}}"></script>
	<script src="{{URL::asset('js/bootstrap.js')}}"></script>
</body>
</html>