<?php

	$con = mysqli_connect("localhost", "root", "", "login");

	if(!$con){
		echo "Not connected to Server!!!";
	}

	if(!mysqli_select_db($con, 'login')){
		echo "Database not selected!!!";
	}

	$name = $_POST['name'];
	$suma = $_POST['sum'];
	$period = $_POST['per'];
	$log = $_POST['login'];
	$password = $_POST['pass'];
 

	$sql = "INSERT INTO logdata (Nume, creditSum, credPeriod, login, password) VALUES
	('$name', '$suma', '$period', '$log', '$password') ";

	if(!mysqli_query($con, $sql)){
		echo "The values are not inserted";
	}
	else{
	 
	}

	header("refresh:0; url=adminPage.php");

?>