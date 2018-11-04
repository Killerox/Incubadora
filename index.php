<?php
session_start();
require 'php/conexion.php';
require 'php/funcs.php';

$errors = array();

if (!empty($_POST)) {

	$usuario = $mysqli->real_escape_string($_POST['usuario']);
	$password = $mysqli->real_escape_string($_POST['password']);

	if(isNuLLLogin($usuario, $password))
	{
		$errors[] = "Debe llenar todos los campos";
	}

	$errors[] = login($usuario, $password);

}

?>
<html>

  <head>

		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-100554272-8"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-100554272-8');
</script>
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="description" content="Universidad Politécnica de Pachuca">
<meta name="author" content="DTIC's">

<title>Universidad Politécnica de Pachuca - UPPachuca</title>

<link rel="icon" href="http://www.upp.edu.mx/lib18/images/favicon.ico">
<!-- Font Awesome -->
<link href="lib18/vendor/components/font-awesome/css/fontawesome-all.css" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="lib18/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Estilo SEP HIDALGO -->
<link href="lib18/seph/style.css" rel="stylesheet">
<!-- Estilo para el boton flotante que te lleva arriba-->
<link href="lib18/coreFRONTx/10boton-arriba/estilo.css" rel="stylesheet">


<!-- Para centrar los iconos y featurette-divider 80-->
<link href="dotk/05main/01iconos/iconos-centrados.css" rel="stylesheet">
<!-- Eventos de difusion de comunicacion social -->
<link href="dotk/05main/02prensa/rmbc.css" rel="stylesheet">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/coming-soon.min.css" rel="stylesheet">

  </head>

  <body>

		<header>
    <!-- Logos e imagen de hidalgo -->
    <div class="container-fluid fixed-top" >
			<div class="row c_gob_gris">
				<div class="col-md-2 c_gob_azul">
					<img src="lib18/seph/images/header/logo_w.png" class="img-responsive" alt="Hidalgo" />
				</div>
				<div class="col-md-6 titulo_seph">
					<h1>Universidad Politécnica de Pachuca</h1>
				</div>
				<div class="col-md-4 redes_sociales text-center">
					<a href="https://www.facebook.com/UPPachuca/"><i class="fab fa-facebook-f"></i></a>
					<a href="https://www.youtube.com/user/uppachuca"><i class="fab fa-youtube"></i></a>
					<a href="https://twitter.com/UPPachuca"><i class="fab fa-twitter-square"></i></a>
					<a href="https://mail.google.com/a/upp.edu.mx/"><i class="fas fa-envelope-square"></i></a>
				</div>
			</div>
		</div>
  </header>

    <div class="overlay"></div>
    <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
      <source src="mp4/bg.mp4" type="video/mp4">
    </video>

    <div class="masthead">
      <div class="masthead-bg"></div>
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-md-12 my-auto">
            <div class="masthead-content text-white py-5 py-md-0">

              <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-9 col-md-offset-3 col-sm-8 col-sm-offset-2">
        				<div class="panel panel-info" >
        					<div class="panel-heading">
        						<div class="panel-title">Iniciar Sesi&oacute;n</div>
        						<div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="recupera.php"></a></div>
        					</div>

        					<div style="padding-top:30px" class="panel-body" >

        						<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

        						<form id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">

        							<div style="margin-bottom: 25px" class="input-group">
        								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        								<input id="usuario" type="text" class="form-control" name="usuario" value="<?php if(isset($usuario)) echo $usuario; ?>" placeholder="Usuario" required>
        							</div>

        							<div style="margin-bottom: 25px" class="input-group">
        								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        								<input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" value="<?php if(isset($password)) echo $password; ?>" required>
        							</div>

        							<div style="margin-top:10px" class="form-group">
        								<div class="col-sm-12 controls">
        									<button id="btn-login" type="submit" class="btn btn-success">Entrar</button>
													<a href="#">¿Olvidaste tu cuenta?</a>
        								</div>
        							</div>

        							<p>¿Quieres registrar un proyecto?</p><a href="php/registro.php">Click aquí</a><br>

        							<div class="form-group">
        								<div class="col-md-12 control">

        								</div>
        							</div>
        						</form>
                    <?php echo resultBlock($errors); ?>
        					</div>
        				</div>
        			</div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="social-icons">
      <ul class="list-unstyled text-center mb-0">
        <li class="list-unstyled-item">
          <a href="#">

          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">

          </a>
        </li>
        <li class="list-unstyled-item">
          <a href="#">

          </a>
        </li>
      </ul>
    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/coming-soon.min.js"></script>

  </body>

</html>
