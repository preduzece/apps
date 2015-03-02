
<?php 

	require_once 'lib/swift_required.php';
	
	$transporter = Swift_SmtpTransport::
		newInstance('smtp.gmail.com', 465, 'ssl')
			->setUsername('epostar011')
			->setPassword('lozinka011');

	$mailer = Swift_Mailer::newInstance($transporter);

	$message = Swift_Message::newInstance($_POST['title'])
      ->setFrom(array('epostar011@gmail.com' => 'Vas E-Postar'))
      ->setTo(array('milos.dodic@degordian.com' => 'Milos Dodic'))->setBody($_POST['message'])
      ->addPart('<hr/><h4>'.$_POST['name'].'</h4><p>(<b>Telefon: </b>'.$_POST['telefon'].')</p>', 'text/html');

    $result = $mailer->send($message);

    echo '<h1>'.($result == 1) ? 'Mail sent! ;)</h1>' 
		: 'Sending failed!!!</h1>';
?>