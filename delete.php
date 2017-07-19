<?php

	$con = mysqli_connect("localhost", "root", "", "login");

	if(!$con){
		echo "Not connected to Server!!!";
	}

	if(!mysqli_select_db($con, 'login')){
		echo "Database not selected!!!";
	}

	if(isset($_GET['del'])){
		$id = $_GET['del'];
		$sql = "DELETE FROM logdata WHERE id = '$id' ";
		if(!mysqli_query($con, $sql)){
		echo "The values are not inserted";
	}
	else{
		 
	}

	header("refresh:0; url=adminPage.php");
	}


?>