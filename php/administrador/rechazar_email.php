<?php

require '../conexion.php';
require 'pass_aleatoria.php';
use PHPMailer\PHPMailer\PHPMailer;
require '../../vendor/autoload.php';

$folioEvaluar = $_GET['id'];


$sqli = "SELECT Pnombre, nombre, email FROM registroproyecto WHERE folio = '$folioEvaluar'";
$result = $mysqli->query($sqli);
$row = $result->fetch_assoc();

$email=$row['email'];
$nombre=$row['nombre'];
$username=$row['email'];

if(!sendMailTo($email, $nombre, $password, $username)){

  $activo=2;

  $stmt = "UPDATE registroproyecto SET activo='$activo' WHERE folio='$folioEvaluar'" ;
  $resultado = mysqli_query($mysqli, $stmt);

  if($resultado > 0){
  $mysqli->commit();
  header("location: administrador.php");
  }else {
  $mysqli->rollback();
  header("location: administrador.php");
  }

    header("location: administrador.php");

}else{
  echo "string";
}

function sendMailTo($email, $name, $password, $username)
{
    //Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "kikiin360@gmail.com";
//Password to use for SMTP authentication developtestmail5@gmail.com
$mail->Password = "12345678kike";
//Set who the message is to be sent from Echo2018
$mail->setFrom('developtestmail5@gmail.com', 'Departamento de Incubadora de Empresas');
//Set an alternative reply-to address
$mail->addReplyTo('developtestmail5@gmail.com', 'Alternativa de Respuesta');
//Set who the message is to be sent to
$mail->addAddress($email, $name);
$mail->CharSet = 'UTF-8';

$mail->isHTML(true);
//Set the subject line
$mail->Subject = 'Registro de proyecto';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->Body = '<h1 align="center">'.$name.'</h1> <p> <h3 align="justify">
Muchas gracias por tomarse el tiempo de realizar su registro.
Después de revisar el alcance del proyecto, lamentablemente no podremos llevar a cabo la ejecución de su proyecto.
Pero si está dispuesto, me encantaría reconciderarlo si se ajusta a nuestros requisitos.
</h3></p><br>
<h3 align="center">Buena suerte y muchísimas gracias por su interés.</h3>';
//Replace the plain text body with one created manually
$mail->AltBody = 'Usuario: defaulUser';
$mail->AltBody = 'Contraseña: defaulPassword';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

}

//sendMailTo('marcos_9593@hotmail.com','Marcos Pedraza Bautista','xskoxo545','UPP_2345');



?>
