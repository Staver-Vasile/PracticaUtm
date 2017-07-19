<?php

session_start();

?>



<!DOCTYPE html>
<html>
<head>
	<title> Contact Form</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Resources/Style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<link rel="stylesheet" href="resources/IonSlider/css/normalize.css" />
	<link rel="stylesheet" href="resources/IonSlider/css/ion.rangeSlider.css" />
	
	<link rel="stylesheet" href="resources/IonSlider/css/ion.rangeSlider.skinFlat.css" />
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC32Lw9WeIo9tJZDSbt7VEgUDn2Dw4kfKw&callback=initMap"
	type="text/javascript"></script>
	<script src="resources/IonSlider/js/jquery-1.12.3.min.js"></script>
	<script src="resources/IonSlider/js/ion.rangeSlider.js"></script>
	<script src="resources/js/scripts.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>

</head>
<body>
	<div class="navbar-fixed">
		<nav class="navBar">
			<div class="container">
				<div id="menu-center" class="nav-wrapper" style="padding-top: 0.1px;">
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

					<ul class="left hide-on-med-and-down" style="width: 100%;">
						<li><a href="mainPage.php" >Principala</a></li>
						<li><a href="mainPage.php#credOn">Credit online</a></li>
						<li><a href="mainPage.php#credGaj">Credit cu gaj</a></li>
						<li><a href="mainPage.php#LinieCred">Linie de credit</a></li>
						<li><a href="newsPage.php">Noutati</a></li>
						<li><a href="mainPage.php#contacte">Contacte</a></li>
						<li class="active right" ><a href="#modal1" class="abcd">Cont Personal</a></li>

					</ul>

					<p>blablabla</p>

				</div>
			</div>
		</nav>
	</div>

	
	<ul class="side-nav" id="mobile-demo" >
		<div class="col s12 m6 l3"><a href="https://fontmeme.com/cool-fonts/"></a> 
			<div class="logo"><a href="/" title=""><img src="resources/Images/loggo.png"
				alt="logo" style="margin-top: 10px; margin-bottom: 25px; width: 250px;"></a></div>

			</div>
			<li><a href="#principala">Principala</a></li>
			<li><a href="#credOn">Credit online</a></li>
			<li><a href="#credGaj">Credit cu gaj</a></li>
			<li><a href="#LinieCred">Linia de credit</a></li>
			<li><a href="#noutati">Noutati</a></li>
			<li><a href="#contacte">Contacte</a></li>
		</ul>




	<header>
		<div id="modal1" class="modal">
			<div class="modal-content">
				<div style="text-align: center;text-decoration: underline;
				text-decoration-style: solid; text-decoration-color: grey; font-style: italic;"><h4>Cont Personal</h4></div>
				<form action="" method="post">
					<div class="input-field"> 
						<i class="material-icons prefix" >payment</i>
						<input type="text" name="contractNr" id="N_Prenume">
						<label for="icon_prefix">Numarul Contractului</label>
					</div>
					<div class="input-field"> 
						<i class="material-icons prefix" >vpn_key</i>
						<input type="password" name="pass" id="cdPers">
						<label for="icon_prefix">Parola</label>
					</div>


					<div><p style="text-align: center;"><input type="submit" name="login" value="Intra" class="waves-effect waves-light btn-large"></p></div>

				</form>

			</div>

		</div>
		<?php 

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

				?>
				<script language='javascript'>
					$(document).ready(function(){ 
						
						Materialize.toast('Numarul contractului sau parola este incorecta!', 4000, 'rounded');
						$('#modal1').modal('open');

					});
				</script>
				<?php	 		

			}  
		}

		?>
		<div class="section scrollspy" id="principala" style="height: 100px !important;">
			<div class="container">

				<div class="row">

					<div class="col s12 m6 l3"><a href="https://fontmeme.com/cool-fonts/"></a> 
						<div class="logo"><a href="/" title=""><img src="resources/Images/loggo.png"
							alt="logo" style="margin-top: 10px;"></a></div>

						</div>

						<div class="col s12 m6 l6">

							<div class="SLD" class="col s12 m6">
								<div class="slider">
									<ul class="slides">
										<li>
											<img src="resources/Images/imagSlog.png"> <!-- random image -->
											<div class="caption center-align">
												<span class="slideFont">Credite online rapid! </span>

											</div>
										</li>
										<li>
											<img src="resources/Images/imagSlog.png"> <!-- random image -->
											<div class="caption center-align">
												<span class="slideFont">Credite cu gaj!</span>

											</div>
										</li>
										<li>
											<img src="resources/Images/imagSlog.png"> <!-- random image -->
											<div class="caption center-align">
												<span class="slideFont">Primul credit gratis! </span>

											</div>
										</li>
										<li>
											<img src="resources/Images/imagSlog.png"> <!-- random image -->
											<div class="caption center-align">
												<span class="slideFont">Credite in toata Moldova! </span>

											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>


						<div class="col s12 m6 l3">

							<div class="phone-right">

								<span class="btn btn-floating  grey pulse " style="margin-right: 10px;"><i class="small material-icons prefix" style="margin-right: 10px;">phone</i></span>
								<span class="phonImg">022 838 384 </span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="container">
			<p style="text-align: center; "><a class="waves-effect waves-light btn-large" href="addNew.php">Adauga</a></p>
			<table style=" margin-top: 30px; font-size: 25px; width: 600px;  margin-left: auto;
			margin-right: auto;" class="striped centered">
			<thead style="background-color: #4db6ac;">
				<tr>
					<th>Nume</th>
					<th>Suma</th>
					<th>Perioada</th>
					<th>Sterge</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php


				$con = mysqli_connect('localhost', 'root','', 'login');
				if(!mysqli_select_db($con, 'login')){
					echo "Database Not selected";
				}

				$sql = "SELECT * FROM logdata";

				//execute the SQL query

				$records = mysqli_query($con, $sql);

				while($row = mysqli_fetch_array($records)){ 
					echo "<tr>";
					echo "<td>".$row['Nume']. "</td>";
					echo "<td>".$row['creditSum']. " lei </td>";
					echo "<td>".$row['credPeriod']. " luni </td>";
					?>


					<td><a class="btn-floating btn-small waves-effect waves-light red lighten-1" href= "delete.php?del= <?php echo $row['id']; ?> "><i class="material-icons">delete</i></a></td>


					<?php

				//echo "</tr>";


				}



				?>


			</tbody>
		</table>

	</div>


	<div style="height: "></div>


	<footer class="footer" id="footerPP">
		<div class="container">
			<ul class="collapsible" data-collapsible="expandable">
				<li>
					<div class="collapsible-header" id="text" ><i class="material-icons">place</i>Adresa</div>
					<div class="collapsible-body"><span><b>Adresa:  &nbsp;</b> Moldova, Chișinău, bd. Moscova 11/1</span></div>
				</li>
				<ul class="links" style="background-color: white;">
					<div class="row"> 
						<div class="col s12 m6 l2">
							<li class="footerLinks"><a href="https://www.credite.md">Principala </a></li>
						</div>
						<div class="col s12 m6 l2">
							<li class="footerLinks1" ><a href="https://www.credite.md/page/credit-fara-gaj">Credit online</a></li>
						</div>


						<div class="col s12 m6 l2">
							<li class="footerLinks" ><a href="https://www.credite.md/page/credit-cu-gaj">Credit cu gaj</a></li>
						</div>
						<div class="col s12 m6 l2">
							<li class="footerLinks1" ><a href="https://www.credite.md/page/autolombard">Linie de credit</a></li>
						</div>


						<div class="col s12 m6 l2">
							<li class="footerLinks" ><a href="https://www.credite.md/news">Noutăți</a></li>
						</div>
						<div class="col s12 m6 l2">
							<li class="footerLinks1" ><a href="https://www.credite.md/page/contacte">Contacte</a></li>
						</div>
					</div>
				</ul>


			</ul>
			<p class="copytights">Copyright © 2014-2017</p>
			<p class="copytights">CreditBunOperator de date cu caracter personal nr. 0000443</p>
		</div>
	</footer>

  


	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>



	<script type="text/javascript">
		$(document).ready(function(){

			$('.modal').modal();
		});
	</script>
	<script type="text/javascript"> 
		$('.nav-wrapper ul li').click(function() {
			$(this).siblings('li').removeClass('active');
			$(this).addClass('active');
		});
	</script>



	<script type="text/javascript">
		$(".button-collapse").sideNav();
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.carousel').carousel();
			setInterval(function() {
				$('.carousel').carousel('next');
			}, 2000);
		});

	</script>


	<script type="text/javascript">
		$(document).ready(function(){
			$('.slider').slider({indicators:false});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.collapsible').collapsible();
		});
	</script>

</body>


</html>




