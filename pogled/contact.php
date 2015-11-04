<?php

    require 'vendor/autoload.php';
    use Mailgun\Mailgun;

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $phone = @trim(stripslashes($_POST['phone'])); 
    $company = @trim(stripslashes($_POST['company'])); 
    $subject = @trim(stripslashes($_POST['subject'])); 
    $message = @trim(stripslashes($_POST['message']));

    # First, instantiate the SDK with your API credentials and define your domain.
    $mailGun = new Mailgun("key-d614c175cd653e6144c227224ceb685e");
    // $message = 'It is so simple to send a message.';
    $domain = "pogled.co.rs";

    $content = '<p>'.$message.'</p>';
    $content .= '<hr/><h3>'.$name.'</h3>';
    $content .= '<p> <b>Email: </b>'.$email.'<br/>';
    $content .= '<b>Telefon: </b>'.$phone.'<br/>';
    $content .= '<b>Firma: </b>'.$company.'</p>';

    $status = array( 'type'=>'failure',
            'message'=>'Slanje poruke nije uspelo! :( Pokušajte ponovo kasnije...');

    try{
        # Now, compose and send your message.
        $mailGun->sendMessage($domain, [
            'from'    => 'contact@pogled.co.rs',
            'to'      => 'dmilos91@gmail.com',
            'subject' => $subject,
            'html'    => $content,
            ]
        );

        $status = array( 'type'=>'success',
            'message'=>'Primili smo vašu poruku, hvala! :) Uskoro ćemo vas kontaktirati...');
    } catch(Exception $exc) {
        $status = array( 'type'=>'failure',
            'message'=>'Slanje poruke nije uspelo! :( Pokušajte ponovo kasnije...');
    }

    header('Content-type: application/json');
    echo json_encode($status); die();
?>
