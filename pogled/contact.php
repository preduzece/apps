<?php
    require_once 'lib/swift_required.php';

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $phone = @trim(stripslashes($_POST['phone'])); 
    $company = @trim(stripslashes($_POST['company'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message'])); 
    
    $transporter = Swift_SmtpTransport::
        newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUsername('epostar011')
            ->setPassword('lozinka011');

    $mailer = Swift_Mailer::newInstance($transporter);

    $body = '<p>'.$message.'</p>';
    $body .= '<hr/><h3>'.$name.'</h3>';
    $body .= '<p> <b>Email: </b>'.$email.'<br/>';
    $body .= '<b>Telefon: </b>'.$phone.'<br/>';
    $body .= '<b>Firma: </b>'.$company.'</p>';

    $e_message = Swift_Message::newInstance($subject)
      ->setFrom(array('epostar011@gmail.com' => 'Vas Postar'))
      #->setTo(array('milos_dodic@live.com' => 'Milos Dodic'))
      ->setTo(array('pogled.rs@gmail.com' => 'Pogled DOO'))
      ->setBody($body, 'text/html')->setReplyTo($email);

    $result = $mailer->send($e_message);

    if ($result == 1) $status = array( 'type'=>'success',
        'message'=>'Primili smo vašu poruku, hvala! :) Uskoro ćemo vas kontaktirati...');

    else $status = array( 'type'=>'failure',
        'message'=>'Slanje poruke nije uspelo! :( Pokušajte ponovo kasnije...');

    header('Content-type: application/json');
    echo json_encode($status);
    die();
?>