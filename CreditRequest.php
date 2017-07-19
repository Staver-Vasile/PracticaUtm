<?php

session_start();

require 'PHPMailer/PHPMailerAutoload.php';

$errors = [];

if(isset($_POST['name'], $_POST['codPers'], $_POST['tel'], $_POST['rangeSum'], $_POST['rangePeriod'])){

	echo 'All set';

	$fields = [
	'name' => $_POST['name'],
	'codPers' => $_POST['codPers'],
	'tel' => $_POST['tel'],
	'rangeSum' => $_POST['rangeSum'],
	'rangePeriod' => $_POST['rangePeriod']

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

$mail->Body = '<strong> From: </strong>' .$fields['name'] . 
'<p><strong>Cod Personal: </strong>'. $fields['codPers'] .
 '</p><p><strong> Telefon: </strong>' . $fields['tel'] . 
 '</p><p><strong> Suma Creditului: </strong>' . $fields['rangeSum'] . ' lei</p>
 <p><strong> Perioada Creditului: </strong>' .$fields['rangePeriod'] . ' luni</p>';   





$mail->setFrom('creditBun@gmail.com', 'CreditBun');

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

 

?>