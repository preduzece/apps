<?php
    require_once 'lib/swift_required.php';

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $company = @trim(stripslashes($_POST['company'])); 
    $shipment = @trim(stripslashes($_POST['shipment'])); 
    
    $transporter = Swift_SmtpTransport::
        newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername('epostar011')
            ->setPassword('lozinka011');

    $mailer = Swift_Mailer::newInstance($transporter);

    $body = '<h3>'.$company.'</h3><hr/>';
    $body .= '<p> <b>Tovarni list: </b>'.$shipment.'<br/>';
    $body .= '<b>Poručilac: </b>'.$name.'<br/>';
    $body .= '<b>Kontakt: </b>'.$email.'</p>';

    $message = Swift_Message::newInstance('Praćenje tovara')
      ->setFrom(array('epostar011@gmail.com' => 'Vas Postar'))
      ->setTo(array('milos_dodic@live.com' => 'Milos Dodic'))
      ->setBody($body, 'text/html')->setReplyTo($email);

    $result = $mailer->send($message);

    if ($result == 1) $status = array( 'type'=>'success',
        'message'=>'Primili smo vaš zahtev, hvala! :) Uskoro ćemo vas kontaktirati...');

    else $status = array( 'type'=>'failure',
        'message'=>'Slanje zahteva nije uspelo! :( Pokušajte ponovo kasnije...');

    header('Content-type: application/json');
    echo json_encode($status);
    die();
?>