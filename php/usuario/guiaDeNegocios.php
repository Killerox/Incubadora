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

//Datos del usuario usuario
$sql = "SELECT folio, Pnombre, nombre, sector1, sector2 FROM registroproyecto WHERE folio = '$folio'";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();

//Datos de la primera tabla
$sql1 = "SELECT estado, fecha FROM punto1 WHERE folio = '$folio'";
$result1 = $mysqli->query($sql1);
$row1 = $result1->fetch_assoc();

$sql2 = "SELECT estado, fecha FROM punto2 WHERE folio = '$folio'";
$result2 = $mysqli->query($sql2);
$row2 = $result2->fetch_assoc();

$sql3 = "SELECT estado, fecha FROM punto3 WHERE folio = '$folio'";
$result3 = $mysqli->query($sql3);
$row3 = $result3->fetch_assoc();

$sql4 = "SELECT estado, fecha FROM punto4 WHERE folio = '$folio'";
$result4 = $mysqli->query($sql4);
$row4 = $result4->fetch_assoc();

$sql5 = "SELECT estado, fecha FROM punto5 WHERE folio = '$folio'";
$result5 = $mysqli->query($sql5);
$row5 = $result5->fetch_assoc();

$sql6 = "SELECT estado, fecha FROM punto6 WHERE folio = '$folio'";
$result6 = $mysqli->query($sql6);
$row6 = $result6->fetch_assoc();

$sql7 = "SELECT estado, fecha FROM punto7 WHERE folio = '$folio'";
$result7 = $mysqli->query($sql7);
$row7 = $result7->fetch_assoc();

$sql8 = "SELECT estado, fecha FROM punto8 WHERE folio = '$folio'";
$result8 = $mysqli->query($sql8);
$row8 = $result8->fetch_assoc();

$sql9 = "SELECT estado, fecha FROM punto9 WHERE folio = '$folio'";
$result9 = $mysqli->query($sql9);
$row9 = $result9->fetch_assoc();

$sql10 = "SELECT estado, fecha FROM punto10 WHERE folio = '$folio'";
$result10 = $mysqli->query($sql10);
$row10 = $result10->fetch_assoc();

$sql11 = "SELECT estado, fecha FROM punto11 WHERE folio = '$folio'";
$result11 = $mysqli->query($sql11);
$row11 = $result11->fetch_assoc();

