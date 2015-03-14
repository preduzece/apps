
<?php 

	require_once 'lib/swift_required.php';
	
	$transporter = Swift_SmtpTransport::
		newInstance('smtp.gmail.com', 465, 'ssl')
			->setUsername('epostar011')
			->setPassword('lozinka011');

	$mailer = Swift_Mailer::newInstance($transporter);

	$body = '<h3>'.$_POST['client'].' <small>'.$_POST['contact'].'</small></h3>';
	$body .= '<table border="1" color="#e33825">
		<tr>
			<th>Polaziste</th><th>Odrediste</th><th>Teret</th><th>Firma</th><th>Datum</th>
		</tr>
		<tr>
			<td>'.$_POST['start'].'</td><td>' .$_POST['destin'].'</td><td>'
			.$_POST['cargo'].'</td><td>'.$_POST['company'].'</td><td>'.$_POST['date'].'</td>
		</tr>
	</table>';
	$body .= '<p><b>Napomena: </b>'.$_POST['remark'].'</p>';

	$message = Swift_Message::newInstance('Transport')
      ->setFrom(array('epostar011@gmail.com' => 'Vas Postar'))
      ->setTo(array('milos_dodic@live.com' => 'Milos Dodic'))
      ->setBody($body, 'text/html');

    $result = $mailer->send($message);

    if ($result == 1) $status = array( 'type'=>'success',
        'message'=>'Primili smo vašu poruku, hvala! :) Uskoro ćemo vas kontaktirati...');

    else $status = array( 'type'=>'failure',
        'message'=>'Slanje poruke nije uspelo! :( Pokušajte ponovo kasnije...');

    header('Content-type: application/json');
    echo json_encode($status);
    die();
?>