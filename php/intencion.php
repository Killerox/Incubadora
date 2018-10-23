<?php

require 'conexion.php';
require 'funcs.php';

  $ruta = $_GET['ruta'];
  $folio = $_GET['id'];



 if($_FILES["intencion"]["error"]>0){
  echo "Error al cargar archivo";
  } else {

  $permitidos = array("application/pdf");
  $limite_kb = 1000;

  if(in_array($_FILES["intencion"]["type"], $permitidos) && $_FILES["intencion"]["size"] <= $limite_kb * 1024){

    //$ruta = 'files/'.$id_insert.'/';
    $archivo1 = $ruta.$_FILES["intencion"]["name"];

    if(!file_exists($ruta)){
      mkdir($ruta,0777, true);
    }

    if(!file_exists($archivo1)){

      $resultado1 = @move_uploaded_file($_FILES["intencion"]["tmp_name"], $archivo1);

      if($resultado1){
        #$id_insert = $mysqli->insert_id;
        $stmt = "UPDATE registroproyecto SET carta_intencion = '$archivo1' WHERE folio ='$folio'" ;

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

  if($resultado > 0){

  header("location: finaliza.php?id=".$folio."");
  $mysqli->commit();

}else {
  echo "Error al registrar";
  $mysqli->rollback();
   }

}
?>
