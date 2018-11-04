<?php
require 'conexion.php';
require 'funcs.php';

$errors = array();

if (!empty($_POST)) {

  $Pnombre = $mysqli->real_escape_string($_POST['Pnombre']);
	$nombre = $mysqli->real_escape_string($_POST['nombre']);
	$direccion = $mysqli->real_escape_string($_POST['direccion']);
  $colonia = $mysqli->real_escape_string($_POST['colonia']);
	$municipio = $mysqli->real_escape_string($_POST['municipio']);
	$cp = $mysqli->real_escape_string($_POST['cp']);
	$estado = $mysqli->real_escape_string($_POST['estado']);
	$telefono = $mysqli->real_escape_string($_POST['telefono']);
	$email = $mysqli->real_escape_string($_POST['email']);
	$procedencia = $mysqli->real_escape_string($_POST['procedencia']);
	$legal = $mysqli->real_escape_string($_POST['legal']);
	$sector = $mysqli->real_escape_string($_POST['sector']);
	$sector1 = $mysqli->real_escape_string($_POST['sector1']);
	$sector2 = $mysqli->real_escape_string($_POST['sector2']);
	$medio = $mysqli->real_escape_string($_POST['medio']);
  $otro = $mysqli->real_escape_string($_POST['otro']);
	$involucradas = $mysqli->real_escape_string($_POST['involu']);
  #$domicilio = $_FILES['domicilio']['tmp_name'];

  ini_set('date.timezone', 'America/Mexico_City');
  $time = date('Y-m-d, H:i:s', time());

  $rows = $mysqli->query("SELECT * from registroproyecto");
  $row_cnt = $rows->num_rows;

  $folio = generarFolio($row_cnt,date("Y"));
  $domi=0;
  $ide=0;
	$activo=0;

	$cor=correoExiste($email);
  if($cor==false)
  {
  $registro = registrarProyecto($folio, $Pnombre, $nombre, $direccion, $colonia, $municipio, $cp, $estado, $telefono, $email, $procedencia, $legal, $sector, $sector1, $sector2, $medio, $otro, $ide, $domi, $time, $activo);

  #$mysqli->commit();

 $id_insert = $mysqli->insert_id;

 if($_FILES["domicilio"]["error"]>0 && $_FILES["identificacion"]["error"]>0){
  $errors[] = "Error al cargar archivo, puede que tu archivo sea demasiado grande";
  } else {

  $permitidos = array("application/pdf");
  $limite_kb = 1000;

  if(in_array($_FILES["domicilio"]["type"], $permitidos) && $_FILES["domicilio"]["size"] <= $limite_kb * 1024 && in_array($_FILES["identificacion"]["type"], $permitidos) && $_FILES["identificacion"]["size"] <= $limite_kb * 1024){

    $ruta = 'files/'.$id_insert.'/';
    $archivo1 = $ruta.$_FILES["domicilio"]["name"];
    $archivo2 = $ruta.$_FILES["identificacion"]["name"];

    if(!file_exists($ruta)){
      mkdir($ruta,0777, true);
    }

    if(!file_exists($archivo1) && !file_exists($archivo2)){

      $resultado1 = @move_uploaded_file($_FILES["domicilio"]["tmp_name"], $archivo1);
      $resultado2 = @move_uploaded_file($_FILES["identificacion"]["tmp_name"], $archivo2);

      if($resultado1 && $resultado2){
        #$id_insert = $mysqli->insert_id;
        $stmt = "UPDATE registroproyecto SET domicilio = '$archivo1', identificacion = '$archivo2'  WHERE id_proyecto='$id_insert'" ;

        $resultado = mysqli_query($mysqli, $stmt);
    		if(!$resultado){$errors = "Archivo Guardado";}

        } else {
        $errors[]="Error al guardar archivo";
      }

      } else {
      $errors[]="Archivo ya existe";
    }

    } else {
    $errors[]="Archivo no permitido o excede el tamaño";
  }

   $res=$ruta;
  if($registro > 0){

  echo "<script type='text/javascript'>
  alert('Usuario registrado exitosamente');
  </script>";

  #header("location: registroP2.php");
  if($involucradas == "Si"){
    header("location: registroP2.php?id=".$folio."&ruta=".$res."");
    $mysqli->commit();
  }else{
    header("location: cartaIntencion.php?id=".$folio."&ruta=".$res."");
    $mysqli->commit();
  }

}else {
  $mysqli->rollback();
	$errors[] = "Error al registrar";
   }

  }

}else{
	$errors[] = " El correo ya fue registrado, intente con uno difernte ";
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
<!-- <link href="../lib18/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
Estilo SEP HIDALGO -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
	  <br> <br> 
    <?php echo resultBlock($errors); ?>
		<br> <br>
		<h1 align="center">Registrar proyecto</h1>
		<div class="container col-md-7">
			<div id="signupbox" style="margin-top:50px" class="col-sm-10 col-sm-offset-2">
				<div class="panel panel-info">

					<div class="p-3 mb-2 bg-secondary text-white">
						<div class="panel-title">Registrar proyecto</div>
					</div>

					<div class="container p-4" >

						<form class="form-horizontal" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" autocomplete="off" enctype="multipart/form-data">

							<div id="signupalert" style="display:none" class="alert alert-danger">
								<p>Error:</p>
								<span></span>
							</div>

							<div class="form-group">
								<label for="nombre" class="col-md-8 control-label">Nombre del proyecto:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="Pnombre" name="Pnombre" placeholder="Nombre" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-9 control-label">Nombre del responsable del proyecto:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre y apellidos" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Dirección:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Colonia:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="colonia" id="colonia" placeholder="Colonia" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Municipio:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="municipio" id="municipio" placeholder="Municipio" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">C.P.:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="cp" id="cp" placeholder="C.P." required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Estado:</label>
                <div class="col-md-9">
								<select  class="form-control" name="estado" id="estado">
                <option value="Aguascalientes">Aguascalientes</option>
                <option value="Baja California">Baja California</option>
                <option value="Baja California Sur">Baja California Sur</option>
                <option value="Campeche">Campeche</option>
                <option value="Chiapas">Chiapas</option>
                <option value="Chihuahua">Chihuahua</option>
                <option value="Coahuila">Coahuila</option>
                <option value="Colima">Colima</option>
                <option value="Ciudad de México">Ciudad de México</option>
                <option value="Durango">Durango</option>
                <option value="Guanajuato">Guanajuato</option>
                <option value="Guerrero">Guerrero</option>
                <option value="Hidalgo">Hidalgo</option>
                <option value="Jalisco">Jalisco</option>
                <option value="México">México</option>
                <option value="Michoacán">Michoacán</option>
                <option value="Morelos">Morelos</option>
                <option value="Nayarit">Nayarit</option>
                <option value="Nuevo León">Nuevo León</option>
                <option value="Oaxaca">Oaxaca</option>
                <option value="Puebla">Puebla</option>
                <option value="Querétaro">Querétaro</option>
                <option value="Quintana Roo">Quintana Roo</option>
                <option value="San Luis Potosí">San Luis Potosí</option>
                <option value="Sinaloa">Sinaloa</option>
                <option value="Sonora">Sonora</option>
                <option value="Tabasco">Tabasco</option>
                <option value="Tamaulipas">Tamaulipas</option>
                <option value="Tlaxcala">Tlaxcala</option>
                <option value="Veracruz">Veracruz</option>
                <option value="Yucatán">Yucatán</option>
               <option value="Zacatecas">Zacatecas</option>
             </select>
           </div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Telefono:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="telefono" id="telefono" placeholder="Telefono" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-5 control-label">Correo electronico:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="email" id="email" placeholder="Correo electronico" required >
								</div>
							</div>

							<div class="form-group">
								<label for="apellidos" class="col-md-3 control-label">Procedencia:</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="procedencia" id="procedencia" placeholder="Procedencia" required >
								</div>
							</div>
              <br><br>
              <div class="form-group">
								<label for="apellidos" class="col-md-9 control-label">¿Hay mas personas involucradas en el proyecto?</label>
							</div>

							<div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="involu" id="involu" value="Si">
                <label class="form-check-label" for="exampleRadios2">
                Si
                </label>
              </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="involu" id="involu" value="No">
              <label class="form-check-label" for="exampleRadios2">
              No
             </label>
            </div>
              <br><br><br><br>
							<div class="form-group">
								<label for="apellidos" class="col-md-9 control-label">¿Su proyecto está constituido legalmente como empresa?</label>
							</div>

							<div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="legal" id="legal" value="No">
                <label class="form-check-label" for="exampleRadios2">
                No
                </label>
              </div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="legal" id="legal" value="En proceso">
              <label class="form-check-label" for="exampleRadios2">
              En proceso
             </label>
            </div>

						<div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="legal" id="legal" value="Si">
              <label class="form-check-label" for="exampleRadios2">
              Si
             </label>
            </div>
            <br><br><br>
						<div class="form-group">
							<label for="apellidos" class="col-md-6 control-label">Sector</label>
						</div>

						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="sector" id="sector" value="Industrial">
							<label class="form-check-label" for="exampleRadios2">
							Industrial
							</label>
						</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="sector" id="sector" value="Comercio">
						<label class="form-check-label" for="exampleRadios2">
						Comercio
					 </label>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="sector" id="sector" value="Servicios">
						<label class="form-check-label" for="exampleRadios2">
						Servicios
					 </label>
					</div>
          <br><br><br><br>
					<div class="form-group">
						<label for="apellidos" class="col-md-9 control-label">Seleccione como maximo dos sectores a los que pertenece </label>
					</div>

						<div class="col-md-9">
							<label for="apellidos" class="col-md-3 control-label">Sector 1:</label>

							<select class="form-control" id="sector1" name="sector1" value="">
								<option value="Nin">Ninguno</option>
								<option value="Aer">Aeronáutica</option>
								<option value="Agr">Agroindustria</option>
								<option value="Ali">Alimentos</option>
								<option value="Aut">Automotriz</option>
								<option value="Bion">Biónica</option>
								<option value="Biot">Biotecnología</option>
								<option value="Cons">Construcción</option>
								<option value="Cos">Cosmetología</option>
								<option value="Des">Dessarrollo Social</option>
								<option value="Elec">Electrónica</option>
								<option value="Med">Medio Ambiente</option>
								<option value="Met">Metalmecánica</option>
								<option value="Pro">Productos Natureles</option>
								<option value="Rob">Robótica</option>
								<option value="Sal">Salud</option>
								<option value="Tic">Tecnologías de la Información (Software, Multimedia, etc.)</option>
								<option value="Tec">Tecnologías de Aprendizaje</option>
								<option value="Tur">Turismo</option>
								<option value="Dep">Deporte</option>

              </select>

						</div>
						<div class="col-md-9">
							<br>
							<label for="apellidos" class="col-md-3 control-label">Sector 2:</label>
							<select class="form-control" id="sector2" name="sector2" value="">
								<option value="Nin">Ninguno</option>
								<option value="Aer">Aeronáutica</option>
								<option value="Agr">Agroindustria</option>
								<option value="Ali">Alimentos</option>
								<option value="Aut">Automotriz</option>
								<option value="Bion">Biónica</option>
								<option value="Biot">Biotecnología</option>
								<option value="Cons">Construcción</option>
								<option value="Cos">Cosmetología</option>
								<option value="Des">Dessarrollo Social</option>
								<option value="Elec">Electrónica</option>
								<option value="Med">Medio Ambiente</option>
								<option value="Met">Metalmecánica</option>
								<option value="Pro">Productos Natureles</option>
								<option value="Rob">Robótica</option>
								<option value="Sal">Salud</option>
								<option value="Tic">Tecnologías de la Información (Software, Multimedia, etc.)</option>
								<option value="Tec">Tecnologías de Aprendizaje</option>
								<option value="Tur">Turismo</option>
								<option value="Dep">Deporte</option>
              </select>
						</div>


					<br><br><br><br>
					<div class="form-group">
						<label for="apellidos" class="col-md-9 control-label">¿Por qué medio por el que se enteró del UPINNEM?</label>
					</div>

					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="medio" id="medio" value="Universidad Politecnica de Pachuca">
						<label class="form-check-label" for="exampleRadios2">
						Universidad Politecnica de Pachuca
						</label>
					</div>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="medio" id="medio" value="Secretaría de Desarrollo Económico (análoga)">
					<label class="form-check-label" for="exampleRadios2">
					Secretaría de Desarrollo Económico (análoga)
				 </label>
				</div>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="medio" id="medio" value="Redes sociales">
					<label class="form-check-label" for="exampleRadios2">
					Redes sociales
				 </label>
				</div>

				<div class="form-check form-check-inline">
					<input class="form-check-input" type="radio" name="medio" id="medio" value="otro">
					<label class="form-check-label" for="exampleRadios2">
					Otro(especificar)
				 </label>
				</div>
				<div class="col-md-9">
					<input type="text" class="form-control" name="otro" id="otro">
				</div>
				<br> <br>
				<div class="form-group">
					<label for="apellidos" class="col-md-8 control-label">Documentacion de identificación</label>
				</div>


				<div class="form-group">
				<label class=" control-label">Identificación oficial (1 MB)</label><br>
        <input type="file" name="identificacion" id="identificacion" accept="application/pdf">
				<label class=" control-label"><br>Comprobante de domicilio (Preferentemente dónde se tendrá el domicilio fiscal, 1MB)</label>
        <input type="file" name="domicilio" id="domicilio"  accept="application/pdf" >
				</div>



				<div class="row w-100 align-items-center">
					<div class="col text-center">
						<button type="submit" class="btn btn-primary" >
						Continuar
						</button>
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
		<!-- Bootstrap core JavaScript -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
