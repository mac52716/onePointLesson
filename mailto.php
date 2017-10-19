<?php
$to = "Victor.Nacino@onsemi.com";
$subject = "MAIL TEST";
$txt = "Hello world!";
$headers = "From: apps.donotreply@onsemi.com" . "\r\n";

mail($to,$subject,$txt,$headers);
?> 