<?php 
	error_reporting(E_STRICT);
	date_default_timezone_set('America/Toronto');	
	require_once 'PHPMailer/class.phpmailer.php'; 
?>
<?php 
if(isset($_POST['btn_enviar_mensaje'])){
	$emails = explode(';', $_POST['emails_inscriptos']);

	$mail                = new PHPMailer();
	$body                = $_POST['mensaje_contenido'];

	$mail->IsSMTP(); 							// telling the class to use SMTP
	$mail->SMTPAuth      = true;                // enable SMTP authentication
	$mail->SMTPSecure    = "ssl";				// sets the prefix to the servier
	//$mail->SMTPKeepAlive = true;              // SMTP connection will not close after each email sent
	$mail->Host          = "smtp.gmail.com";    // sets the SMTP server
	$mail->Port          = 465;                 // set the SMTP port for the GMAIL server
	$mail->Username      = "flisoltacna.peru@gmail.com"; // SMTP account username
	$mail->Password      = "flisoltacna2013";        // SMTP account password
	//$mail->CharSet  	 = 'UTF-8';
	$mail->SetFrom('flisoltacna.peru@gmail.com', 'FLISOL TACNA 2013');
	//$mail->AddReplyTo('list@mydomain.com', 'List manager');
	
	$mail->Subject       = $_POST['asunto']; 	  //asunto del mensaje

	foreach($emails as $email){
		$mail->MsgHTML($body);
		$mail->AddAddress($email);

		if(!$mail->Send()) {
		    //echo "Mailer Error: " . $mail->ErrorInfo;
		   header("location:../inscriptos/index.php?mensaje=2");
		} else {
		   header("location:../inscriptos/index.php?mensaje=1");	
		}
		// Clear all addresses and attachments for next loop
		$mail->ClearAddresses();
		$mail->ClearAttachments(); 	
	}
}
?>