<?php
$to = "Victor.Nacino@onsemi.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: apps.donotreply@onsemi.com" . "\r\n" ;

mail($to,$subject,$txt,$headers);
?> 