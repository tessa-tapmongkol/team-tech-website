<?php

$name = $_POST['fname'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

//Validate first
if(empty($name)||empty($visitor_email)) 
{
    echo "Name and email are mandatory!";
    exit;
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

$to = "psomiset@calpoly.edu";//<== update the email address
$email_subject = "New Inquary submission";
$email_body = "You have received a new message from the user $name.\n".
    "Here is the message:\n $message \n".
    
<<<<<<< HEAD
$to = "cpteamtech@gmail.com";//<== update the email address
=======
>>>>>>> 091d22de3d3531fef802adc484969e2fa072c3f9
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $to \r\n";
//Send the email!
if(mail($to, $email_subject, $email_body, $headers))
  header('Location: thank-you.html');
else
  header('Location: failed-email.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 
