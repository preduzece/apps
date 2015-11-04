<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

# First, instantiate the SDK with your API credentials and define your domain.
$mailGun = new Mailgun("key-d614c175cd653e6144c227224ceb685e");
$domain = "gdezavikend.rs";

# Now, compose and send your message.
$mailGun->sendMessage($domain, array('from'    => 'office@gdezavikend.rs',
                                'to'      => 'milos_dodic@live.com',
                                'subject' => 'The PHP SDK is awesome!',
                                'text'    => 'It is so simple to send a message.'));
?>
