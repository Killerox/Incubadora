<?php

require '../conexion.php';
require 'pass_aleatoria.php';
use PHPMailer\PHPMailer\PHPMailer;
require '../../vendor/autoload.php';

$folioEvaluar = $_GET['id'];

$password=passwordGenerator();
$pass=hashPassword($password);

$sqli = "SELECT Pnombre, nombre, email FROM registroproyecto WHERE folio = '$folioEvaluar'";
$result = $mysqli->query($sqli);
$row = $result->fetch_assoc();

$email=$row['email'];
$nombre=$row['nombre'];
$username=$row['email'];


if(!sendMailTo($email, $nombre, $password, $username)){
  $activo=1;
  $tipo=0;
  $estado=1;

  $stmt = "UPDATE registroproyecto SET activo='$activo' WHERE folio='$folioEvaluar'" ;
  $resultado = mysqli_query($mysqli, $stmt);

  $stmti = "INSERT INTO users (folio, user, password, nombreCom, tipo, estado) VALUES('$folioEvaluar', '$username', '$pass', '$nombre', '$tipo', '$estado' )";
  $resultad = mysqli_query($mysqli, $stmti);

  if($resultado > 0 && $resultad > 0){
  $mysqli->commit();
  header("location: administrador.php");
  }else {
    header("location: administrador.php");
    $mysqli->rollback();
  }
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
$mail->Body = '<h1>¡Felicidades!</h1> <h2>Su proyecto fue aceptado</h2> <h3>
Para ingresar a su cuenta utilice las siguientes credenciales, usted puede cambiar su contraseña en el sistema una vez ingresando.
</h3>'."<p>" ."\nUsuario: ".$username ."</p>"."<p>"."Contraseña: ". $password . "</p>";
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
