<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

date_default_timezone_set("America/Mexico_City");

//CONFIGURACION:
$to  = "";
$cc  = "";
$bcc = "";
$fecha = date('Y-m-d H:i:s');

$a = $_REQUEST["a"];	

if ($a==1){
	
	$nombre   = $_REQUEST["nombre"];
	$email    = $_REQUEST["email"];
	$telefono = $_REQUEST["telefono"];
	$ciudad   = $_REQUEST["ciudad"];

	
	$subject = "Solicitud de información";
	$body = "
	Datos del solicitante: <br><br>
	Nombre: $nombre<br>
	E-Mail: $email <br>
	Telefono: $telefono<br>
	Ciudad: $ciudad<br>
	Fecha: $fecha ";
	
	$texto_respuesta = "Gracias por solicitar más información, en breve le daremos el seguimiento requerido";

	require "php-mailer/PHPMailerAutoload.php";

	$mail = new PHPMailer;


	/*
	$mail->isSMTP();

	$mail->SMTPDebug = 0;
	$mail->Debugoutput = 'html';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "";
	$mail->Password = "";
	*/
	$mail->CharSet = 'UTF-8';


	$mail->setFrom("noreply@cpm.coop", "Landing", 0);
	$mail->addReplyTo($email,$nombre);
	$mail->addAddress($to, $nombre);

	if ( $cc ) { $mail->AddCC($cc); }
	if ( $bcc ) { $mail->AddBCC($bcc); }

	$mail->Subject = $subject;
	$mail->CharSet = 'UTF-8';
	$mail->msgHTML($body);

	if (!$mail->Send()) {

	    $responder = 2;
		$texto_respuesta = "Ha ocurrido un error en el envio\nError code: 2\n".$mail->ErrorInfo;


	} else {

		$responder = 1;

	}

}else{

	$responder = 3;
	$texto_respuesta = "Ha ocurrido un error en el envio.";

}
	
//RESPUESTA DE CONSULTA
	$resp = array(
		'respuesta' => $responder,
		'texto_respuesta' => $texto_respuesta
	);

//	header('Content-Type: application/json');
	echo json_encode($resp);