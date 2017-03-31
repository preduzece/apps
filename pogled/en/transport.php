
<?php 

    require 'vendor/autoload.php';
    use Mailgun\Mailgun;

    # First, instantiate the SDK with your API credentials and define your domain.
    $mailGun = new Mailgun("key-d614c175cd653e6144c227224ceb685e");
    // $message = 'It is so simple to send a message.';
    $domain = "pogled.co.rs";

	$content = '<h3>'.$_POST['company'].' <small>('.$_POST['email'].')</small></h3>';
	$content .= '<table border="1" color="#e33825">
		<tr>
			<th>Polaziste</th><th>Odrediste</th><th>Teret</th><th>Firma</th><th>Datum</th>
		</tr>
		<tr>
			<td>'.$_POST['start'].'</td><td>' .$_POST['destin'].'</td><td>'
			.$_POST['cargo'].'</td><td>'.$_POST['company'].'</td><td>'.$_POST['date'].'</td>
		</tr>
	</table>';
	$content .= '<p><b>Napomena: </b>'.$_POST['remark'].'</p>';

    $status = array( 'type'=>'failure',
            'message'=>'Slanje poruke nije uspelo! :( Pokušajte ponovo kasnije...');

    try{
        # Now, compose and send your message.
        $mailGun->sendMessage($domain, [
            'from'    => 'cargo@pogled.co.rs',
            'to'      => 'pogled.rs@gmail.com',
            // 'to'      => 'office@pogled.co.rs',
            // 'to'      => 'milos_dodic@live.com',
            'subject' => 'Ponuda za transport',
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
