<?php
require 'conexion.php';
require 'funcs.php';

$folio = $_GET['id'];
$res = $_GET['ruta'];

$errors = array();

if(!empty($_POST)){


	$Inombre = $mysqli->real_escape_string($_POST['Inombre']);
	$Idireccion = $mysqli->real_escape_string($_POST['Idireccion']);
  $Icolonia = $mysqli->real_escape_string($_POST['Icolonia']);
	$Imunicipio = $mysqli->real_escape_string($_POST['Imunicipio']);
	$Icp = $mysqli->real_escape_string($_POST['Icp']);
	$Iestado = $mysqli->real_escape_string($_POST['Iestado']);
	$Itelefono = $mysqli->real_escape_string($_POST['Itelefono']);
	$Iemail = $mysqli->real_escape_string($_POST['Iemail']);
	$Iprocedencia = $mysqli->real_escape_string($_POST['Iprocedencia']);

  $registro = registroI($folio, $Inombre, $Idireccion, $Icolonia, $Imunicipio, $Icp, $Iestado, $Itelefono, $Iemail, $Iprocedencia);


  if($registro > 0){

  $errors[] = "Usuario registrado exitosamente";
  $mysqli->commit();
  header("location: registroP2.php?id=".$folio."");

}else {
  $errors[] = "Error al registrar";
  $mysqli->rollback();
   }


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
<link href="../lib18/vendor/components/font-awesome/css/fontawesome-all.css" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="../lib18/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Estilo SEP HIDALGO -->
<link href="../lib18/seph/style.css" rel="stylesheet">
<!-- Estilo para el boton flotante que te lleva arriba-->
<link href="../lib18/coreFRONTx/10boton-arriba/estilo.css" rel="stylesheet">


<!-- Para centrar los iconos y featurette-divider 80-->
<link href="../dotk/05main/01iconos/iconos-centrados.css" rel="stylesheet">
<!-- Eventos de difusion de comunicacion social -->
<link href="../dotk/05main/02prensa/rmbc.css" rel="stylesheet">

		<title>Registro</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" >
		<link rel="stylesheet" href="../css/bootstrap-theme.min.css" >
		<script src="../js/bootstrap.min.js" ></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

	</head>

	<body >

		<header>
    <!-- Logos e imagen de hidalgo -->
    <div class="container-fluid fixed-top" >
			<div class="row c_gob_gris">
				<div class="col-md-2 c_gob_azul">
					<img src="../lib18/seph/images/header/logo_w.png" class="img-responsive" alt="Hidalgo" />
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
    <?php echo resultBlock($errors); ?>
	  <br> <br>	<br>
		<h1 align="center">Registrar proyecto</h1>
		<div class="container col-md-7">
			<div id="signupbox" style="margin-top:50px" class="col-sm-10 col-sm-offset-2">
				<div class="panel panel-info">

					<div class="p-3 mb-2 bg-secondary text-white">
						<div class="panel-title">Registrar proyecto</div>
					</div>

					<div class="container p-4" >


						<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">

							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-9 control-label">Personas involucrudas en el proyecto</label>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-md-8 control-label">Nombre completo:</label>
								<div class="col-md-12">
									<input type="text" class="form-control" id="Inombre" name="Inombre" placeholder="Nombre completo" value="<?php if(isset($nombre)) echo $nombre; ?>" required >
								</div>
							</div>


							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Dirección:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Idireccion" placeholder="Dirección" value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Colonia:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Icolonia" placeholder="Colonia" value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Municipio:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Imunicipio" placeholder="Municipio" value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">C.P.:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Icp" placeholder="C.P." value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Estado:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Iestado" placeholder="Estado" value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Telefono:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Itelefono" placeholder="Telefono" value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-6 control-label">Correo electronico:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Iemail" placeholder="Correo electronico" value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

              <div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Procedencia:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="Iprocedencia" placeholder="Procedencia" value="<?php if(isset($apellidos)) echo $apellidos; ?>" required >
								</div>
							</div>

							<div class="row w-100 align-items-center">
								<div class="col text-center">
									<button type="submit" class="btn btn-primary" >
									Registrar
									</button>
									<?php
									$folio = $_GET['id'];
									echo "<a href='cartaIntencion.php?id=".$folio."&ruta=".$res."' class='btn btn-success btn-lg' role='button'>Avanzar</a>";
									?>
								</div>
							</div>
								</form>

							</div>
						</div>
					</div>
				</div>
			<!-- Footer -->
			<footer>
	    <!-- footer de gobierno del estado -->
	    	<div class="container-fluid c_gob_azul" >
			<div class="row ">
				<div class="col-md-3">
					<img src="../lib18/seph/images/footer/footer_logo.png" alt="Hidalgo">
				</div>
				<div class="col-md-3">
				</div>
				<div class="col-md-4">
					<address>
						Universidad Politécnica de Pachuca<br />
						Copyright &copy; 2018<br />
						Carretera Pachuca - Cd. Sahagún km 20 Ex-Hacienda de Santa Bárbara<br />
						Zempoala Hidalgo <br />
						<img src="../lib18/images/mex.png" /> México. CP-43830 <br />
						email: <a href="mailto:upp@upp.edu.mx">upp@upp.edu.mx</a> <br />
						Tel 01 (771) 54 77 510<br />
		        <!--<a href="#">Aviso de Privacidad</a>-->
		      </address>
					<p>
						<a href="http://www.upp.edu.mx/lib18/">Web Master</a>
					</p>
				</div>
				<div class="col-md-2">
					<img src="../lib18/seph/images/footer/footer_escudo.png" class="center-block" alt="Hidalgo">
				</div>
			</div>
		</div>
	  </footer>
		</body>
		<!-- Bootstrap core JavaScript -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
