

<?php

session_start();

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$fields = isset($_SESSION['fields']) ? $_SESSION['fields'] : [];


?>



<!DOCTYPE html>
<html>

<head>
	<title>Credit Bun</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="Resources/Style/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">	
	<link rel="stylesheet" href="resources/IonSlider/css/normalize.css" />
	<link rel="stylesheet" href="resources/IonSlider/css/ion.rangeSlider.css" />
	
	<link rel="stylesheet" href="resources/IonSlider/css/ion.rangeSlider.skinFlat.css" />
	<script src="resources/IonSlider/js/jquery-1.12.3.min.js"></script>
	<script src="resources/IonSlider/js/ion.rangeSlider.js"></script>

</head>

<body>

	<div class="navbar-fixed">
		<nav class="navBar">
			<div class="container">
				<div id="menu-center" class="nav-wrapper" style="padding-top: 0.1px;">
					<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

					<ul class="left hide-on-med-and-down" style="width: 100%;">
						<li class="active" id="blabb"><a href="#principala" >Principala</a></li>
						<li><a href="#credOn">Credit online</a></li>
						<li><a href="#credGaj">Credit cu gaj</a></li>
						<li><a href="#LinieCred">Linie de credit</a></li>
						<li><a href="newsPage.php">Noutati</a></li>
						<li><a href="#contacte">Contacte</a></li>
						<li class="right"><div ><a href="#modal1" class="abcd">Cont Personal</a></div></li>

					</ul>

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
					<div style="text-align: center; font-style: italic;"><h4>Cont Personal</h4></div>
					<form action="" method="post">
						<div class="input-field" id="logField"> 
							<i class="material-icons prefix" >payment</i>
							<input type="text" name="contractNr" id="N_Prenume">
							<label for="icon_prefix" >Numarul Contractului</label>
						</div>
						<div class="input-field" id="logField"> 
							<i class="material-icons prefix" >vpn_key</i>
							<input type="password" name="pass" id="cdPers"  >
							<label for="icon_prefix" >Parola</label>
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

						<div class="col s12 m12 l3"><a href="https://fontmeme.com/cool-fonts/"></a> 
							<div class="logo"><a href="/" title=""><img src="resources/Images/loggo.png"
								alt="logo" style="margin-top: 10px;"></a></div>

							</div>

							<div class="col s12 m12 l6">

								<div class="SLD" class="col s12 m6">
									<div class="slider">
										<ul class="slides">
											<li>
												<img src="resources/Images/imagSlog.png"> <!-- random image -->
												<div class="caption center-align">
													<span class="slideFont" >Credite online rapid! </span>

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


							<div class="col s12 m12 l3">

								<div class="phone-right">

									<span class="btn btn-floating  grey pulse " style="margin-right: 10px;"><i class="small material-icons prefix" style="margin-right: 10px;">phone</i></span>
									<span class="phonImg">022 838 384 </span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>


			<div class="calc">
				<div id="calcul" class="section scrollspy">
					<div class="container"> 
						<div class="calculator"> 
							<form id="contact">

								<div class="row">
									<div class="col s12 m6 l6" class="firstRange">
										<label class="sumLable">Suma: <span id="infp-sum">5000</span> Lei</label>

										<input type="hidden" id="suma" value="" name="rangeSum" /> 

									</div>
									<div class="col s12 m6 l6" class="secondRange">
										<label  class="termLable">Termen: <span id="infp-luni">12</span> luni</label>
										<input type="hidden" id="perioada" value="" name="rangePeriod" /> 
									</div>
								</div>
								<div class="toggle">
									<lable class="PlataLn">  Plata Lunaaaara:  <span id="plLunara"> 0 </span> Lei</lable>
									<br><br> 
									<div class="divider"></div><br> 
									<div class="row">
										<div class="col s12 m12 l4"> 
											<lable class="CostImpr">Cost Imprumut:<b> <span id="CostImpr_id" style="color: black; font-style: normal"> 0 </span></b> Lei </lable>
										</div>
										<div class="col s12 m12 l4"> 
											<lable class="dae">DAE: <b><span id="dae_id" style="color: black; font-style: normal"> 0 </span></b> % </lable>
										</div>
										<div class="col s12 m12 l4"> 
											<lable class="totalPlata">Total spre plata:<b> <span id="totalPlata_id" style="color: black; font-style: normal"> 0 </span></b> lei </lable>
										</div>

									</div>
								</div>


								<div class="divider"></div>


								<p class="CreditMessage" class="z-depth-5" id="calcText">Se acordă în cîteva minute, oriunde în Moldova, doar cu buletinul, fără gaj și fără comision acordare! </p>
								<p class="Campuri_Cerere"> Completați cele 3 cîmpuri de mai jos și trimiteți o cerere! </p><br>

								<div class="row">

									<div class="input-field col s12 m12 l4" class="Nume"> 
										<i class="material-icons prefix" >account_circle</i>
										<input type="text" name="name" id="Nume_Prenume">
										<label for="icon_prefix">Nume, Prenume</label>
									</div>
									<div class="input-field col s12 m12 l4" class="CodP"> 
										<i class="material-icons prefix">payment</i>
										<input type="text" name="codPers" id="codPersonal" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
										<label for="icon_prefix">Cod Personal(13 cifre)</label>
									</div>
									<div class="input-field col s12 m12 l4" class="Tel"> 
										<i class="material-icons prefix">phone</i>
										<input type="text" name="tel" id="telefon" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
										<label for="icon_prefix">Telefon</label>
									</div>
								</div>

								<div class="row">
									<div class="col s12" style="text-align: center;">
										<input type="checkbox" id="chkId" checked="checked" value="1"><label for="chkId"> Dau acordul la prelucrarea datelor mele cu caracter personal.</label>
									</div>
								</div>


								<p style="text-align: center;"><a class="waves-effect waves-light btn-large" id="submit-btn">TRIMITE CERERE</a></p>
								<br> 
							</form>
						</div>
						<div class="fixed-action-btn">
							<a id="menu" class="waves-effect waves-light red btn-medium btn-floating"><i class="material-icons">menu</i></a>
						</div>
						<div class="tap-target grey" data-activates="menu">
							<div class="tap-target-content">
								<h5 style="color:red; padding-left: 35px;"> &nbsp; CERERE PRIMITĂ CU SUCCES!</h5>
								<p style="font-size: 21px; margin-left: 15px;"> &nbsp; Va fi procesată în 15 minute, conform următorului grafic de lucru:</p>
								<p><strong>Lu - Vi:</strong> 08:00 - 19:00,<strong>Sî - Du: 09:00 - 18:00</strong></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<br>
			<div class="container" > 
				<div class="row">
					<div class="col s12 m12 l4">
						<div class="credType">
							<a href="#credOn">
								<div class="Image"><img src="resources/Images/computer.png"></div> </a>
								<p class="TypeCred_Text">CREDIT ONLINE</p>
								<div class="text"> pînă la 15 mii lei, se acordă în cîteva minute, doar cu buletinul, în orice localitate a Moldovei. Detalii...
									<a href="#credOn">  <i class="material-icons prefix" style="color:red;">play_arrow</i> </a>
								</div>
							</div>
						</div>
						<div class="col s12 m12 l4">
							<div class="credType">
								<a href="#credGaj">
									<div class="Image"><img src="resources/Images/buildings.png"></div> </a>
									<p class="TypeCred_Text">CREDIT CU GAJ</p>
									<div class="text"> 
										pînă la 50 mii lei, se acordă într-o oră, doar cu buletinul și documentele pe gaj (automobil sau imobil). Detalii...
										<a href="#credGaj">  <i class="material-icons prefix" style="color:red;">play_arrow</i> </a>
									</div>
								</div>
							</div>
							<div class="col s12 m12 l4">
								<div class="credType">
									<a href="#LinieCred">
										<div class="Image"><img src="resources/Images/credit-card.png"></div> </a>
										<p class="TypeCred_Text">LINIE DE CREDIT</p>
										<div class="text">  pînă la 50 mii lei, se acordă în cîteva minute, doar cu buletinul, în orice localitate a Moldovei. Detalii... 
											<a href="#LinieCred">  <i class="material-icons prefix" style="color:red;">play_arrow</i> </a>
										</div>
									</div>
								</div>
							</div>
						</div>



						<div class="advantages"> 
							<div class="container">	

								<div class="row"> 
									<div class="col s12 m6 l12">
										<p class="text">AVANTAJELE NOASTRE:</p></div>
									</div>
									<div class="row">
										<div class="col s12 m6 l6">
											<p class="advList" style="margin-left: 4%;">
												<span class="btn btn-floating btn-large  teal lighten-2 pulse " > 
													<i class="material-icons prefix">star</i>
												</span>Primul credit gratis!
											</p>
										</div>

										<div class="col s12 m6 l6"><p class="advList">
											<span class="btn btn-floating btn-large  teal lighten-2 pulse ">
												<i class="material-icons prefix">language</i></span>În toată Moldova!</p>
											</div>
										</div>
										<div class="row">
											<div class="col s12 m6 l6"><p class="advList">
												<span class="btn btn-floating btn-large teal lighten-2 pulse ">
													<i class="material-icons prefix">picture_in_picture</i>
												</span>Doar cu buletinul!</p></div>

												<div class="col s12 m6 l6">
													<p class="advList">
														<span class="btn btn-floating btn-large teal lighten-2 pulse ">
															<i class="material-icons prefix">alarm_on</i></span>Decizie in 15 min!</p>
														</div>
													</div>


													<p style="text-align: center; "><a class="waves-effect waves-light btn-large" href="#calcul">TRIMITE CERERE</a></p><br>

												</div>
											</div>





											<div class="creditProcess"> 
												<div class="container">
													<p class="text">CUM PRIMIȚI BANII?</p>
													<div class="row">
														<div class="col s12 m12 l2" >
															<div class="processItem"> 
																<img src="resources/Images/cerere.png">
																<div class="textDesc"><p>DEPUNEȚI CERERE <br> în oficiu, online, la telefon</p></div>

															</div>
														</div>


														<div class="col s12 m12 l3"  >
															<div class="processItem" >  
																<span class="btn btn-floating btn-large teal lighten-2 pulse" style="margin-top: 20px;">
																	<i class="material-icons prefix" >swap_horiz</i></span><br><br> 
																</div>
															</div>
															<div class="col s12 m12 l2">
																<div class="processItem"> 
																	<img src="resources/Images/decizia.png">
																	<div class="textDesc"><p>AȘTEPTAȚI DECIZIA <br>cca 15 min</p></div>

																</div>
															</div>

															<div class="col s12 m12 l3" >
																<div class="processItem" > 

																	<span class="btn btn-floating btn-large teal lighten-2 pulse " style="margin-top: 20px;">
																		<i class="material-icons prefix">swap_horiz</i></span>
																	</div>
																</div>
																<div class="col s12 m12 l2" >
																	<div class="processItem"  > 
																		<img src="resources/Images/primBanii.png">
																		<div class="textDesc"><p>PRIMIȚI BANII <br> în oficiu, la bancă, la poștă</p></div>

																	</div>
																</div>

															</div>
															<p style="text-align: center; "><a class="waves-effect waves-light btn-large" href="#calcul">TRIMITE CERERE</a></p><br>
														</div>

													</div>

													<div class="aboutCredit"> 

														<div class="container">
															<p class="text">DESPRE CREDITBUN:</p><br><br>

															<div class="facebook" style="float: left;"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCreditBun%2F&tabs=timeline&width=400&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="200" style="border:none;overflow:hidden;  " scrolling="no" frameborder="0" allowTransparency="true"></iframe>
																<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.credite.md%2F&width=200&layout=box_count&action=like&size=large&show_faces=true&share=true&height=65&appId" width="70" height="100" style="border:none;overflow:hidden;margin-bottom: 100px;  float: left;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

															</div>

															<p class="descText">   &nbsp; Credit Bun este companie de creditare, care din anul 2010 acordăm credite foarte rapid, astfel încît cu efort minim, să primiți banii imediat atunci cînd aveți nevoie.</p>

															<p class="descText"> &nbsp; Pentru a primi la noi un credit rapid și simplu, este destul să depuneți o cerere online pe site, sau prin telefon, la orice număr afișat mai jos. În maxim 15 minute Vă oferim răspuns la cererea depusă, iar banii îi puteți ridica cu buletinul din orice localitate a Moldovei, prin intermediul Oficiilor Poștale, sau a Băncii unde aveți deschis cont bancar.
															</p>

															<p class="descText"> &nbsp; Ca rezultat al alegerii Credit Bun, veți obține împrumut la timp, fără bătăi de cap, iar dorințele Dvs vor fi realizate mai ușor.</p>

															<p class="descText"> &nbsp; Cînd aveți necesitate de bani urgent, aplicați pentru un credit la Credit Bun, este mai simplu decît credeți și mai rapid decît Vă așteptați.
																Pentru orice detalii nu ezitați să ne contactați :)</p>
															</div>


														</div>	

														<div class="news"> 
															<div class="container">
																<p class="text"> NOUTĂȚI BUNE:</p>
																<div class="row">
																	<div class="col s12 m12 l12">
																		<div class="carousel">

																			<a class="carousel-item" href="newsPage.html"><img src="resources/newsImg/1.png"></a>
																			<a class="carousel-item" href="newsPage.html"><img src="resources/newsImg/19.png"></a>
																			<a class="carousel-item" href="newsPage.html"><img src="resources/newsImg/15.png"></a>
																			<a class="carousel-item" href="newsPage.html"><img src="resources/newsImg/17.png"></a>
																			<a class="carousel-item" href="newsPage.html"><img src="resources/newsImg/14.jpg"></a>
																		</div>
																	</div>
																</div>
															</div>


														</div>

														<div class="section scrollspy" id="credOn">
															<div class="credIcon">
																<div class="container" style="font-size: 35px; font-weight: 700; color:white; ">
																	<div class="row">
																		<div class="col s12 m6 l3">
																			<span style="  "><img src="resources/Images/computer.png" style=" box-shadow: 0 10px 50px 0 rgba(190, 0, 0, 0.8); background-color: white; border-radius: 50%;  margin-bottom: -25px; ">
																			</span>
																		</div>

																		<div class="col s12 m6 l9" style="margin-top: 40px;"> CREDITE ONLINE </div>

																	</div>
																</div>
															</div>	
														</div>

														<div class="credOnlineText">
															<div class="container">
																<h5  id="credOnlineText"> <strong>CONDITII CREDITE ONLINE:</strong> </h5>
																<ul>
																	<li><span><strong><em>Suma: </em></strong> de la 1 000 pînă la 15 000 lei. Pînă la suma de 3 000 lei, primul credit se acordă gratis.<span></li>
																	<li ><span><strong><em>Perioada de rambursare: </em></strong>  de la 2 luni (61 zile) pînă la 24 luni.</span></li>
																	<li><span><strong><em>Suma: </em></strong> de la 1 000 pînă la 15 000 lei. Pînă la suma de 3 000 lei, primul credit se acordă gratis.<span></li>
																	<li ><span><strong><em>Dobînda: </em></strong> se caclulează de la soldul rămas al împrumutului și variază în dependență de suma și termenul ales. Calculul orientativ al indicatorilor principali îl puteți vedea pe pagina principală. Coeficientul DAE maxim în % este 798,32 (pentru împrumut de 1000 lei pe termen de 61 zile).</span></li>
																	<li><span><strong><em>Graficul de rambursare: </em></strong> se formează după metoda anuității, în plăți lunar egale. Dvs individual alegeți data de plată.<span></li>
																	<li ><span><strong><em>Comisioane: </em></strong> Nu percepem vre-un comision sau vre-o altă plată suplimentară, decît dobînda!</span></li>
																</ul>

																<h5  id="credOnlineText"> <strong>CERINȚE FAȚĂ DE CLIENȚI:</strong> </h5>
																<ul>
																	<li><span> Vîrstă 18-70 ani.<span></li>
																	<li ><span>Aveți buletin de identitate valabil, cu viză de domiciliu de lungă durată în R. Moldova.</span></li>
																	<li><span>Aveți venit lunar stabil din orice sursă (salariu, afacere, transferuri, lucrări sezoniere, alte venituri neoficiale), sau dețineți careva proprietăți pe numele Dvs, fără a pune gaj (casă, apartament, automobil etc).<span></li>
																	<li ><span>Dacă nu aveți venit lunar și nici proprietăți, Vă propunem să găsiți o persoană garant (fidejusor) cu venit lunar stabil, sau cu proprietăți pe numele său.</span></li>
																	<li><span>Nu este obligator să dețineți un cont bancar.<span></li>
																	<li ><span>Clienții repetați beneficiază de reduceri.</span></li>
																</ul>


																<h5 id="credOnlineText"> <strong>EXEMPLU DE COSTURI PENTRU UN ÎMPRUMUT DE 5 000 LEI:</strong> </h5>
																<ul>
																	<li><span> Suma spre eliberare: 5 000 lei<span></li>
																	<li ><span>Perioada de rambursare: 12 luni</span></li>
																	<li><span>Rata lunară: 672 lei<span></li>
																	<li ><span>Comision de eliberare împrumut: 0 lei</span></li>
																	<li><span>Comision de gestiune sau garanție: 0 lei<span></li>
																	<li ><span>DAE: 158,90 %</span></li>
																	<li ><span>Costul total al împrumutului: 3 064 lei</span></li>
																	<li ><span>Valoarea total plătibilă: 8 064 lei</span></li>
																</ul>

																<h5  id="credOnlineText"> <strong>CUM PRIMIȚI CREDIT ONLINE? - MAI SIMPLU NU SE POATE!</strong> </h5>
																<ul>
																	<li><span> Depuneți o cerere online sau la telefon. La dorință o puteți depune și la oficiu.<span></li>
																	<li ><span>În decurs de 15 min examinăm cererea și Vă anunțăm decizia. Dacă ați depus cererea de credit în afara orelor de lucru, Vă contactăm în prima oră a următoarei zile de lucru.</span></li>
																	<li><span>Cînd decizia este pozitivă, semnați contractul de împrumut la noi în oficiu, sau la unul din partenerii noștri din teritoriu.<span></li>
																	<li ><span>Banii îi puteți primi în numerar la noi în oficiu, sau la orice oficiu poștal, sau prin transfer pe contul Dvs 
																		<strong>fără a veni în oficiu.</strong></span></li>

																	</ul>

																	<p style="font-size: 20px;"><strong><em>A primi un credit la noi, e mai simplu și rapid. Sunați sau trimiteți o cerere online!</em></strong></p>

																	<p style="text-align: center; "><a class="waves-effect waves-light btn-large" href="#calcul">TRIMITE CERERE</a></p><br>

																</div>
															</div>


															<div class="section scrollspy" id="credGaj">
																<div class="credIcon">
																	<div class="container" style="font-size: 35px; font-weight: 700; color:white; ">
																		<div class="row">
																			<div class="col s12 m6 l3">
																				<span style="  "><img src="resources/Images/buildings.png" style=" box-shadow: 0 10px 50px 0 rgba(190, 0, 0, 0.8); background-color: white; border-radius: 50%;  margin-bottom: -25px; ">
																				</span>
																			</div>

																			<div class="col s12 m6 l9" style="margin-top: 40px;"> CREDITE CU GAJ</div>

																		</div>
																	</div>
																</div>	
															</div>

															<div class="credOnlineText">
																<div class="container">
																	<h5  id="credOnlineText"> <strong>CONDITII DE ACORDARE CREDITE CU GAJ:</strong> </h5>
																	<ul>
																		<li><span><strong><em>Suma: </em></strong> de la 1 000 pînă la 15 000 lei. Pînă la suma de 3 000 lei, primul credit se acordă gratis.<span></li>
																		<li ><span><strong><em>Perioada de rambursare: </em></strong>  de la 2 luni (61 zile) pînă la 24 luni.</span></li>
																		<li><span><strong><em>Suma: </em></strong> de la 1 000 pînă la 15 000 lei. Pînă la suma de 3 000 lei, primul credit se acordă gratis.<span></li>
																		<li ><span><strong><em>Dobînda: </em></strong> se caclulează de la soldul rămas al împrumutului și variază în dependență de suma și termenul ales. Calculul orientativ al indicatorilor principali îl puteți vedea pe pagina principală. Coeficientul DAE maxim în % este 798,32 (pentru împrumut de 1000 lei pe termen de 61 zile).</span></li>
																		<li><span><strong><em>Graficul de rambursare: </em></strong> se formează după metoda anuității, în plăți lunar egale. Dvs individual alegeți data de plată.<span></li>
																		<li ><span><strong><em>Comisioane: </em></strong> Nu percepem vre-un comision sau vre-o altă plată suplimentară, decît dobînda!</span></li>
																	</ul>

																	<h5  id="credOnlineText"> <strong>CERINȚE FAȚĂ DE CLIENȚI:</strong> </h5>
																	<ul>
																		<li><span> Vîrstă 18-70 ani.<span></li>
																		<li ><span>Aveți buletin de identitate valabil, cu viză de domiciliu de lungă durată în R. Moldova.</span></li>
																		<li><span>Aveți venit lunar stabil din orice sursă (salariu, afacere, transferuri, lucrări sezoniere, alte venituri neoficiale), sau dețineți careva proprietăți pe numele Dvs, fără a pune gaj (casă, apartament, automobil etc).<span></li>
																		<li ><span>Dacă nu aveți venit lunar și nici proprietăți, Vă propunem să găsiți o persoană garant (fidejusor) cu venit lunar stabil, sau cu proprietăți pe numele său.</span></li>
																		<li><span>Nu este obligator să dețineți un cont bancar.<span></li>
																		<li ><span>Clienții repetați beneficiază de reduceri.</span></li>
																	</ul>


																	<h5 id="credOnlineText"> <strong>EXEMPLU DE COSTURI PENTRU UN ÎMPRUMUT DE 5 000 LEI:</strong> </h5>
																	<ul>
																		<li><span> Suma spre eliberare: 5 000 lei<span></li>
																		<li ><span>Perioada de rambursare: 12 luni</span></li>
																		<li><span>Rata lunară: 672 lei<span></li>
																		<li ><span>Comision de eliberare împrumut: 0 lei</span></li>
																		<li><span>Comision de gestiune sau garanție: 0 lei<span></li>
																		<li ><span>DAE: 158,90 %</span></li>
																		<li ><span>Costul total al împrumutului: 3 064 lei</span></li>
																		<li ><span>Valoarea total plătibilă: 8 064 lei</span></li>
																	</ul>

																	<h5  id="credOnlineText"> <strong>CUM PRIMIȚI CREDIT ONLINE? - MAI SIMPLU NU SE POATE!</strong> </h5>
																	<ul>
																		<li><span> Depuneți o cerere online sau la telefon. La dorință o puteți depune și la oficiu.<span></li>
																		<li ><span>În decurs de 15 min examinăm cererea și Vă anunțăm decizia. Dacă ați depus cererea de credit în afara orelor de lucru, Vă contactăm în prima oră a următoarei zile de lucru.</span></li>
																		<li><span>Cînd decizia este pozitivă, semnați contractul de împrumut la noi în oficiu, sau la unul din partenerii noștri din teritoriu.<span></li>
																		<li ><span>Banii îi puteți primi în numerar la noi în oficiu, sau la orice oficiu poștal, sau prin transfer pe contul Dvs 
																			<strong>fără a veni în oficiu.</strong></span></li>

																		</ul>

																		<p style="font-size: 20px;"><strong><em>A primi un credit la noi, e mai simplu și rapid. Sunați sau trimiteți o cerere online!</em></strong></p>

																		<p style="text-align: center; "><a class="waves-effect waves-light btn-large" href="#calcul">TRIMITE CERERE</a></p><br>

																	</div>
																</div>

																<div class="section scrollspy" id="LinieCred">
																	<div class="credIcon">
																		<div class="container" style="font-size: 35px; font-weight: 700; color:white; ">
																			<div class="row">
																				<div class="col s12 m6 l3">
																					<span style="  "><img src="resources/Images/credit-card.png" style=" box-shadow: 0 10px 50px 0 rgba(190, 0, 0, 0.8); background-color: white; border-radius: 50%;  margin-bottom: -25px; ">
																					</span>
																				</div>

																				<div class="col s12 m6 l9" style="margin-top: 40px;">LINIE DE CREDIT</div>

																			</div>
																		</div>
																	</div>	
																</div>

																<div class="credOnlineText">
																	<div class="container">
																		<h5  id="credOnlineText"> <strong>CONDIȚII LINIE DE CREDIT:</strong> </h5>
																		<ul>
																			<li><span><strong><em>Suma: </em></strong> de la 1 000 pînă la 50 000 lei. Pînă la 15 000 lei se acordă fără gaj, iar de la 15 001 - 50 000 lei se acordă cu gaj automobil sau imobil.<span></li>
																			<li ><span><strong><em>Perioada de rambursare: </em></strong>  pînă la 24 luni.</span></li>
																			<li ><span><strong><em>Dobînda: </em></strong> se caclulează de la soldul rămas al împrumutului și variază în dependență de suma și termenul ales. Calculul orientativ al indicatorilor principali îl puteți vedea pe pagina principală..</span></li>
																			<li><span><strong><em>Graficul de rambursare: </em></strong> Alegeți data de plată, în care lunar veți achita cel puțin dobînda, iar împrumutul îl trageți și-l rambursați după necesitate în limita plafonului maxim stabilit.<span></li>
																			<li ><span><strong><em>Comisioane: </em></strong> Nu percepem vre-un comision sau vre-o altă plată suplimentară, decît dobînda!</span></li>
																		</ul>

																		<h5  id="credOnlineText"> <strong>CERINȚE FAȚĂ DE CLIENȚI:</strong> </h5>
																		<ul>
																			<li><span> Vîrstă 18-70 ani.<span></li>
																			<li ><span>Aveți buletin de identitate valabil, cu viză de domiciliu de lungă durată în R. Moldova.</span></li>
																			<li><span>Aveți venit lunar stabil din orice sursă (salariu, afacere, transferuri, lucrări sezoniere, alte venituri neoficiale), sau dețineți careva proprietăți pe numele Dvs, fără a pune gaj (casă, apartament, automobil etc).<span></li>
																			<li ><span>Dacă nu aveți venit lunar și nici proprietăți, Vă propunem să găsiți o persoană garant (fidejusor) cu venit lunar stabil, sau cu proprietăți pe numele său.</span></li>
																			<li><span>Nu este obligator să dețineți un cont bancar.<span></li>
																			<li ><span>Clienții repetați beneficiază de reduceri.</span></li>
																		</ul>

																		<h5  id="credOnlineText"> <strong>CUM PRIMIȚI CREDIT ONLINE? - MAI SIMPLU NU SE POATE!</strong> </h5>
																		<ul>
																			<li><span> Depuneți o cerere online sau la telefon. La dorință o puteți depune și la oficiu.<span></li>
																			<li ><span>În decurs de 15 min examinăm cererea și Vă anunțăm decizia. Dacă ați depus cererea de credit în afara orelor de lucru, Vă contactăm în prima oră a următoarei zile de lucru.</span></li>
																			<li><span>Cînd decizia este pozitivă, semnați contractul de împrumut la noi în oficiu, sau la unul din partenerii noștri din teritoriu.<span></li>
																			<li ><span>Banii îi puteți primi în numerar la noi în oficiu, sau la orice oficiu poștal, sau prin transfer pe contul Dvs 
																				<strong>fără a veni în oficiu.</strong></span></li>

																			</ul>

																			<p style="font-size: 20px;"><strong><em>A primi un credit la noi, e mai simplu și rapid. Sunați sau trimiteți o cerere online!</em></strong></p>

																			<p style="text-align: center; "><a class="waves-effect waves-light btn-large" href="#calcul">TRIMITE CERERE</a></p><br>

																		</div>
																	</div>


																	<div class="section scrollspy" id="contacte">
																		<div class="credIcon">
																			<div class="container" style="font-size: 35px; font-weight: 700; color:white; ">
																				<div class="row">
																					<div class="col s12 m6 l3">
																						<span style="  "><img src="resources/Images/credit-card.png" style=" box-shadow: 0 10px 50px 0 rgba(190, 0, 0, 0.8); background-color: white; border-radius: 50%;  margin-bottom: -25px; ">
																						</span>
																					</div>

																					<div class="col s12 m6 l9" style="margin-top: 40px;">Contacte</div>

																				</div>
																			</div>
																		</div>	
																	</div>

																	<div class="contacts" style="height: 100%;">
																		<div class="container">
																			<div id="map" style="height: 500px; width: 100%; border:3px solid grey">

																				<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyCw-8jNBgA5w5tQ_v502-McgscoWgWLzOw '></script><div style='overflow:hidden;height:100%;width:100%;'><div id='gmap_canvas' style='height:100%;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://mapswebsite.org/'>https://mapswebsite.org</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=22876c9d5063d21cc1fb527b940a25253ca76329'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:14,center:new google.maps.LatLng(47.05241291206542,28.865267397900432),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(47.05241291206542,28.865267397900432)});infowindow = new google.maps.InfoWindow({content:'<strong>CreditBun</strong><br>Bulevardul Moscova 11/1<br>MD-2068 Chisinau<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
																			</div>

																			<ul id="" class="tabs" style="text-align: center;">

																				<li class="tab col s3"><a href="#swipe-1">Program de lucru</a></li>
																				<li class="tab col s3"><a class="active" href="#swipe-2">Telefoane de contact</a></li>
																				<li class="tab col s3"><a href="#swipe-3">Datele bancare</a></li>
																			</ul>



																			<div id="swipe-1" class="Tabs col s12">
																				<div class="row">
																					<div class="col s12 m6 l6">
																						<p>Luni - Vineri: 08:00 - 19:00 (fără pauză)</p>
																					</div>
																					<div class="col s12 m6 l6">
																						<p>Sîmbătă - Duminică: 09:00 - 18:00 (fără pauză)</p>
																					</div><span style="color:white">c</span>

																				</div>
																			</div>
																			<div id="swipe-2" class="Tabs col s12">
																				<div class="row" style="">
																					<div class="col s12 m6 l4">
																						<p>022 838 384, 060 726 888 - Creditare</p>
																					</div>
																					<div class="col s12 m6 l4">
																						<p>022 838 377, 060 860 555 - Contabilitate</p>
																					</div>
																					<div class="col s12 m6 l4">
																						<p>067 144 174 - Jurist</p>
																					</div><span style="color:white">c</span>
																				</div>
																			</div>
																			<div id="swipe-3" class="Tabs col s12">
																				<div class="row" style="">
																					<div class="col s12 m6 l6">
																						<p>FINCOMBANK S.A., Filiala nr. 06, mun. Chișinău, IBAN: MD70FT222440600000440498</p>
																					</div>
																					<div class="col s12 m6 l6">
																						<p>VICTORIABANK S.A., Filiala nr. 03, mun. Chișinău, IBAN: MD04VI022240300000389MDL</p>
																					</div>
																				</div>
																			</div>
																		</div>

																	</div>


																	<footer class="footer">
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




																	<script src="resources/js/scripts.js"></script>


																	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script>



																	<script type="text/javascript">
																		$(document).ready(function () {
																			var str1 = "Creditele peste 15 000 lei, se acordă cu gaj automobil sau imobil. Pentru mai multe detalii nu ezitați să ne contactați.";
																			var str2 = "Se acordă în cîteva minute, oriunde în Moldova, doar cu buletinul, fără gaj și fără comision acordare!";

																			$("#suma").on( "change input", function () {
																				var suma = parseInt($(this).val());
																				var perioada = parseInt($('#perioada').val());
																				var plataLunara, dae, costImpr, totalPlata;

																				if(suma == '50000'){
																					$('.toggle').slideUp().hide(0);
																					$('#calcText').text(str1);
																				}

																				else {
																					$('.toggle').slideDown().show(0);
																					$('#calcText').text(str2);
																				}
																				plataLunara = suma / perioada + suma * 0.09;
																				dae = suma * 0.0856 + perioada*3;
																				costImpr = 3 * dae + perioada * 4;
																				totalPlata = suma + costImpr; 
																			//plataLunara = plataLunara.toFixed(2);

																			$("#plLunara").html(plataLunara.toFixed(2));
																			$("#CostImpr_id").html(costImpr.toFixed(2));
																			$("#dae_id").html(dae.toFixed(2));
																			$("#totalPlata_id").html(totalPlata.toFixed(2));


																		});



																			$("#perioada").on( "change input", function () {
																				var perioada =  $(this).val();
																				var suma = parseInt($('#suma').val());

																				var plataLunara, dae, costImpr, totalPlata;


																				plataLunara = suma / perioada + suma * 0.09;
																				dae = suma * 0.0856 + perioada*3;
																				costImpr = 3 * dae + perioada * 4;
																				totalPlata = suma + costImpr; 
																			//plataLunara = plataLunara.toFixed(2);

																			$("#plLunara").html(plataLunara.toFixed(2));
																			$("#CostImpr_id").html(costImpr.toFixed(2));
																			$("#dae_id").html(dae.toFixed(2));
																			$("#totalPlata_id").html(totalPlata.toFixed(2));


																		});


																		});
																	</script> 



																	<script type="text/javascript">
																		$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
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
	$(document).ready(function(){
		$('.scrollspy').scrollSpy();
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



<?php

unset($_SESSION['errors']);
?>