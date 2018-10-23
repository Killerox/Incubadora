<?php
require 'conexion.php';
require 'funcs.php';


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

  $registro = registrarProyecto($folio, $Pnombre, $nombre, $direccion, $colonia, $municipio, $cp, $estado, $telefono, $email, $procedencia, $legal, $sector, $sector1, $sector2, $medio, $otro, $ide, $domi, $time);

  #$mysqli->commit();

 $id_insert = $mysqli->insert_id;

 if($_FILES["domicilio"]["error"]>0 && $_FILES["identificacion"]["error"]>0){
  echo "Error al cargar archivo";
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
    		if(!$resultado){echo "Archivo Guardado";}

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
  echo "Error al registrar";
  $mysqli->rollback();
   }

}
?>
