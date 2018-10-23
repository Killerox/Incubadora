<?php
session_start();

require '../conexion.php';
require '../funcs.php';

  $folio = $_SESSION['folio'];
  $punto = $_SESSION["punto"];
  $editor = $mysqli->real_escape_string($_POST['editor']);

  //$punto = $mysqli->real_escape_string($_POST[$punto]);
  ini_set('date.timezone', 'America/Mexico_City');
  $time = date('Y-m-d, H:i:s', time());

  $punt = "punto".$punto;
  $estado = "Esperando revisión";
  $stmt = "UPDATE $punt SET  fecha='$time', informacion='$editor' WHERE folio='$folio'" ;
  $resultado = mysqli_query($mysqli, $stmt);

  if($resultado > 0){
  echo "<script type='text/javascript'>
  alert('Usuario registrado exitosamente');
  </script>";
  $mysqli->commit();
  header("location: guiaDeNegocios.php");
  }else {
    echo $stmt;
    echo "Error al registrar";
    $mysqli->rollback();
  }

/*
  if ($punto=="1") {

    $estado = "Esperando revisión";
    $registro = registrarPunto($folio, $estado, $time, $editor);
    if($registro > 0){
    echo "<script type='text/javascript'>
    alert('Usuario registrado exitosamente');
    </script>";
    $mysqli->commit();
    header("location: guiaDeNegocios.php");
    }else {
      echo "Error al registrar";
      $mysqli->rollback();
    }
  }elseif ($punto=="2") {

    $estado = "Esperando revisión";
    $registro = registrarPunto2($folio, $estado, $time, $editor);
    if($registro > 0){
    echo "<script type='text/javascript'>
    alert('Usuario registrado exitosamente');
    </script>";
    $mysqli->commit();
    header("location: guiaDeNegocios.php");
    }else {
      echo "Error al registrar";
      $mysqli->rollback();
    }
  }elseif ($punto=="3") {

    $estado = "Esperando revisión";
    $registro = registrarPunto3($folio, $estado, $time, $editor);
    if($registro > 0){
    echo "<script type='text/javascript'>
    alert('Usuario registrado exitosamente');
    </script>";
    $mysqli->commit();
    header("location: guiaDeNegocios.php");
    }else {
      echo "Error al registrar";
      $mysqli->rollback();
    }
  }
  */


?>
