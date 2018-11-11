	<?php

	function generarFolio($index, $year)
	{
			$startFolio = "UPINNEM_";
			$index= $index+1;
			$conc = str_pad($index,4,'0',STR_PAD_LEFT);


			return $startFolio.$conc."_".$year;
	}

		function correoExiste($email)
		{
			global $mysqli;

		  $verificar_usuario = mysqli_query($mysqli, "SELECT * FROM registroproyecto WHERE email ='$email'");

			if (mysqli_num_rows($verificar_usuario) > 0){
				return true;
				} else {
				return false;
			}
		}

		function hashPassword($password)
		{
			$hash = password_hash($password, PASSWORD_DEFAULT);
			return $hash;
		}

		function registrarProyecto($folio, $Pnombre, $nombre, $direccion, $colonia, $municipio, $cp, $estado, $telefono, $email, $procedencia, $legal, $sector, $sector1, $sector2, $medio, $otro, $ide, $domi, $time, $activo){

			global $mysqli;

			$stmt = "INSERT INTO  registroproyecto (folio, Pnombre, nombre, direccion, colonia, municipio, cp, estado, telefono, email, procedencia, legal, sector, sector1, sector2, medio, otro, identificacion, domicilio, fecha, activo) VALUES('$folio', '$Pnombre', '$nombre', '$direccion', '$colonia', '$municipio', '$cp', '$estado', '$telefono', '$email', '$procedencia', '$legal', '$sector', '$sector1', '$sector2', '$medio', '$otro', '$ide', '$domi', '$time', '$activo')";
	    $resultado = mysqli_query($mysqli, $stmt);
			return $resultado;
		}

		function registroUser($folio, $user, $pas, $tipusuario){

			global $mysqli;

			$stmt = "INSERT INTO  users (folio, user, password, tipo) VALUES('$folio', '$user', '$pas', '$tipusuario' )";
	    $resultado = mysqli_query($mysqli, $stmt);
			return $resultado;
		}

		function registroI($folio, $Inombre, $Idireccion, $Icolonia, $Imunicipio, $Icp, $Iestado, $Itelefono, $Iemail, $Iprocedencia){

			global $mysqli;

			$stmt = "INSERT INTO  personasinvlucradas (folio, nombre, direccion, colonia, municipio, cp, estado, telefono, email, procedencia) VALUES('$folio', '$Inombre', '$Idireccion', '$Icolonia', '$Imunicipio', '$Icp', '$Iestado', '$Itelefono', '$Iemail', '$Iprocedencia')";
	    $resultado = mysqli_query($mysqli, $stmt);
			return $resultado;
		}

		function actualizarUsuario($id, $nombre, $apellidos, $departamentos, $reportes, $tipusuario, $usuario){

			global $mysqli;

	        #$verificar_usuario = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_usuario ='$id_prod'");

			$stmt = "UPDATE usuarios SET nombre= '$nombre', apellidos='$apellidos', departamentos='$departamentos', reportes='$reportes', TipoUsuario='$tipusuario', usuario='$usuario' WHERE id_usuario='$id'" ;

	        $resultado = mysqli_query($mysqli, $stmt);
			if(!$resultado){
				echo '<script>
				alert("Error al registrar")
				</script>';
			} else{
				echo '<script>
				alert("El usuario se registro")
				</script>';
				header("location: administrador.php");
			}
}

function login($usuario, $password)
{
	global $mysqli;

	$stmt = $mysqli->prepare("SELECT id_user, folio, tipo, password, estado FROM users WHERE user = ? LIMIT 1");
	$stmt->bind_param("s", $usuario);
	$stmt->execute();
	$stmt->store_result();
	$rows = $stmt->num_rows;

	if($rows > 0) {

			$stmt->bind_result($id, $folio, $id_tipo, $passwd, $estado);
			$stmt->fetch();
			#$prueba='1234';
			#$validaPassw = password_verify($password, $passwd);
      if($estado == 0){
				$errors[] = "Tu cuenta esta temporalmente desactivada";
			} else{
			  if(password_verify($password, $passwd)){
				$_SESSION['id_user'] = $id;
				$_SESSION['folio'] = $folio;
				$_SESSION['tipo'] = $id_tipo;
           //Usuario Administrador
				   if($id_tipo == 1){ header("location: php/administrador/administrador.php"); }
				   else{ header("location: php/usuario/usuario.php");}
				// Contraseña
			}else {$errors[] = "La contrase&ntilde;a es incorrecta";} }
		} else {
		$errors[] = "El nombre de usuario no existe";
	}



	return $errors;
}

	function resultBlock($errors){
		if(count($errors) > 0)
		{
			echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
			foreach($errors as $error)
			{
				echo "<li>". print json_encode($error) ."</li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}

	function isNullLogin($usuario, $password){
		if(strlen(trim($usuario)) < 1 || strlen(trim($password)) < 1)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
