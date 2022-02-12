<?php
if (mail('argenazizbekuulu3@gmail.com', 'dlkjdfklgvdl', 'dgsdsdfsdfs')) echo "<script>alert(".mail('argenazizbekuulu3@gmail.com', 'dlkjdfklgvdl', 'dgsdsdfsdfs').")</script>";
else echo "<script>alert(".mail('argenazizbekuulu3@gmail.com', 'dlkjdfklgvdl', 'dgsdsdfsdfs').")</script>";
$message = "hello";
$to = "azizbekuuluargen98@gmail.com";
$from = "argenazizbekuulu3@gmail.com";
$subject = "Theme";
$subject = "=?utf-8?B?".base64_encode($subject)."?=";
$headers = 'From: '.$from.'\r\nReply-To: '.$from.'\r\nX-Mailer: PHP/' . phpversion().'\r\n Content-type:text/plain; charset=utf-8\r\n';
if (mail($to, $subject, $message, $headers)) echo'<script>alert("Yes")</script>';
else echo'<script>alert("No")</script>';

?>