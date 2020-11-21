<?php

if($_POST["submit"]) {
    $recipient="psomiset@calpoly.edu";
    $subject="Form enqueries";
    $sender=$_POST["firstname"];
    $senderEmail=$_POST["email"];
    $message=$_POST["comment"];

    $mailBody= "Name: $sender\nEmail: $senderEmail\n\n$message";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankYou="<p>Thank you! Your message has been sent.</p>";
}

?>
