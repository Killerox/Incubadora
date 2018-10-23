<?php

session_start();
require '../conexion.php';
require '../funcs.php';

if(!isset($_SESSION['id_user'])){
	header("Location: ../../index.php");
}

if($_SESSION['tipo']==1){
    header("Location: ../logout.php");
}

$folio = $_SESSION['folio'];

$sql = "SELECT folio, Pnombre, nombre, sector1, sector2 FROM registroproyecto WHERE folio = '$folio'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();


$sqli = "SELECT activo FROM registroproyecto WHERE folio = '$folio'";
$resulti = $mysqli->query($sqli);
$rowi = $resulti->fetch_assoc();

#$bdproyecto = "SELECT * FROM  registroproyecto";
#$resbdproyecto = $mysqli->query($bdproyecto);

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
<link href="../../lib18/vendor/components/font-awesome/css/fontawesome-all.css" rel="stylesheet">
<!-- Bootstrap core CSS
<link href="../../lib18/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Estilo SEP HIDALGO -->
<link href="../../lib18/seph/style.css" rel="stylesheet">
<!-- Estilo para el boton flotante que te lleva arriba-->
<link href="../../lib18/coreFRONTx/10boton-arriba/estilo.css" rel="stylesheet">


<!-- Para centrar los iconos y featurette-divider 80-->
<link href="../../dotk/05main/01iconos/iconos-centrados.css" rel="stylesheet">
<!-- Eventos de difusion de comunicacion social -->
<link href="../../dotk/05main/02prensa/rmbc.css" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perfil</title>
    <!-- Custom styles for this template -->
    <link href="../../css/shop-homepage.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


  </head>

  <body>

		<header>
    <!-- Logos e imagen de hidalgo -->
    <div class="container-fluid fixed-top" >
			<div class="row c_gob_gris">
				<div class="col-md-2 c_gob_azul">
					<img src="../../lib18/seph/images/header/logo_w.png" class="img-responsive" alt="Hidalgo" />
				</div>
				<div class="col-md-6 titulo_seph">
					<h1>Universidad Politécnica de Pachuca</h1>
				</div>
				<div class="col-md-4 redes_sociales text-center">
					<a href="https://www.facebook.com/UPPachuca/"><i class="fab fa-facebook"></i></a>
					<a href="https://www.youtube.com/user/uppachuca"><i class="fab fa-youtube"></i></a>
					<a href="https://twitter.com/UPPachuca"><i class="fab fa-twitter-square"></i></a>
					<a href="https://mail.google.com/a/upp.edu.mx/"><i class="fas fa-envelope-square"></i></a>
				</div>
			</div>
		</div>
  </header>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#"><?php echo ''.utf8_decode($row['nombre']); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="usuario.php">Estado del proyecto
              </a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="guiaDeNegocios.php">Guia de negocios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="configuracion.php">Configuracion</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#">Estado de cuenta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Cerrar sesion</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4"><?php echo utf8_decode($row['Pnombre']); ?></h1>
          <div class="list-group">
            <a href="#" class="list-group-item"><?php echo utf8_decode($row['sector1']); ?></a>
            <a href="#" class="list-group-item"><?php echo utf8_decode($row['sector2']); ?></a>
          </div>
          <br>
          <br>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
					<br><br><br>
					<h1 align="center"><font size="6">Estado del proyecto</font></h1>
					<div class="">
						<div id="signupbox" style="margin-top:50px" class="col-sm-11 col-sm-offset-3">
							<div class="panel panel-info">

								<div class="p-3 mb-2 bg-success text-white">
									<div class="panel-title"><h1 align="center"> <?php echo $rowi['activo'] ?> </h1></div>
								</div>
							</div>
						 </div>
						</div>


        </div>

        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- Footer -->
		<br><br><br><br><br><br><br><br><br><br>
		<footer>
    <!-- footer de gobierno del estado -->
    	<div class="container-fluid c_gob_azul" >
		<div class="row ">
			<div class="col-md-3">
				<img src="../../lib18/seph/images/footer/footer_logo.png" alt="Hidalgo">
			</div>
			<div class="col-md-3">
			</div>
			<div class="col-md-4">
				<address>
					Universidad Politécnica de Pachuca<br />
					Copyright &copy; 2018<br />
					Carretera Pachuca - Cd. Sahagún km 20 Ex-Hacienda de Santa Bárbara<br />
					Zempoala Hidalgo <br />
					<img src="../../lib18/images/mex.png" /> México. CP-43830 <br />
					email: <a href="mailto:upp@upp.edu.mx">upp@upp.edu.mx</a> <br />
					Tel 01 (771) 54 77 510<br />
	        <!--<a href="#">Aviso de Privacidad</a>-->
	      </address>
				<p>
					<a href="http://www.upp.edu.mx/lib18/">Web Master</a>
				</p>
			</div>
			<div class="col-md-2">
				<img src="../../lib18/seph/images/footer/footer_escudo.png" class="center-block" alt="Hidalgo">
			</div>
		</div>
	</div>
  </footer>

    <!-- Bootstrap core JavaScript -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  </body>

</html>
