<?php
session_start();
require '../conexion.php';

$folioEvaluar = $_GET['id'];

$sqli = "SELECT domicilio FROM registroproyecto WHERE folio = '$folioEvaluar'";
$resulti = $mysqli->query($sqli);
$rowi = $resulti->fetch_assoc();

$domicilio = $rowi['domicilio'];

header("Content-disposition: attachment; filename=../$domicilio");
header("Content-type: application/pdf");
readfile("../$domicilio");

 ?>
