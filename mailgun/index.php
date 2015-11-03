<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

# First, instantiate the SDK with your API credentials and define your domain.
$mailGun = new Mailgun("key-d614c175cd653e6144c227224ceb685e");
$domain = "sandbox35578dd17b52413984f75050c11178ee.mailgun.org";

# Now, compose and send your message.
$mailGun->sendMessage($domain, array('from'    => 'office@pogled.co.rs',
                                'to'      => 'milos_dodic@live.com',
                                'subject' => 'The PHP SDK is awesome!',
                                'text'    => 'It is so simple to send a message.'));

?>
