
<?php 

	require_once 'lib/swift_required.php';
	
	$transporter = Swift_SmtpTransport::
		newInstance('smtp.gmail.com', 465, 'ssl')
			->setUsername('epostar011')
			->setPassword('lozinka011');

	$mailer = Swift_Mailer::newInstance($transporter);

	$body = '<p>'.$_POST['message'].'</p>';
	$body .= '<hr/><h3>'.$_POST['name'].'</h3>';
	$body .= '<p> <b>Email: </b>'.$_POST['email'].'<br/>';
	$body .= '<b>Telefon: </b>'.$_POST['phone'].'</p>';

	$message = Swift_Message::newInstance('Kontakt')
      ->setFrom(array('epostar011@gmail.com' => 'Pogled'))
      ->setTo(array('pogled.rs@gmail.com ', 'milos_dodic@live.com'=> 'Milos Dodic',
      		'stefanveljkovicvr@gmail.com'=> 'Stefan Veljkovic'))
      ->setBody($body, 'text/html')->setReplyTo($_POST['email']);

    $result = $mailer->send($message);

    if ($result == 1) $status = 'Vasa poruka je poslata! ;)';
	else $status = 'Slanje poruke nije uspelo! :/';

	include 'index.php';
?>