<?php
session_start();
require '../conexion.php';

$folioEvaluar = $_GET['id'];

$sqli = "SELECT identificacion FROM registroproyecto WHERE folio = '$folioEvaluar'";
$resulti = $mysqli->query($sqli);
$rowi = $resulti->fetch_assoc();

$identificacion = $rowi['identificacion'];

header("Content-disposition: attachment; filename=../$identificacion");
header("Content-type: application/pdf");
readfile("../$identificacion");

 ?>
