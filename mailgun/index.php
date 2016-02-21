<?php

require 'vendor/autoload.php';
use Mailgun\Mailgun;

function render($path, $message)
{
    ob_start();

    include $path;
    $content = ob_get_contents();

    ob_end_clean();
    return $content;
}

# First, instantiate the SDK with your API credentials and define your domain.
$mailGun = new Mailgun("key-d614c175cd653e6144c227224ceb685e");
$message = 'It is so simple to send a message.';
$domain = "gdezavikend.rs";

$htmlMessage = render('mail.php', $message);

# Now, compose and send your message.
$mailGun->sendMessage($domain, [
        'from' => 'office@gdezavikend.rs',
        'to' => 'milos_dodic@live.com',
        # 'h:reply-to' => 'losmi@live.com',
        'subject' => 'The PHP SDK is awesome!',
        'html' => (string)$htmlMessage,
        # 'text'    => (string) $message
    ]
);

echo '<pre>'; var_dump($mailGun); die();
?>