$sql12 = "SELECT estado, fecha FROM punto12 WHERE folio = '$folio'";
$result12 = $mysqli->query($sql12);
$row12 = $result12->fetch_assoc();

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
    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>



  </head>
  <script type="text/javascript">
	  function iniciar(){
			document.getElementById("tabla1").style.display = "none";
			document.getElementById("tabla2").style.display = "none";
			document.getElementById("tabla3").style.display = "none";
			document.getElementById("tabla4").style.display = "none";
			document.getElementById("tabla5").style.display = "none";
			document.getElementById("tabla6").style.display = "none";
			document.getElementById("tabla7").style.display = "none";
			document.getElementById("tabla8").style.display = "none";
			document.getElementById("tabla9").style.display = "none";
			document.getElementById("tabla10").style.display = "none";
			document.getElementById("tabla11").style.display = "none";
			document.getElementById("tabla12").style.display = "none";
			document.getElementById("tabla13").style.display = "none";

		 var estado1 = '<?= addslashes($row1['estado']) ?>';
		 if (estado1 == "") {
			 var btnModi1 = document.getElementById("btnModificar1");
 			 btnModi1.disabled = true;

		 }else if (estado1 == "Esperando revisión" || estado1 == "Modificar") {
			var btnNuevo1 = document.getElementById("btnNuevo1");
 			btnNuevo1.disabled = true;

		}else {
			var btnModi1 = document.getElementById("btnModificar1");
			btnModi1.disabled = true;
			var btnNuevo1 = document.getElementById("btnNuevo1");
 			btnNuevo1.disabled = true;
     }

		 var estado2 = '<?= addslashes($row2['estado']) ?>'; ///
		 if (estado2 == "") {
			 var btnModi2 = document.getElementById("btnModificar2");
 			 btnModi2.disabled = true;

     }else if (estado2 == "Esperando revisión" || estado2 == "Modificar") {
			 var btnNuevo2 = document.getElementById("btnNuevo2");
  		 btnNuevo2.disabled = true;

     }else {
			 var btnModi2 = document.getElementById("btnModificar2");
 			 btnModi2.disabled = true;
 			 var btnNuevo2 = document.getElementById("btnNuevo2");
  		 btnNuevo2.disabled = true;
     }

		 var estado3 = '<?= addslashes($row3['estado']) ?>';
     if (estado3 == "") {
			 var btnModi3 = document.getElementById("btnModificar3");
 			 btnModi3.disabled = true;

     }else if (estado3 == "Esperando revisión" || estado3 == "Modificar") {
			 var btnNuevo3 = document.getElementById("btnNuevo3");
  		 btnNuevo3.disabled = true;

		 }else{
			 var btnModi3 = document.getElementById("btnModificar3");
 			 btnModi3.disabled = true;
 			 var btnNuevo3 = document.getElementById("btnNuevo3");
  		 btnNuevo3.disabled = true;
		 }

		 var estado4 = '<?= addslashes($row4['estado']) ?>';
     if (estado4 == "") {
			 var btnModi4 = document.getElementById("btnModificar4");
 			 btnModi4.disabled = true;

     }else if (estado4 == "Esperando revisión" || estado4 == "Modificar") {
			 var btnNuevo4 = document.getElementById("btnNuevo4");
  		 btnNuevo4.disabled = true;

		 }else{
			 var btnModi4 = document.getElementById("btnModificar4");
 			 btnModi4.disabled = true;
 			 var btnNuevo4 = document.getElementById("btnNuevo4");
  		 btnNuevo4.disabled = true;
		 }

		 var estado5 = '<?= addslashes($row5['estado']) ?>';
     if (estado5 == "") {
			 var btnModi5 = document.getElementById("btnModificar5");
 			 btnModi5.disabled = true;

     }else if (estado5 == "Esperando revisión" || estado5 == "Modificar") {
			 var btnNuevo5 = document.getElementById("btnNuevo5");
  		 btnNuevo5.disabled = true;

		 }else{
			 var btnModi5 = document.getElementById("btnModificar5");
 			 btnModi5.disabled = true;
 			 var btnNuevo5 = document.getElementById("btnNuevo5");
  		 btnNuevo5.disabled = true;
		 }

		 var estado6 = '<?= addslashes($row6['estado']) ?>';
     if (estado6 == "") {
			 var btnModi6 = document.getElementById("btnModificar6");
 			 btnModi6.disabled = true;

     }else if (estado6 == "Esperando revisión" || estado6 == "Modificar") {
			 var btnNuevo6 = document.getElementById("btnNuevo6");
  		 btnNuevo6.disabled = true;

		 }else{
			 var btnModi6 = document.getElementById("btnModificar6");
 			 btnModi6.disabled = true;
 			 var btnNuevo6 = document.getElementById("btnNuevo6");
  		 btnNuevo6.disabled = true;
		 }

		 var estado7 = '<?= addslashes($row7['estado']) ?>';
     if (estado7 == "") {
			 var btnModi7 = document.getElementById("btnModificar7");
 			 btnModi7.disabled = true;

     }else if (estado7 == "Esperando revisión" || estado7 == "Modificar") {
			 var btnNuevo7 = document.getElementById("btnNuevo7");
  		 btnNuevo7.disabled = true;

		 }else{
			 var btnModi7 = document.getElementById("btnModificar7");
 			 btnModi7.disabled = true;
 			 var btnNuevo7 = document.getElementById("btnNuevo7");
  		 btnNuevo7.disabled = true;
		 }

		 var estado8 = '<?= addslashes($row8['estado']) ?>';
     if (estado8 == "") {
			 var btnModi8 = document.getElementById("btnModificar8");
 			 btnModi8.disabled = true;

     }else if (estado8 == "Esperando revisión" || estado8 == "Modificar") {
			 var btnNuevo8 = document.getElementById("btnNuevo8");
  		 btnNuevo8.disabled = true;

		 }else{
			 var btnModi8 = document.getElementById("btnModificar8");
 			 btnModi8.disabled = true;
 			 var btnNuevo8 = document.getElementById("btnNuevo8");
  		 btnNuevo8.disabled = true;
		 }

		 var estado9 = '<?= addslashes($row9['estado']) ?>';
     if (estado9 == "") {
			 var btnModi9 = document.getElementById("btnModificar9");
 			 btnModi9.disabled = true;

     }else if (estado9 == "Esperando revisión" || estado9 == "Modificar") {
			 var btnNuevo9 = document.getElementById("btnNuevo9");
  		 btnNuevo9.disabled = true;

		 }else{
			 var btnModi9 = document.getElementById("btnModificar9");
 			 btnModi9.disabled = true;
 			 var btnNuevo9 = document.getElementById("btnNuevo9");
  		 btnNuevo9.disabled = true;
		 }

		 var estado10 = '<?= addslashes($row10['estado']) ?>';
     if (estado10 == "") {
			 var btnModi10 = document.getElementById("btnModificar10");
 			 btnModi10.disabled = true;

     }else if (estado10 == "Esperando revisión" || estado10 == "Modificar") {
			 var btnNuevo10 = document.getElementById("btnNuevo10");
  		 btnNuevo10.disabled = true;

		 }else{
			 var btnModi10 = document.getElementById("btnModificar10");
 			 btnModi10.disabled = true;
 			 var btnNuevo10 = document.getElementById("btnNuevo10");
  		 btnNuevo10.disabled = true;
		 }

		 var estado11 = '<?= addslashes($row11['estado']) ?>';
     if (estado11 == "") {
			 var btnModi11 = document.getElementById("btnModificar11");
 			 btnModi11.disabled = true;

     }else if (estado11 == "Esperando revisión" || estado11 == "Modificar") {
			 var btnNuevo11 = document.getElementById("btnNuevo11");
  		 btnNuevo11.disabled = true;

		 }else{
			 var btnModi11 = document.getElementById("btnModificar11");
 			 btnModi11.disabled = true;
 			 var btnNuevo11 = document.getElementById("btnNuevo11");
  		 btnNuevo11.disabled = true;
		 }

		 var estado12 = '<?= addslashes($row12['estado']) ?>';
     if (estado12 == "") {
			 var btnModi12 = document.getElementById("btnModificar12");
 			 btnModi12.disabled = true;

     }else if (estado12 == "Esperando revisión" || estado12 == "Modificar") {
			 var btnNuevo12 = document.getElementById("btnNuevo12");
  		 btnNuevo12.disabled = true;

		 }else{
			 var btnModi12 = document.getElementById("btnModificar12");
 			 btnModi12.disabled = true;
 			 var btnNuevo12 = document.getElementById("btnNuevo12");
  		 btnNuevo12.disabled = true;
		 }
		}

    function mostrar(estado){
			var tabla = estado;
			document.getElementById(estado).style.display = "block";
		}
		function ocultar(estado){
			var tabla = estado;
			document.getElementById(estado).style.display = "none";
		}

		function clickaction( b ){
			var tabla1 = 	document.getElementById("tabla1");
			var tabla2 = 	document.getElementById("tabla2");
			var tabla3 = 	document.getElementById("tabla3");
			var tabla4 = 	document.getElementById("tabla4");
			var tabla5 = 	document.getElementById("tabla5");
			var tabla6 = 	document.getElementById("tabla6");
			var tabla7 = 	document.getElementById("tabla7");
			var tabla8 = 	document.getElementById("tabla8");
			var tabla9 = 	document.getElementById("tabla9");
			var tabla10 = 	document.getElementById("tabla10");
			var tabla11 = 	document.getElementById("tabla11");
			var tabla12 = 	document.getElementById("tabla12");
			var tabla13 = 	document.getElementById("tabla13");

			switch (b.id) {
				case "boton1":
				      if(tabla1.style.display == "none"){
					    var estado = "tabla1";
					    mostrar(estado);
					    document.getElementById("boton1").value = "Ocultar";
			       	}
				       else {
					     var estado = "tabla1";
					     ocultar(estado);
					     document.getElementById("boton1").value = "Mostrar";
				       }
					  break;

						case "boton2":
						if(tabla2.style.display == "none"){
							var estado = "tabla2";
							mostrar(estado);
							document.getElementById("boton2").value = "Ocultar";
						}
						else {
							var estado = "tabla2";
							ocultar(estado);
							document.getElementById("boton2").value = "Mostrar";
						}
						break;

						case "boton3":
						if(tabla3.style.display == "none"){
							var estado = "tabla3";
							mostrar(estado);
							document.getElementById("boton3").value = "Ocultar";
						}
						else {
							var estado = "tabla3";
							ocultar(estado);
							document.getElementById("boton3").value = "Mostrar";
						}
						break;

						case "boton4":
						if(tabla4.style.display == "none"){
							var estado = "tabla4";
							mostrar(estado);
							document.getElementById("boton4").value = "Ocultar";
						}
						else {
							var estado = "tabla4";
							ocultar(estado);
							document.getElementById("boton4").value = "Mostrar";
						}
						break;

						case "boton5":
						if(tabla5.style.display == "none"){
							var estado = "tabla5";
							mostrar(estado);
							document.getElementById("boton5").value = "Ocultar";
						}
						else {
							var estado = "tabla5";
							ocultar(estado);
							document.getElementById("boton5").value = "Mostrar";
						}
						break;

						case "boton6":
						if(tabla6.style.display == "none"){
							var estado = "tabla6";
							mostrar(estado);
							document.getElementById("boton6").value = "Ocultar";
						}
						else {
							var estado = "tabla6";
							ocultar(estado);
							document.getElementById("boton6").value = "Mostrar";
						}
						break;

						case "boton7":
						if(tabla7.style.display == "none"){
							var estado = "tabla7";
							mostrar(estado);
							document.getElementById("boton7").value = "Ocultar";
						}
						else {
							var estado = "tabla7";
							ocultar(estado);
							document.getElementById("boton7").value = "Mostrar";
						}
						break;

						case "boton8":
						if(tabla8.style.display == "none"){
							var estado = "tabla8";
							mostrar(estado);
							document.getElementById("boton8").value = "Ocultar";
						}
						else {
							var estado = "tabla8";
							ocultar(estado);
							document.getElementById("boton8").value = "Mostrar";
						}
						break;

						case "boton9":
						if(tabla9.style.display == "none"){
							var estado = "tabla9";
							mostrar(estado);
							document.getElementById("boton9").value = "Ocultar";
						}
						else {
							var estado = "tabla9";
							ocultar(estado);
							document.getElementById("boton9").value = "Mostrar";
						}
						break;

						case "boton10":
						if(tabla10.style.display == "none"){
							var estado = "tabla10";
							mostrar(estado);
							document.getElementById("boton10").value = "Ocultar";
						}
						else {
							var estado = "tabla10";
							ocultar(estado);
							document.getElementById("boton10").value = "Mostrar";
						}
						break;

						case "boton11":
						if(tabla11.style.display == "none"){
							var estado = "tabla11";
							mostrar(estado);
							document.getElementById("boton11").value = "Ocultar";
						}
						else {
							var estado = "tabla11";
							ocultar(estado);
							document.getElementById("boton11").value = "Mostrar";
						}
						break;

						case "boton12":
						if(tabla12.style.display == "none"){
							var estado = "tabla12";
							mostrar(estado);
							document.getElementById("boton12").value = "Ocultar";
						}
						else {
							var estado = "tabla12";
							ocultar(estado);
							document.getElementById("boton12").value = "Mostrar";
						}
						break;

						case "boton13":
						if(tabla13.style.display == "none"){
							var estado = "tabla13";
							mostrar(estado);
							document.getElementById("boton13").value = "Ocultar";
						}
						else {
							var estado = "tabla13";
							ocultar(estado);
							document.getElementById("boton13").value = "Mostrar";
						}
						break;
				default:

			}
		}
			//if(tabla1.style.display == "none"){
				//mostrar();
				//document.getElementById("boton").value = "Ocultar";
			//}
			//else {
				//ocultar();
				//document.getElementById("boton").value = "Mostrar";
			//}
		//}

  </script>

  <body onload="iniciar()">

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
            <li class="nav-item ">
              <a class="nav-link" href="usuario.php">Estado del proyecto</a>
            </li>
						<li class="nav-item active">
              <a class="nav-link" >Guia de negocios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="configuracion.php">Configuracion</a>
            </li>
            <li class="nav-item">
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

          <h1 class="my-4"><font size="6"><?php echo utf8_decode($row['Pnombre']); ?></font></h1>
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
					<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
						<div class="panel-title col-md-9">1.- Descripción de la empresa
							<input onclick="clickaction(this)" id="boton1" type="submit" value="Mostrar" class="btn btn-success" align="right"><i class="icon-hand-right"></i>
						</div>
					</div>

					<div class="table-responsive">
						<br>
							<table id="tabla1" class="table table-bordered table-hover table-condensed" align="center">
								 <tr class="info" >
										 <th>Estado</th>
										 <th>Fecha</th>
										 <th></th>
										 <th></th>

								 </tr>
								<tr>
								<?php

								if ($row1['estado']==null) {
									$aux = "No enviado";
								}else {
								  $aux = $row1['estado'];
								}
								echo "<td align='center'>"; echo $aux; "</td>";
								if ($row1['fecha']==null) {
									$aux1 = "No enviado";
								}else {
									$aux1 = $row1['fecha'];
								}
								$aux = 1;
								echo "<td align='center'>"; echo $aux1; "</td>";

								echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo1' class='btn btn-success'>Nuevo</button></a></td>";
								echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar1' class='btn btn-success'>Modificar</button></a></td>";
								?>
						   </tr>
				</table>
		</div>

		<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
			<div class="panel-title col-md-9">2.- Descripción del entorno
				<input id="boton2" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
			</div>
		</div>

		<div class="table-responsive">
			<br>
				<table id="tabla2" class="table table-bordered table-hover table-condensed" align="center">
					 <tr class="info" >
							 <th>Estado</th>
							 <th>Fecha</th>
							 <th></th>
							 <th></th>

					 </tr>
					<tr>
					<?php

					if ($row2['estado']==null) {
						$aux = "No enviado";
					}else {
						$aux = $row2['estado'];
					}
					echo "<td align='center'>"; echo $aux; "</td>";
					if ($row2['fecha']==null) {
						$aux1 = "No enviado";
					}else {
						$aux1 = $row2['fecha'];
					}
					$aux=2;
					echo "<td align='center'>"; echo $aux1; "</td>";
					echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo2' class='btn btn-success'>Nuevo</button></a></td>";
					echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar2' class='btn btn-success'>Modificar</button></a></td>";
					?>
				 </tr>
	</table>
	</div>

	<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
		<div class="panel-title col-md-12">3.- Análisis del producto y su mercado
			<input id="boton3" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
		</div>
	</div>

	<div class="table-responsive">
		<br>
			<table id="tabla3" class="table table-bordered table-hover table-condensed" align="center">
				 <tr class="info" >
						 <th>Estado</th>
						 <th>Fecha</th>
						 <th></th>
						 <th></th>

				 </tr>
				<tr>
				<?php

				if ($row3['estado']==null) {
					$aux = "No enviado";
				}else {
					$aux = $row3['estado'];
				}
				echo "<td align='center'>"; echo $aux; "</td>";
				if ($row3['fecha']==null) {
					$aux1 = "No enviado";
				}else {
					$aux1 = $row3['fecha'];
				}
				$aux=3;
				echo "<td align='center'>"; echo $aux1; "</td>";
				echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo3' class='btn btn-success'>Nuevo</button></a></td>";
				echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar3' class='btn btn-success'>Modificar</button></a></td>";

				?>
			 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">4.- Estrategia de mercadotecnia
		<input id="boton4" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla4" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row4['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row4['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row4['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row4['fecha'];
			}
			$aux=4;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo4' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar4' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">5.- Plan de venta
		<input id="boton5" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla5" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row5['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row5['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row5['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row5['fecha'];
			}
			$aux=5;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo5' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar5' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">6.- Plan de operaciones del proyecto
		<input id="boton6" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla6" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row6['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row6['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row6['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row6['fecha'];
			}
			$aux=6;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo6' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar6' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">7.- Recursos humanos
		<input id="boton7" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla7" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row7['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row7['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row7['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row7['fecha'];
			}
			$aux=7;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo7' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar7' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">8.- Aspectos legales
		<input id="boton8" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla8" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row8['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row8['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row8['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row8['fecha'];
			}
			$aux=8;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo8' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar8' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">9.- Planes de lanzamiento
		<input id="boton9" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla9" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row9['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row9['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row9['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row9['fecha'];
			}
			$aux = 9;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo9' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar9' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">10.- Plan financiero y evaluación de proyectos
		<input id="boton10" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla10" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row10['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row10['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row10['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row10['fecha'];
			}
			$aux = 10;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo10' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar10' class='btn btn-success'>Modificar</button></a></td>";

			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">11.- Plan de inversión y financiamiento
		<input id="boton11" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla11" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row11['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row11['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row11['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row11['fecha'];
			}
			$aux = 11;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo11' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar11' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">12.- Conclusiones
		<input id="boton12" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla12" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row12['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row12['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row12['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row12['fecha'];
			}
			$aux = 12;
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnNuevo12' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='editarP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar12' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
</div>

