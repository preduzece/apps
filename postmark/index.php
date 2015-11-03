<?php

require_once('./vendor/autoload.php');
use Postmark\PostmarkClient;

// Example request
$client = new PostmarkClient("55536343-5cfb-46b2-80b8-4e4ee07600ec");

$sendResult = $client->sendEmail(
  "milos.dodic@degordian.com",
  "milos_dodic@live.com",
  "Hello from Postmark!",
  "This is just a friendly 'hello' from your friends at Postmark."
);

?>
