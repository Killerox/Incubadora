<?php

session_start();
require '../conexion.php';
require '../funcs.php';

if(!isset($_SESSION['id_user'])){
	header("Location: ../index.php");
}

if($_SESSION['tipo']==0){
    header("Location: ../logout.php");
}

$folio = $_SESSION['folio'];

$sql = "SELECT id_user, user FROM users WHERE folio = '$folio'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
//Solo mostrara los proyectos no activos
$activo = 0;
$bdproyecto = "SELECT * FROM  registroproyecto WHERE activo like '$activo'";
$resbdproyecto = $mysqli->query($bdproyecto);

?>

<html lang="en">

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
		<!-- Bootstrap core CSS -->
		<link href="../../lib18/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
        <a class="navbar-brand" href="#"><?php echo 'Bienvenid@ '.utf8_decode($row['user']); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Solicitudes
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="usuarios.php">Usuarios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Proyectos activos</a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="#">Cortes</a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="#">Platicas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Cerrar sesión</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

		 <br>
		 <br>
		 <br>
			<div class="table-responsive">
					<table class="table table-bordered table-hover table-condensed" align="center">
						 <tr class="info" >
								 <th>Folio</th>
								 <th>Nombre del proyecto</th>
								 <th>Nombre responsable</th>
								 <th>Correo electronico</th>
								 <th>Fecha de registro</th>
								 <th><a href="#"></a></th>

						 </tr>
						 <?php
						 while ($proyecto = $resbdproyecto->fetch_array(MYSQLI_BOTH)) {


						echo "<tr>";
						echo "<td align='center'>"; echo $proyecto['folio']; "</td>";
						echo "<td align='center'>"; echo $proyecto['Pnombre']; "</td>";
						echo "<td align='center'>"; echo $proyecto['nombre']; "</td>";
						echo "<td align='center'>"; echo $proyecto['email']; "</td>";
						echo "<td align='center'>"; echo $proyecto['fecha']; "</td>";

						echo "<td align='center'><a href='evaluarProyecto.php?id=".$proyecto['folio']."'><button type='button' class='btn btn-success'>Evaluar Usuario</button></a></td>";
						echo "</tr>";

				}

				?>
		</table>
</div>
    <br>
		<br>
		<br>

    </div>
    <!-- /.container -->

    <!-- Footer -->
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
