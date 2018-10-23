<?php

	$mysqli=new mysqli("localhost","root","","sistemaweb"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
  $mysqli->set_charset("utf8");
	
	if(mysqli_connect_error()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	$mysqli->autocommit(FALSE);
	#$mysqli->begin_transaction(MYSQLY_TRANS_STAR_READ_ONLY);

?>
