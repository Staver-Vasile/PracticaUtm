
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">

	<script src="resources/IonSlider/js/jquery-1.12.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>
<script type="text/javascript">
	 $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });
</script>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>Modal Header</h4>
				<form action="logIn.php" method="post">

					<label>
						Your Contract Nr
						<input type="text" name="contractNr">
					</label>
					<br>
					<label>
						Your Password
						<input type="password" name="pass">
					</label>


					<input type="submit" name="login" value="login"> 
				</form>

			</div>

		</div>
</body>
</html>


<?php 
session_start();
$con = mysqli_connect("localhost", "root", "", "login");
if(isset($_POST['login'])){
	$_SESSION["contrNr"] = mysqli_real_escape_string($con, $_POST['contractNr']);
	$contrNr = $_SESSION["contrNr"];
	$pass = mysqli_real_escape_string($con, $_POST['pass']);
 
	$select_user = "SELECT * FROM logdata WHERE login = '$contrNr'
	 AND password = '$pass' ";
	 $run_user = mysqli_query($con, $select_user);


	 $check_user = mysqli_num_rows($run_user);
	 if($pass == "00000" && $contrNr == "admin"){
	 			header('location:adminPage.php');
	 }
	 else if($check_user > 0){
	 	header('location:clientPage.php');
	 }
	 else {
	 		  header("location:mainPage.php");
	  ?>

	 	 <script language='javascript'>
	 	  $(document).ready(function(){ 
	 	 			Materialize.toast('Codul Personal nu a fost introdust corect!', 4000, 'rounded');
	 	 			 $('#modal1').modal('open');
	 	 		});
			</script>
		<?php	 		
	 	 
	 }  
}

?>