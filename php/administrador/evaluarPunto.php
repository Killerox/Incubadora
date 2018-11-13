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

$folioEvaluar = $_GET['id'];
$folio = $_SESSION['folio'];
$punto = $_GET['punto'];

if($punto=="1"){
	$titulo = htmlentities("Descripción de la empresa", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto1 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="2") {

  $titulo = htmlentities("Descripción del entorno", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto2 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];


}elseif ($punto=="3") {

	$titulo = htmlentities("Análisis del producto y su mercado", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto3 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="4") {

	$titulo = htmlentities("Estrategia de mercadotecnia", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto4 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="5") {

	$titulo = htmlentities("Plan de ventas", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto5 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="6") {

	$titulo = htmlentities("Plan de operaciones del proyecto", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto6 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="7") {

	$titulo = htmlentities("Recursos humanos", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto7 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="8") {

	$titulo = htmlentities("Aspectos legales", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto8 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="9") {

	$titulo = htmlentities("Planes de lanzamiento", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto9 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="10") {

	$titulo = htmlentities("Plan financiero y evaluación de lproyecto", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto10 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="11") {

	$titulo = htmlentities("Plan de inversión y financiamiento", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto11 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}elseif ($punto=="12") {

	$titulo = htmlentities("Conclusiones", ENT_COMPAT, 'UTF-8');
	$query = "SELECT * FROM punto12 WHERE folio = '$folioEvaluar'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];
	$fetch="SELECT * FROM notificaciones WHERE folio = '$folioEvaluar'";
	$result1 = $mysqli->query($fetch);
	$mod2 = $result1->fetch_assoc();
	$fecha = $mod2['hora'];

}


//Informacion del usuario activo
$sql = "SELECT id_user, user FROM users WHERE folio = '$folio'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
//Informacion del proyecto evaluado
$sqli = "SELECT Pnombre, nombre, fecha, identificacion, domicilio, carta_intencion FROM registroproyecto WHERE folio = '$folioEvaluar'";
$resulti = $mysqli->query($sqli);
$rowi = $resulti->fetch_assoc();

//actualiza comentario
if (!empty($_POST)) {

  $estado = $mysqli->real_escape_string($_POST['estado']);
	$editor = $mysqli->real_escape_string($_POST['editor2']);

	ini_set('date.timezone', 'America/Mexico_City');
  $time = date('Y-m-d, H:i:s', time());
	$destino = "emprendedor";
	$tipo_user = 1;
	$nombreProyecto = $rowi['Pnombre'];

	$stmt = "INSERT INTO notificaciones (nombre_proyecto, destino, folio, punto, hora, tipo_usuario, comentario) VALUES('$nombreProyecto', '$destino', '$folioEvaluar', '$punto', '$time', '$tipo_user', '$editor' )";
	$resultado = mysqli_query($mysqli, $stmt);
	if ($resultado > 0) {
		  $mysqli->commit();

			$punt = "punto".$punto;
		  $stmt = "UPDATE $punt SET  fecha='$time', estado='$estado' WHERE folio='$folioEvaluar'" ;
		  $resultado = mysqli_query($mysqli, $stmt);
      $tipo_user_delet = 0;
			$stm1 = "DELETE FROM notificaciones WHERE punto = '$punto' AND tipo_usuario = '$tipo_user_delet'";
			$resultado3 = mysqli_query($mysqli, $stm1);


		  if($resultado > 0 & $resultado3 > 0){
		  $mysqli->commit();
		  header("location: notificaciones.php");
		  }else {
		    echo $stmt;
		    echo "Error al registrar";
		    $mysqli->rollback();
		  }

	}

}

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
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>

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
						<li class="nav-item active">
               <a class="nav-link" href="administrador.php">Solicitudes   <i class="fab fa-wpforms fa-lg"></i>
							 <span class="fa-layers-counter">1,419</span></a>
            </li>
            <li class="nav-item">
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
			 <h1 align="center"><font size="6">Proyecto: <?php echo utf8_decode($rowi['Pnombre']); ?> </font></h1>
			 <br>
			 <div class="form-group">
				 <h1 align="center"><font size="4">Fecha: <?php echo utf8_decode($fecha); ?> </font></h1>
				 <h1 align="center"><font size="4">Nombre del responsable: <?php echo utf8_decode($rowi['nombre']); ?> </font></h1>
				 <h1 align="center"><font size="4">Punto de la guia de negocios a evaluar: <?php echo utf8_decode($titulo); ?> </font></h1>
			 </div>
		 </div>
		 <br>

		 <div class="form-group">
		 <form action="editarPunto.php" method="post" enctype="multipart/form-data">
			 <textarea name="editor" id="editor" rows="10" cols="400" class="ckeditor" required><?php echo $content ?></textarea>
			 <br>
		 </form>
		 </div>
		 <hr width="75%" />
		 <div class="form-group">
			  <br>
			  <h1 align="center"><font size="6">Observaciones</font></h1>
			  <br>
        <h1 align="center"><font size="4">A continuación realice un comentario sobre el punto que esta evaluando, de igual forma
				seleccione un estado para este punto.</font></h1>
				<br>
		 </div>
		 <div class="row">
     <br>
		 <div class="col-md-7">
			 <div class="form-group">
 		  	<form method="post" enctype="multipart/form-data">
 				<textarea name="editor2" id="editor2" rows="10" cols="400" class="ckeditor" required></textarea>
 				<br>
 				<div class="row w-100 align-items-center">
 				 <div class="col text-center">
 					 <button type="submit" class="btn btn-primary" >
 					 Enviar
 					 </button>
 				 </div>
 			 </div>

		</div>
		 </div>
		 <div class="col-md-5">
			 <label for="apellidos" class="col-md-9 control-label">Estado del punto evaluado:</label><br>
			 <select class="form-control" name="estado" id="estado">
         <option value="Aceptado">Aceptado</option>
 				<option value="Revisar">Revisar</option>
 			</select>
			</form>
 			</div>

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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>
