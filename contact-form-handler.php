<?php 
$errors = '';
$myemail = 'lucashongzhou@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['nationality']) || 
   empty($_POST['date']) ||
   empty($_POST['email']) ||
   empty($_POST['telephone']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$date = $_POST['date']; 
$nationality = $_POST['nationality']; 
$telephone = $_POST['telephone']; 
$sex = $_POST['sex']; 
$education = $_POST['education']; 
$english = $_POST['english']; 


if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Application submission: $name";
	$email_body = "You have received a new application. ".
	"Name: $name \n Nationality: $nationality Sex: $sex Date of birth: $date Education Level: $education English Level: $english Email: $email_address \n Message: $telephone"; 
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>


</body>
</html>