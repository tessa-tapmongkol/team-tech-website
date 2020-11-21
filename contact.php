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

$email_from = '$visitor_email';//<== update the email address
$email_subject = "New Inquary submission";
$email_body = "You have received a new message from the user $fname.\n".
    "Here is the message:\n $message".
    
$to = "psomiset@calpoly.edu";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $to \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
header('Location: contact-us.html');


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
