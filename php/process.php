<?php
// error_reporting(E_ALL);
// ini_set("display_errors", 1);

require_once "functions.php";
$config = getConfig($sub = true);

date_default_timezone_set("America/Mexico_City");

//CONFIGURACION:
$auth         = $config->configuracion->mailer->auth;
$to           = $config->configuracion->mailer->to;
$cc           = $config->configuracion->mailer->cc;
$bcc          = $config->configuracion->mailer->bcc;
$replyTo      = $config->configuracion->mailer->replyTo;
$from         = $config->configuracion->mailer->from;
$fromName     = $config->configuracion->mailer->fromName;
$useMailchimp = $config->configuracion->mailchimp;
$fecha        = date('Y-m-d H:i:s');
$success      = 0;
$a            = (isset($_REQUEST['a'])) ? $_REQUEST['a'] : "";

if ( $useMailchimp->use == 1 ){

	$mailchimpApi = $useMailchimp->api;
	require_once ('Mailchimp.php');
	$MailChimp = new \Drewm\MailChimp($mailchimpApi);

}

if ( $a == 1 ){
	
	$nombre   = $_POST["nombre"];
	$email    = $_POST["email"];
	$telefono = $_POST["telefono"];
	$entrada  = $_POST["entrada"];
	$salida   = $_POST["salida"];
	$adultos  = $_POST["adultos"];
	$menores  = $_POST["menores"];

	$subject = "Solicitud de reservación";
	$body = "<strong>Datos del solicitante:</strong><br>
	<strong>Nombre:</strong> $nombre<br>
	<strong>E-Mail:</strong> $email<br>
	<strong>Telefono:</strong> $telefono<br>
	<strong>Entrada:</strong> $entrada<br>
	<strong>Salida:</strong> $salida<br>
	<strong>Adultos:</strong> $adultos<br>
	<strong>Menores:</strong> $menores<br>
	<strong>Fecha de envío:</strong> $fecha";
	
	$texto_respuesta = "Gracias por solicitar su reservación, en breve le daremos el seguimiento requerido";
	$success = 1;

	if ( $useMailchimp->use == 1 ){
		$mailchimpData = array('FNAME'=>$nombre);
	}


} elseif ( $a == 2 ) {

	$nombre   = $_POST["nombre"];
	$email    = $_POST["email"];

	$subject = "Solicitud de folleto";
	$body = "<strong>Datos del solicitante:</strong><br>
	<strong>Nombre:</strong> $nombre<br>
	<strong>E-Mail:</strong> $email <br>
	<strong>Fecha de envío:</strong> $fecha";
	
	$texto_respuesta = "Gracias por solicitar nuestro folleto, en breve lo recibirá en el email indicado";
	$success = 1;

	if ( $useMailchimp->use == 1 ){
		$mailchimpData = array('FNAME'=>$nombre);
	}
}
 

if ( $success == 1 && filter_var($email, FILTER_VALIDATE_EMAIL) ){

	require "php-mailer/PHPMailerAutoload.php";

	$mail = new PHPMailer;


	if ( $auth == 1 ):

		$mail->isSMTP();
		$mail->SMTPDebug   = 0;
		$mail->Debugoutput = 'html';
		$mail->Host        = $config->configuracion->mailer->host;
		$mail->Port        = $config->configuracion->mailer->port;
		$mail->SMTPSecure  = $config->configuracion->mailer->smtpSecure;
		$mail->SMTPAuth    = true;
		$mail->Username    = $config->configuracion->mailer->userName;
		$mail->Password    = $config->configuracion->mailer->password;

	endif;

	$mail->CharSet = 'UTF-8';


	$mail->addReplyTo($replyTo,$nombre);
	$mail->setFrom($from, $fromName, 0);
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


	if ( $mailchimp == 1 && $email !="" && $mailchimpApi != "" && $mailchimpList != "" ){

		$result = $MailChimp->call('lists/subscribe', array(
		                'id'                => $mailchimpList,
		                'email'             => array('email'=>$email),
		                'merge_vars'        => $mailchimpData,
		                'double_optin'      => false,
		                'update_existing'   => true,
		                'replace_interests' => false,
		                'send_welcome'      => false,
		            ));
		//print_r($result);

		if ($result["status"]=="error"){
			// echo "Error";
			$mailchimp_respuesta = "Error " . $result["code"] . " " . $result["name"] . " " . $result["error"];
			$subject_mailchimp 	 = "Error en envio a MailChimp";

		}else{
			// echo "OK";
			$mailchimp_respuesta = "Ok";
			$subject_mailchimp = "Envio a MailChimp";

		}

	}


}else{

	$responder = 3;
	$texto_respuesta = "Ha ocurrido un error en el envio.";

}
	
//RESPUESTA DE CONSULTA
$resp = array(
	'respuesta' => $responder,
	'texto_respuesta' => $texto_respuesta,
	'mailchimp_respuesta' => $mailchimp_respuesta,
	'subject_mailchimp' => $subject_mailchimp
);

//	header('Content-Type: application/json');
echo json_encode($resp);