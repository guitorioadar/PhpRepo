<?php
$to      = 'wasisadman.cse@gmail.com';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: guitorioadar@gmail.com' . "\r\n" .
    'Reply-To: guitorioadar@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>