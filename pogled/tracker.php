<?php

    require 'vendor/autoload.php';
    use Mailgun\Mailgun;

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $company = @trim(stripslashes($_POST['company'])); 
    $shipment = @trim(stripslashes($_POST['shipment']));

    # First, instantiate the SDK with your API credentials and define your domain.
    $mailGun = new Mailgun("key-d614c175cd653e6144c227224ceb685e");
    // $message = 'It is so simple to send a message.';
    $domain = "pogled.co.rs";

    $content = '<h3>'.$company.'</h3><hr/>';
    $content .= '<p> <b>Tovarni list: </b>'.$shipment.'<br/>';
    $content .= '<b>Poručilac: </b>'.$name.'<br/>';
    $content .= '<b>Kontakt: </b>'.$email.'</p>';

    $status = array( 'type'=>'failure',
            'message'=>'Slanje poruke nije uspelo! :( Pokušajte ponovo kasnije...');

    try{
        # Now, compose and send your message.
        $mailGun->sendMessage($domain, [
            'from'    => 'tracking@pogled.co.rs',
            'to'      => 'dmilos91@gmail.com',
            'subject' => 'Pracenje tovara',
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
