<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));


$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'pawel@ai-joga.pl'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formularz Kontaktowy ai-joga.pl:  $name";
$email_body = "Otrzymałeś nową wiadomośc poprzez formularz kontaktowy:\n"."\n\nImię i nazwisko: $name\n\nAdres E-mail: $email_address\n\nWiadomość:\n\n$message";
$headers = "Od: formularz@ai-joga.pl\n"  . "Content-Type: text/plain; charset=UTF-8\r\n" ; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address"  . "Content-Type: text/plain; charset=UTF-8\r\n" ;	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
