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

$usuarioEditar = $_GET['id'];

if (!empty($_POST)) {

  $estado = $mysqli->real_escape_string($_POST['estado']);

	$stmt = "UPDATE users SET estado = '$estado'  WHERE id_user='$usuarioEditar'" ;
	$resultado = mysqli_query($mysqli, $stmt);
	if($resultado > 0){
		$mysqli->commit();
		header("location: usuarios.php");
	}
	else{
		$mysqli->rollback();
		header("location: usuarios.php");
	}
}


//Informacion del usuario activo
$folio = $_SESSION['folio'];
$sql = "SELECT id_user, user FROM users WHERE folio = '$folio'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
//Informacion del proyecto evaluado
$sqli = "SELECT user, nombreCom, tipo, estado FROM users WHERE id_user = '$usuarioEditar'";
$rowi = $mysqli->query($sqli);


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
        <a class="navbar-brand" href="#"><?php echo ''.utf8_decode($row['user']); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
						<li class="nav-item">
               <a class="nav-link" href="administrador.php">Solicitudes   <i class="fab fa-wpforms fa-lg"></i>
							 <span class="fa-layers-counter">1,419</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="usuarios.php">Usuarios   <i class="fas fa-users fa-lg"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Proyectos activos <i class="fas fa-archive fa-lg"></i></a>
            </li>
						<li class="nav-item">
							<a class="nav-link" href="#">Notificaciones   <i class="far fa-envelope fa-lg"></i>
							<span class="fa-layers-counter">5</span></a>
						</li>
						<li class="nav-item">
              <a class="nav-link" href="#">Cortes <i class="fas fa-database fa-lg"></i></a>
            </li>
						<li class="nav-item">
              <a class="nav-link" href="#">Platicas <i class="fas fa-mouse-pointer fa-lg"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Cerrar sesión <i class="fas fa-sign-out-alt"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

		 <br>
		 <br>
		 <div class="col-lg-12">
			 <br>
			 <h1 align="center"><font size="6">Editar usuario </font></h1>
			 <br>
		 </div>
		 <br>

		 <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off" enctype="multipart/form-data">
			<div class="row w-100 align-items-center">
				<table class="table table-bordered col-md-6" align="center">
					 <?php
					 while ($usuarios = $rowi->fetch_array(MYSQLI_BOTH)) {
				 echo " <tr>";
	 			 echo "<th>Nombre</th>";
	 			 echo "<th align='center'>"; echo $usuarios['nombreCom'];"</th>";
	 			 echo "</tr>";

				 echo " <tr>";
	 			 echo "<th>Usuario</th>";
	 			 echo "<th align='center'>"; echo $usuarios['user'];"</th>";
	 			 echo "</tr>";

				 echo " <tr>";
	 			 echo "<th>Tipo</th>";
				 if($usuarios['tipo']==1){
					 $aux="Administrador";
				 }else {
				 	$aux="Emprendedor";
				 }
	 			 echo "<th align='center'>"; echo $aux; "</th>";
	 			 echo "</tr>";

				 echo " <tr>";
	 			 echo "<th>Estado</th>";
	 			 echo "<th align='center'> <select class='form-control' id='estado' name='estado' value=''>
					 <option value='1'>Activo</option>
					 <option value='0'>Inactivo</option>
				 </select> </th>";
	 			 echo "</tr>";
			}
			?>
	</table>
</div>
<div class="row w-100 align-items-center">
	<div class="col text-center">
		<button type="submit" class="btn btn-primary" >
		Actualizar
		</button>
	</div>
</div>
</form>

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
