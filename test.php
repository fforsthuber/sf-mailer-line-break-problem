<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

$dsn = "smtp://mailhog:1025?verify_peer=0";
$transport = Transport::fromDsn($dsn);
$mailer = new Mailer($transport);

$message = (new Email())
    ->from(new Address('sender@test.de'))
    ->to(new Address('recipient@test.de'))
    ->subject('line break bug')
    ->text(file_get_contents(__DIR__ . '/test.txt'));

$mailer->send($message);