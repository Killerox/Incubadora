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
              <a class="nav-link" href="usuario.php">Estado del proyecto  <i class="fas fa-project-diagram fa-lg"></i></a>
            </li>
						<a class="nav-link" href="#">Notificaciones   <i class="far fa-envelope fa-lg"></i>
						<span class="fa-layers-counter">5</span></a>
						<li class="nav-item">
              <a class="nav-link" href="guiaDeNegocios.php">Guia de negocios  <i class="fas fa-list-ol fa-lg"></i></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="configuracion.php">Configuración  <i class="fas fa-cogs fa-lg"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../logout.php">Cerrar sesión  <i class="fas fa-sign-out-alt"></i></a>
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

					<br> <br>
					<h1 align="center"><font size="6">Completa tu información</font></h1>
					<div class="">
						<div id="signupbox" style="margin-top:50px" class="col-sm-11 col-sm-offset-2">
							<div class="panel panel-info">

								<div class="p-3 mb-2 bg-secondary text-white">
									<div class="panel-title"><h1 align="center">Sección 1: Datos Generales</h1></div>
								</div>

								<div class="panel-body" >


									<form id="signupform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">

										<div id="signupalert" style="display:none" class="alert alert-danger">
											<p>Error:</p>
											<span></span>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-6 control-label">1.1 Nombre comercial y slogan de la empresa:*</label>
											<div class="col-md-12">
												<input type="text" class="form-control" name="nombre" placeholder=""required >
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-8 control-label">1.2 Registro federal de contribuyentes de la empresa:</label>
											<div class="col-md-12">
												<input type="text" class="form-control" name="rfce" placeholder="">
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-8 control-label">1.3 CURP del responsable del proyecto:*</label>
											<div class="col-md-12">
												<input type="text" class="form-control" name="curp" placeholder="" required>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-8 control-label">1.4 FAX:</label>
											<div class="col-md-12">
												<input type="text" class="form-control" name="fax" placeholder="" value="">
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-8 control-label">1.5 ¿Cuánto tiempo lleva desarrollando su proyecto?:*</label>
											<div class="col-md-12">
												<input type="text" class="form-control" name="tiempo" placeholder="" value="" required>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-8 control-label">1.6 Apoyos recibidos</label>
											<div class="col-md-12">
                      <div class="table-responsive">
                      	<table class="table table-bordered table-hover table-condensed" align="center">
                         <tr>
                         	<th>Año</th>
													<th>Monto</th>
													<th>Tipo</th>
													<th>En qué consistió el Apoyo</th>
                         </tr>
												 <tr>
												 	<td><input type="text" class="form-control" name="apoyo[]"></td>
													<td><input type="text" class="form-control" name="apoyo[]"></td>
													<td><input type="text" class="form-control" name="apoyo[]" placeholder="Estatal/Federal"></td>
													<td><input type="text" class="form-control" name="apoyo[]" placeholder="Breve descripción de las actividades, indicar número y nombre de la convocatoria o proyecto " ></td>
												 </tr>
												 <tr>
												 	<td><input type="text" class="form-control" name="apoyo[]"></td>
													<td><input type="text" class="form-control" name="apoyo[]"></td>
													<td><input type="text" class="form-control" name="apoyo[]" placeholder="Estatal/Federal"></td>
													<td><input type="text" class="form-control" name="apoyo[]" placeholder="Breve descripción de las actividades, indicar número y nombre de la convocatoria o proyecto " ></td>
												 </tr>
                      	</table>
                      </div>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-8 control-label">1.7 Premios o galardones recibidos</label>
											<div class="col-md-12">
                      <div class="table-responsive">
                      	<table class="table table-bordered table-hover table-condensed" align="center">
                         <tr>
                         	<th>Año</th>
													<th>Monto</th>
													<th>Otorgado por</th>
													<th>¿En qué te ayudo recibirlo?</th>
                         </tr>
												 <tr>
												 	<td><input type="text" class="form-control" name="premio[]"></td>
													<td><input type="text" class="form-control" name="premio[]"></td>
													<td><input type="text" class="form-control" name="premio[]"></td>
													<td><input type="text" class="form-control" name="premio[]"></td>
												 </tr>
												 <tr>
												 	<td><input type="text" class="form-control" name="premio[]"></td>
													<td><input type="text" class="form-control" name="premio[]"></td>
													<td><input type="text" class="form-control" name="premio[]"></td>
													<td><input type="text" class="form-control" name="premio[]"></td>
												 </tr>
                      	</table>
                      </div>
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 2: Información del Proyecto</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">2.1 Descripción del Proyecto. Proporcione un breve resumen del proyecto. Máximo 2 cuartillas.*</label>
											<div class="col-md-12">
												<textarea name="descripcion" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">2.2 Objetivo del proyecto. Describa el o los objetivos de su proyecto:*</label>
											<div class="col-md-12">
												<textarea name="objetivo" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">2.3 Apoyos requeridos. Especifique el tipo de apoyo que consideren necesarios para su empresa-proyecto. Puede marcar más de una opción.*</label>
                        <div class="col-md-10">
												<input type="checkbox" name="apoyoReque[]" value="Diseño Industrial"> Diseño Industrial <br>
											  <input type="checkbox" name="apoyoReque[]" value="Diseño de imagen corporativa"> Diseño de imagen corporativa <br>
											  <input type="checkbox" name="apoyoReque[]" value="Procesos productivos"> Procesos productivos <br>
												<input type="checkbox" name="apoyoReque[]" value="Administración"> Administración <br>
												<input type="checkbox" name="apoyoReque[]" value="Propiedad industrial"> Propiedad industrial <br>
												<input type="checkbox" name="apoyoReque[]" value="Mercadotecnia"> Mercadotecnia <br>
												<input type="checkbox" name="apoyoReque[]" value="Capacitación"> Capacitación<br>
												<input type="checkbox" name="apoyoReque[]" value="Aspectos jurídicos"> Aspectos jurídicos<br>
												<input type="checkbox" name="apoyoReque[]" value="Vinculación"> Vinculación<br>
												<input type="checkbox" name="apoyoReque[]" value="Planeación estratégica"> Planeación estratégica<br>
                        <input type="password" name="apoyoReque[]" placeholder="Otro, especifique">
										 </div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">2.4 ¿Ha recibido apoyos para el financiamiento de su Proyecto en alguna institución o Secretaría? Si es así, especifique el monto y la institución que lo aportó:</label>
											<div class="col-md-12">
												<input type="password" class="form-control" name="apoyoReque2" placeholder="" value="">
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 3: Estado Tecnológico del Proyecto</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">Definición de Base Tecnológica</label>
											<div class="col-md-12">
												<p align="justify">
													La empresa de base tecnológica es aquella que incorpora al conocimiento como “materia prima” fundamental para el logro
													de sus objetivos, hasta su posterior transformación en el valor de la línea principal de un producto concreto, comercializable.
													Una empresa de base tecnológica sustenta sus estrategias de gestión y su línea de procesos, productos y servicios en nuevas
													tecnologías e involucra los desarrollos administrativos, gerenciales, económicos, financieros, de capacitación e investigación
													y desarrollo, de última generación a sus operaciones. Es un concepto transversal que no se refiere únicamente a su resultado
													final que es un producto de alto valor agregado o de alta complejidad tecnológica con capacidad de incorporarse a otras cadenas
													productivas. Una empresa de base tecnológica no se reconoce por lo que hace, sino por la forma en que hace las cosas
												</p>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">3.1 ¿Considera que su proyecto es de Base Tecnológica?*</label>
											<div class="col-md-10">
												<input type="radio"  name="tecno" placeholder="" value="Si" > Si
												<input type="radio"  name="tecno" placeholder="" value="No" > No
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">3.2 Base Tecnológica del Proyecto. En caso que la respuesta a la pregunta 3.1 haya sido afirmativa, describa las razones por las que considera que su proyecto es de base tecnológica.</label>
											<div class="col-md-12">
												<textarea name="tecnoSi" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">3.3 ¿En qué grado tecnológico considera que se encuentra su Proyecto? En que caso la respuesta a la pregunta 3.1 haya sido afirmativa, seleccione una de las siguientes opciones.</label>
                        <div class="col-md-10">
												<input type="radio"  name="grado" value="Idea"> Idea <br>
											  <input type="radio"  name="grado" value="Investigacion cientifica"> Investigacion cientifica <br>
											  <input type="radio"  name="grado" value="Desarrollo tecnológico"> Desarrollo tecnológico <br>
												<input type="radio"  name="grado" value="Prototipo"> Prototipo <br>
												<input type="radio"  name="grado" value="Producto en proceso de comercialización"> Producto en proceso de comercialización <br>
										 </div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">3.4 Innovación del Producto</label>
											<div class="col-md-12">
												<p align="justify">
												   Un producto se considera como innovación total al ser realmente novedoso, nunca antes visto en
													 el mercado. Cuando sólo se le realiza alguna adaptación o mejora se le considera como una
													 modificación. Si no presenta ninguna modificación, con respecto a lo ya existente en el mercado,
													 entonces se toma como un producto estándar.
												</p>
											</div>
											<label for="apellidos" class="col-md-12 control-label">El grado de innovación del producto o servicio que desarrolla o va a desarrollar lo considera como:</label>
                      <div class="col-md-12">
												<input type="radio"  name="inno" value="Innovación total"> Innovación total <br>
												<input type="radio"  name="inno" value="Modificación"> Modificación <br>
												<input type="radio"  name="inno" value="Producto estándar"> Producto estándar <br>
                      </div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">3.5 Intensidad Tecnológica. De acuerdo a la siguiente clasificación, marque el nivel de intensidad tecnológica en el que ubica el proyecto.</label>
											<div class="col-md-12">
                      <div class="table-responsive">
                      	<table class="table table-bordered table-hover table-condensed" align="center">
                         <tr>
                         	<th>Clasificación</th>
													<th>Marque</th>
													<th>Definición</th>
                         </tr>
												 <tr>
												 	<td>Empresa de alta intensidad tecnológica</td>
													<td><input type="radio" name="35" value="Empresa de alta intensidad tecnológica"></td>
													<td> <p align="justify">Es aquella que desarrolla, produce o vende productos o servicios dentro de un sector especializado o avanzado tecnológicamente como: Tecnologías de la Información y Comunicaciones, Microelectrónica, Biotecnología, Farmacéutico. Sus requerimientos de infraestructura física y tecnológica, así como sus mecanismos de operación son altamente especializados e involucran procesos y procedimientos innovadores.</p> </td>
												 </tr>
												 <tr>
												 	<td>Empresa de media intensidad tecnológica</td>
													<td><input type="radio" name="35" value="Empresa de media intensidad tecnológica"></td>
													<td> <p align="justify">Es aquella que desarrolla, produce o vende productos o servicios dentro de sectores semi-especializados o semi-avanzados entre los que se encuentran: automotriz, aeronáutica, plásticos, productos químicos, manufactura avanzada, líneas automatizadas de producción. Sus requerimientos de infraestructura física y tecnológica, así como sus mecanismos de operación, son especializados e involucran procesos y procedimientos que no están generalmente estandarizados, por lo que tiene que estar vinculada a centros e institutos de conocimiento. </p> </td>
												 </tr>
												 <tr>
												 	<td>Empresa de baja intensidad tecnológica</td>
													<td><input type="radio" name="35" value="Empresa de baja intensidad tecnológica"></td>
													<td> <p align="justify">Es aquella que desarrolla productos o vende productos o servicios dentro de los sectores tradicionales entre los que se encuentran: cuero, calzado, textil, confección, agroindustria, alimentos, madera, muebles, decoración, joyería, minería, construcción, comercio, servicio y otros. Sus requerimientos de infraestructura física y tecnológica, así como sus mecanismos de operación son básicos. Involucra procesos y procedimientos estandarizados, por lo cual son de fácil adopción e implantación.</p> </td>
												 </tr>
                      	</table>
                      </div>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">3.6 ¿Cuenta con instalaciones para el desarrollo de su Proyecto?</label>
											<div class="col-md-10">
												<input type="radio"  name="36" value="Si" > Si
												<input type="radio"  name="36" value="No" > No
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">3.7 En caso afirmativo, especifique con qué Instalaciones cuenta.</label>
											<div class="col-md-12">
												<textarea name="37" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">3.8 ¿Cuenta con algún equipo o maquinaria para el desarrollo de su Proyecto?</label>
											<div class="col-md-10">
												<input type="radio"  name="38" value="Si" > Si
												<input type="radio"  name="38" value="No" > No
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">3.9 En caso afirmativo, especifique con qué equipo o maquinaria cuenta.</label>
											<div class="col-md-12">
												<textarea name="39" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 4: Mercado</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">4.1 ¿Qué necesidades del mercado satisface la Empresa? Describa clara y brevemente las necesidades que atiende el producto.</label>
											<div class="col-md-12">
												<textarea name="41" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">4.2 ¿Conoce el mercado potencial para su Proyecto? Marque con una “X” en una de las siguientes casillas.</label>
											<div class="col-md-10">
												<input type="radio"  name="42" value="Si" > Si
												<input type="radio"  name="42" value="No" > No
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">4.3 En caso afirmativo, describa cuáles son las características de sus clientes potenciales</label>
											<div class="col-md-12">
												<textarea name="43" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">4.4 Ámbito de operación del Proyecto-Empresa. Indique cuál es el nivel de operación que tiene actualmente su empresa. Si aún no inicia operaciones, entonces cuál sería el proyectado.</label>
											<div class="col-md-12">
                      <div class="table-responsive">
                      	<table class="table table-bordered table-hover table-condensed" align="center">
                         <tr>
                         	<th>Nivel</th>
													<th></th>
                         </tr>
												 <tr>
												 	<td>Internacional</td>
													<td><input type="radio" name="44" value="Internacional"></td>
												 </tr>
												 <tr>
												 	<td>Nacional</td>
													<td><input type="radio" name="44" value="Nacional"></td>
												 </tr>
												 <tr>
												 	<td>Regional</td>
													<td><input type="radio" name="44" value="Regional"></td>
												 </tr>
												 <tr>
												 	<td>Estatal</td>
													<td><input type="radio" name="44" value="Estatal"></td>
												 </tr>
												 <tr>
												 	<td>Municipal</td>
													<td><input type="radio" name="44" value="Municipal"></td>
												 </tr>
                      	</table>
                      </div>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">4.5 ¿Existen en el mercado productos similares y/o sustitutos al suyo?</label>
											<div class="col-md-10">
												<input type="radio"  name="45" value="Si" > Si
												<input type="radio"  name="45" value="No" > No
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">4.6 En caso afirmativo, mencione dichos productos.</label>
											<div class="col-md-12">
												<textarea name="46" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 5: Propiedad Intelectual</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">5.1 ¿Ha realizado algún trámite de Propiedad Intelectual para su proyecto?</label>
											<div class="col-md-10">
												<input type="radio"  name="51" value="Si" > Si
												<input type="radio"  name="51" value="No" > No
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">5.2 Caso de ser afirmativo, mencione en cuál de las siguientes categorías.</label>
											<div class="col-md-12">
                      <div class="table-responsive">
                      	<table class="table table-bordered table-hover table-condensed" align="center">
                         <tr>
                         	<th>Categoría</th>
													<th></th>
                         </tr>
												 <tr>
												 	<td>Registo de marca</td>
													<td><input type="radio" name="52" value="Registo de marca"></td>
												 </tr>
												 <tr>
												 	<td>Modelo de utilidad</td>
													<td><input type="radio" name="52" value="Modelo de utilidad"></td>
												 </tr>
												 <tr>
												 	<td>Diseño industrial</td>
													<td><input type="radio" name="52" value="Diseño industrial"></td>
												 </tr>
												 <tr>
												 	<td>Secreto industrial</td>
													<td><input type="radio" name="52" value="Secreto industrial"></td>
												 </tr>
												 <tr>
												 	<td>Derecho de autor</td>
													<td><input type="radio" name="52" value="Derecho de autor"></td>
												 </tr>
												 <tr>
												 	<td>Patente</td>
													<td><input type="radio" name="52" value="Patente"></td>
												 </tr>
                      	</table>
                      </div>
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 6: Estratificación de la Empresa</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label"> De acuerdo a la siguiente tabla, indique el estrato en el que proyecta su Empresa. </label>
											<div class="col-md-12">
                      <div class="table-responsive">
                      	<table class="table table-bordered table-hover table-condensed" align="center">
													<tr>
                          	<th colspan="4">Estratificación por número de empleados</th>
                          </tr>
												 <tr>
                         	<th>Tamaño</th>
													<th>Industria</th>
													<th>Comercio</th>
													<th>Servicios</th>
                         </tr>
												 <tr>
												 	<td>MicroEmpresa</td>
													<td>0-10</td>
													<td>0-10</td>
													<td>0-10</td>
												 </tr>
												 <tr>
												 	<td>PequeñaEmpresa</td>
													<td>11-50</td>
													<td>11-30</td>
													<td>11-50</td>
												 </tr>
												 <tr>
												 	<td>MedianaEmpresa</td>
													<td>51-250</td>
													<td>31-100</td>
													<td>51-100</td>
												 </tr>
                      	</table>
                      </div>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">6.1 Marque una de las siguientes casillas.</label>
											<div class="col-md-10">
												<input type="radio"  name="61" value="Micro" > Micro
												<input type="radio"  name="61" value="Pequeña" > Pequeña
												<input type="radio"  name="61" value="Mediana" > Mediana
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">6.2 Clasificación del proyecto de acuerdo al Sector. Indique el sector al que pertenece su proyecto. Marque una de las siguientes casillas.</label>
											<div class="col-md-10">
												<input type="radio"  name="62" value="Industrial" > Industrial
												<input type="radio"  name="62" value="Comercio" > Comercio
												<input type="radio"  name="62" value="Servicios" > Servicios
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 7: Impacto del proyecto</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-10 control-label">7.1 Empleo. Indique cuántos empleos estima conservará y cuántos generará a partir de la realización del proyecto.</label>
											<div class="col-md-12">
												<p align="justify">
													- Se refiere a las personas que laboran actualmente en la empresa-proyecto y que conservarán su empleo.
													<br>
                          - Empleos que se pretende crear al final de los dos años del periodo de incubación.
												</p>
											</div>
										</div>

										<div class="form-group">
											<div class="col-md-10">
												<div class="form-check">
                           <label class="form-check-label" for="exampleCheck1">Hombres</label>
                           <input type="text" class="form-control" name="71[]" placeholder="Cantidad" value="">
                        </div>
												<div class="form-check">
                           <label class="form-check-label" for="exampleCheck1">Mujeres</label>
                           <input type="text" class="form-control" name="71[]" placeholder="Cantidad" value="">
                        </div>
											</div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">7.2 Impacto ecológico. Describa las principales consecuencias que la realización de su proyecto traería al medio ambiente. ¿Conoce la normatividad ambiental aplicable a su proyecto en el ámbito nacional e internacional?</label>
											<div class="col-md-12">
												<textarea name="72" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 8: Documentación de Respaldo</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">8.1 ¿Con qué documentación de apoyo cuenta su Proyecto? Dicha documentación deberá ser entregada junto con esta cédula. Marque en las casillas según corresponda.</label>
											<div class="col-md-12">
                      <div class="table-responsive">
                      	<table class="table table-bordered table-hover table-condensed" align="center">
                         <tr>
                         	<th>Documento</th>
													<th></th>
                         </tr>
												 <tr>
												 	<td>Cotizaciones</td>
													<td><input type="checkbox" name="81[]" value="Cotizaciones"></td>
												 </tr>
												 <tr>
												 	<td>Planos</td>
													<td><input type="checkbox" name="81[]" value="Planos"></td>
												 </tr>
												 <tr>
												 	<td>Programas de trabajo</td>
													<td><input type="checkbox" name="81[]" value="Programas de trabajo"></td>
												 </tr>
												 <tr>
												 	<td>Estudio de Factibilidad Técnico</td>
													<td><input type="checkbox" name="81[]" value="Estudio de Factibilidad Técnico"></td>
												 </tr>
												 <tr>
												 	<td>Estudio de Factibilidad Económico</td>
													<td><input type="checkbox" name="81[]" value="Estudio de Factibilidad Económico"></td>
												 </tr>
												 <tr>
												 <td>Estudio de Mercado</td>
												 <td><input type="checkbox" name="81[]" value="Estudio de Mercado"></td>
												</tr>
												<tr>
												<td>Plan de Negocios</td>
												<td><input type="checkbox" name="81[]" value="Plan de Negocios"></td>
											 </tr>
											 <tr>
											 <td>Plan de Mercadotecnia</td>
											 <td><input type="checkbox" name="81[]" value="Plan de Mercadotecnia"></td>
											</tr>
											<tr>
											<td>Proyecto en Extenso</td>
											<td><input type="checkbox" name="81[]" value="Proyecto en Extenso"></td>
										 </tr>
										 <tr>
										 <td>Ninguno</td>
										 <td><input type="checkbox" name="81[]" value="Ninguno"></td>
										</tr>
										<tr>
										<td>Otro</td>
										<td><input type="text" name="81[]"></td>
									 </tr>
                      	</table>
                      </div>
											</div>
										</div>

										<div class="p-3 mb-2 bg-secondary text-white">
											<div class="panel-title"><h1 align="center">Sección 9: Compromisos de Trabajo</h1></div>
										</div>

										<div class="form-group">
											<label for="apellidos" class="col-md-12 control-label">9.1 Horario de trabajo. Indique cuántas horas dedicaría semanalmente a su proyecto-empresa.</label>
											<div class="col-md-12">
												<textarea name="91" rows="8" cols="80" maxlength="1500"></textarea>
											</div>
										</div>

										<div class="row w-100 align-items-center">
											<div class="col text-center">
												<button type="submit" class="btn btn-primary" >
												Enviar
												</button>
											</div>
										</div>
											</form>

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
