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
$punto = $_GET['punto'];

$sql = "SELECT folio, Pnombre, nombre, sector1, sector2 FROM registroproyecto WHERE folio = '$folio'";
$result = $mysqli->query($sql);

$row = $result->fetch_assoc();

#$bdproyecto = "SELECT * FROM  registroproyecto";
#$resbdproyecto = $mysqli->query($bdproyecto);
#$titulo;

if($punto=="1"){
	$titulo = htmlentities("Descripción de la empresa", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto1 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="2") {

  $titulo = htmlentities("Descripción del entorno", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto2 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="3") {

	$titulo = htmlentities("Análisis del producto y su mercado", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto3 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="4") {

	$titulo = htmlentities("Estrategia de mercadotecnia", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto4 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="5") {

	$titulo = htmlentities("Plan de ventas", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto5 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="6") {

	$titulo = htmlentities("Plan de operaciones del proyecto", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto6 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="7") {

	$titulo = htmlentities("Recursos humanos", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto7 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="8") {

	$titulo = htmlentities("Aspectos legales", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto8 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="9") {

	$titulo = htmlentities("Planes de lanzamiento", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto9 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="10") {

	$titulo = htmlentities("Plan financiero y evaluación de lproyecto", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto10 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="11") {

	$titulo = htmlentities("Plan de inversión y financiamiento", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto11 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

}elseif ($punto=="12") {

	$titulo = htmlentities("Conclusiones", ENT_COMPAT, 'UTF-8');
	$modal = "SELECT nombre_punto, ejemplo FROM guianegocios WHERE numero = '$punto'";
	$result_m = $mysqli->query($modal);
	$mod = $result_m->fetch_assoc();
	$ejemplos = $mod['ejemplo'];
	$name = $mod['nombre_punto'];
	$_SESSION["punto"] = $punto;
	$query = "SELECT * FROM punto12 WHERE folio = '$folio'";
	$result = $mysqli->query($query);
	$mod1 = $result->fetch_assoc();
	$content = $mod1['informacion'];

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

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perfil</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->

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
        <a class="navbar-brand" href="#"><?php echo ''.utf8_decode($titulo); ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
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

          <h2 class="my-4"><font size="6"><?php echo utf8_decode($row['Pnombre']); ?></font></h1>
          <div class="list-group">
            <a href="#" class="list-group-item"><?php echo utf8_decode($row['sector1']); ?></a>
            <a href="#" class="list-group-item"><?php echo utf8_decode($row['sector2']); ?></a>
          </div>
          <br>
          <br>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
					<br>
					<h1 align="center"><font size="6">Completa todo el proceso</font></h1>
					<div class="form-group">
					<p>Describe todos los incisos de la forma mas explicita posible, a continuación podrás consultar un
					un ejemplo practico de como tienes que llenar los datos. Despues de llenar los datos de forma correcta
				  tu acesor evaluara tu trabajo y se te notificara.</p>
					<!-- Button trigger modal -->
    		  <div class="row w-100 align-items-center">
    		   	<div class="col text-center">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		          Ejemplo
		          </button>
    			  </div>
    	   	</div>
					</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?php echo htmlentities($mod['nombre_punto'],ENT_COMPAT,'UTF-8'); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo($ejemplos); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

         <div class="form-group">
         <form action="editarPunto.php" method="post" enctype="multipart/form-data">
					 <textarea name="editor" id="editor" rows="10" cols="400" class="ckeditor" required><?php echo $content ?></textarea>
           <br>
					 <div class="row w-100 align-items-center">
     		   	<div class="col text-center">
							<?php $punto; ?>
 							<button type="submit" class="btn btn-primary" >
 		          Actualizar
 		          </button>
     			  </div>
     	   	</div>
         </form>

         </div>

        </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
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
