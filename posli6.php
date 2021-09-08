<?php                                              
	ini_set('display_errors', 1);
	require_once("PHPMailer/PHPMailer.php");
	require_once("PHPMailer/SMTP.php");
	require_once("PHPMailer/Exception.php");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	$mail = new PHPMailer(true);

	$predmet = 'Rezervace';
	$mail = $_POST['mail'];
	$zprava = $_POST['zprava'];
	$jmeno = $_POST['jmeno'];
	$prijmeni = $_POST['prijmeni'];
	$telefon = $_POST['telefon'];
	$to = 'mikigroup@gmail.com';

	try {
			//Server settings

	    $mail->isSMTP();                                            // Send using SMTP
	    $mail->Host       = '';                    // Set the SMTP server to send through
	    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    $mail->Username   = 'info@aldaron.cz';                     // SMTP username
	    $mail->Password   = 'K5dhclUTEFCu0K4q';                               // SMTP password
	    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
	    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
			$mail->CharSet = PHPMailer::CHARSET_UTF8;

	   //Recipients
	    $mail->setFrom('info@aldaron.cz');
	    $mail->addAddress('');     // Add a recipient
		

	    // Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = $predmet;
	    $mail->Body    = ("Klient: $jmeno $prijmeni s mailem: $email a tel: $telefon, zanechal tuto zprávu: $zprava");
			$mail->AltBody = $zprava;
			
			$mail->setLanguage('cs', '/optional/path/to/language/directory/');
			


	    $mail->send();
	    echo 'Zpráva odeslána';
	} catch (Exception $e) {
	    echo "Zpráva nemohla být odeslána. Mailer Error: {$mail->ErrorInfo}";
	}

?>