<div class="p-2 mb-1 bg-secondary text-white col-lg-7">
	<div class="panel-title col-md-12">13.- Anexos
		<input id="boton13" type="submit" value="Mostrar" class="btn btn-success" onclick="clickaction(this)"><i class="icon-hand-right"></i>
	</div>
</div>

<div class="table-responsive">
	<br>
		<table id="tabla13" class="table table-bordered table-hover table-condensed" align="center">
			 <tr class="info" >
					 <th>Estado</th>
					 <th>Fecha</th>
					 <th></th>
					 <th></th>

			 </tr>
			<tr>
			<?php

			if ($row1['estado']==null) {
				$aux = "No enviado";
			}else {
				$aux = $row1['estado'];
			}
			echo "<td align='center'>"; echo $aux; "</td>";
			if ($row1['fecha']==null) {
				$aux1 = "No enviado";
			}else {
				$aux1 = $row1['fecha'];
			}
			echo "<td align='center'>"; echo $aux1; "</td>";
			echo "<td align='center'><a href='eliminar.php?id=".$row['folio']."'><button type='button' class='btn btn-success'>Nuevo</button></a></td>";
			echo "<td align='center'><a href='registroP.php?id=".$row['folio']."&punto=".$aux."'><button type='button' id='btnModificar13' class='btn btn-success'>Modificar</button></a></td>";
			?>
		 </tr>
</table>
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
