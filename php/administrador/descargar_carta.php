<?php
session_start();
require '../conexion.php';

$folioEvaluar = $_GET['id'];

$sqli = "SELECT carta_intencion FROM registroproyecto WHERE folio = '$folioEvaluar'";
$resulti = $mysqli->query($sqli);
$rowi = $resulti->fetch_assoc();

$carta = $rowi['carta_intencion'];

header("Content-disposition: attachment; filename=../$carta");
header("Content-type: application/pdf");
readfile("../$carta");

 ?>
