<?php

session_start();

require 'PHPMailer/PHPMailerAutoload.php';

$errors = [];

if(isset($_POST['name'], $_POST['email'], $_POST['message'], $_POST['suma'])){

	echo 'All set';

	$fields = [
	'name' => $_POST['name'],
	'message' => $_POST['message'],
	'email' => $_POST['email'],
	'suma' => $_POST['suma']

	];

	foreach ($fields as $field => $data) {
		if(empty($data)){
			$errors[] = 'The ' . $field . ' field is required';
		}	# code...
	}

	if(empty($errors)){
		$mail = new PHPMailer;

	$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;

                               // Enable SMTP authentication
$mail->Username = 'staver823@gmail.com';                 // SMTP username
$mail->Password = 'vaseastaver9';                           // SMTP password
                           // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';

$mail->isHTML();
$mail->addReplyTo('info@example.com', 'Information');
$mail->Subject = 'Contact form submitter';

$mail->Body = 'From:' .$fields['email'] . '('. $fields['name'] . ') <p>' . $fields['messsssage'] . '</p> <p> Suma: ' . $fields['suma'] . '</p>';   
$mail->setFrom('blablabla@gmail.com', 'Vaaaaaas');

 $mail->AddAddress('staver9081@gmail.com', 'Bla'); 

 if($mail->send()){
 	 
 } else {
 	$errors[] = 'Sorry blablanla';
 }                         

}

} else {
	$errors[] = 'Something went wrong';
}


$_SESSION['errors'] = $errors;
$_SESSION['field'] = $field;

header('Location: mainPage.php');

?>