 


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
						<li ><a href="mainPage.php" >Principala</a></li>
						<li><a href="mainPage.php#credOn">Credit online</a></li>
						<li><a href="mainPage.php#credGaj">Credit cu gaj</a></li>
						<li><a href="mainPage.php#LinieCred">Linie de credit</a></li>
						<li  class="active"><a href="#noutati">Noutati</a></li>
						<li><a href="mainPage.php#contacte">Contacte</a></li>
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


<div>
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
		 
			<div class="container" >

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


						<div class="col s12 m12 l3">

							<div class="phone-right">

								<span class="btn btn-floating  grey pulse " style="margin-right: 10px;"><i class="small material-icons prefix" style="margin-right: 10px;">phone</i></span>
								<span class="phonImg">022 838 384 </span>
							</div>
						</div>
					</div>
				</div>
		 
		</header>

		<div class="credIcon">
			<div class="container" style="font-size: 35px; font-weight: 700; color:white; ">
				<div class="row">
					<div class="col s12 m6 l3">
						<span style="  "><img src="resources/newsImg/text-lines-2.png" style=" box-shadow: 0 10px 50px 0 rgba(190, 0, 0, 0.8); background-color: white; border-radius: 50%;  margin-bottom: -25px; ">
						</span>
					</div>

					<div class="col s12 m6 l9" style="margin-top: 40px;"> NOUTATI </div>

				</div>
			</div>
		</div>	

		<div class="newsPP" style=" padding: 10px 10px 10px 10px; height: 100%;">
			<div class="newsType" style="">
				<div class="container" style="">
					<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
						<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
							<a class="imgDiv" ><img src="resources/newsImg/2.png"  class="newsImg"></a>
						</div>
						<div class="col s10 m10 l10 left-align" style="  ">
							<div> 
								<h4> Primul credit Gratis! </h4>
								<p>06-07-2017</p>
								<p>CreditBun e cel mai bun! Vă dăm posibilitatea să beneficiați absolut gratis, de un împrumut pînă la 3000 lei, pentru o perioadă de pînă la 30 zile.  Banii se acorda în 15 minute și pot fi primiți la noi în oficiu,…</p></div>
							</div>

						</div>
					</div>
				</div>
				<div class="newsType" style="">
					<div class="container" style="">
						<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
							<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
								<a class="imgDiv" ><img src="resources/newsImg/10.png"  class="newsImg"></a>
							</div>
							<div class="col s10 m10 l10 left-align" style="  ">
								<div> 
									<h4> Lucrăm și în Weekend </h4>
									<p>01-07-2017</p>
									<p>Vrei să obții un credit, dar ești foarte încărcat în timpul săptămînii? Soluția o găsești la noi - primești un credit chiar și în weekend! Pentru comoditatea clienților noștri am modificat programul de lucru. Astfel, în zilele de Luni -…</p></div>
								</div>

							</div>
						</div>
					</div>
					
						<div class="newsType" style="">
							<div class="container" style="">
								<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
									<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
										<a class="imgDiv" ><img src="resources/newsImg/11.png"  class="newsImg"></a>
									</div>
									<div class="col s10 m10 l10 left-align" style="  ">
										<div> 
											<h4> 
Credit mai rapid!</h4>
											<p>15-11-2016</p>
											<p>În scopul deservirii rapide a clienților săi, CreditBun a micșorat termenul de examinare a cererilor de împrumut pîna la 15 minute. Acest fapt este valabil pentru toate produsele și sumele solicitate, inclusiv pentru cererile depuse online.  Reamintim, că cerea pentru…</p></div>
										</div>

									</div>
								</div>
							</div>
							
								<div class="newsType" style="">
									<div class="container" style="">
										<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
											<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
												<a class="imgDiv" ><img src="resources/newsImg/1.png"  class="newsImg"></a>
											</div>
											<div class="col s10 m10 l10 left-align" style="  ">
												<div> 
													<h4>
Calculator credit </h4>
													<p>04-11-2016</p>
													<p>Banii iubesc calculați și numărați!Calculează-ți posibilitățile cu ajutorul calculatorului de pe site și numără banii primiți de la noi  Cînd ai nevoie de bani - poți conta pe CreditBun. Oricînd poți trimite o cerere de împrumut prin telefon sau online...</p></div>
												</div>

											</div>
										</div>
									</div>
									<div class="newsType" style="">
										<div class="container" style="">
											<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
												<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
													<a class="imgDiv" ><img src="resources/newsImg/10.png"  class="newsImg"></a>
												</div>
												<div class="col s10 m10 l10 left-align" style="  ">
													<div> 
														<h4> 
Cere credit online! </h4>
														<p>02-11-2016</p>
														<p>Apreciem timpul Dvs. Pentru a depune o cerere de împrumut nu este necesar să veniți la oficiu, o puteți face online.</p></div>
													</div>

												</div>
											</div>
										</div>
										<div class="newsType" style="">
											<div class="container" style="">
												<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
													<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
														<a class="imgDiv" ><img src="resources/newsImg/15.png"  class="newsImg"></a>
													</div>
													<div class="col s10 m10 l10 left-align" style="  ">
														<div> 
															<h4> 
Credit pentru anvelope</h4>
															<p>01-11-2016</p>
															<p>Pentru siguranța ta și a familiei tale, este necesar să schimbi din timp anvelopele de iarnă.Cînd ai nevoie de bani, sună la 022 838 384, sau trimite o cerere pe www.credite.md și primești credit în cîteva minute!</p></div>
														</div>

													</div>
												</div>
											</div>
											<div class="newsType" style="">
												<div class="container" style="">
													<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
														<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
															<a class="imgDiv" ><img src="resources/newsImg/12.png"  class="newsImg"></a>
														</div>
														<div class="col s10 m10 l10 left-align" style="  ">
															<div> 
																<h4> 
Credit pentru nunta</h4>
																<p>27-09-2016</p>
																<p>E timpul să faceți un pas important în viață, iar CreditBun îți va fi alături financiar. Cînd Vă hotărîți, trimiteți o cerere online pe www.credite.md și primiți banii foarte rapid.</p></div>
															</div>

														</div>
													</div>
												</div>
												<div class="newsType" style="">
													<div class="container" style="">
														<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
															<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																<a class="imgDiv" ><img src="resources/newsImg/8.png"  class="newsImg"></a>
															</div>
															<div class="col s10 m10 l10 left-align" style="  ">
																<div> 
																	<h4>
Credit pentru sanatate </h4>
																	<p>23-09-2016</p>
																	<p>Sănătatea trebuie să fie prioritatea ta nr.1. Ai grijă să faci o examinare medicală și să fii sigur că totul este în regulă. Dacă nu ai suficienți bani, CreditBun te ajută. Trimite acum o cerere online pe www.credite.md.</p></div>
																</div>

															</div>
														</div>
													</div>
													<div class="newsType" style="">
														<div class="container" style="">
															<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																	<a class="imgDiv" ><img src="resources/newsImg/7.png"  class="newsImg"></a>
																</div>
																<div class="col s10 m10 l10 left-align" style="  ">
																	<div> 
																		<h4> Credite pentru scoală </h4>
																		<p>09-08-2016</p>
																		<p>Deja ați făcut lista de cumpărături pentru noul an scolar? Dacă e prea mare, te ajutăm noi să te descurci. Copilul tău merită tot ce e mai bun! Obţine un împrumut fără gaj de la CreditBun.</p></div>
																	</div>

																</div>
															</div>
														</div>
														<div class="newsType" style="">
															<div class="container" style="">
																<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																	<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																		<a class="imgDiv" ><img src="resources/newsImg/18.png"  class="newsImg"></a>
																	</div>
																	<div class="col s10 m10 l10 left-align" style="  ">
																		<div> 
																			<h4> 
Credit pentru vacanta</h4>
																			<p>21-07-2016</p>
																			<p>E vara, e timpul să evadezi la mare! Cu CreditBun te poți bucura de o vacanță fără griji. Pentru a primi un credit rapid si simplu, trimite o cerere pe site și lasă valurile mării să te răsfețe din plin. :)</p></div>
																		</div>

																	</div>
																</div>
															</div>
															<div class="newsType" style="">
																<div class="container" style="">
																	<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																		<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																			<a class="imgDiv" ><img src="resources/newsImg/5.jpg"  class="newsImg"></a>
																		</div>
																		<div class="col s10 m10 l10 left-align" style="  ">
																			<div> 
																				<h4> 
Autolombard - bani garantat! </h4>
																				<p>20-04-2016</p>
																				<p>In viata pot interveni diferite situatii cind ai nevoie de bani foarte urgent (devamare marfa, achitare credit restant, intoarcere datorie, achitare operatie, decesul unei rude etc.).  De obicei, in asemenea cazuri sa obtii un imprumut la banca sau organizatii de…</p></div>
																			</div>

																		</div>
																	</div>
																</div>
																<div class="newsType" style="">
																	<div class="container" style="">
																		<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																			<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																				<a class="imgDiv" ><img src="resources/newsImg/14.jpg"  class="newsImg"></a>
																			</div>
																			<div class="col s10 m10 l10 left-align" style="  ">
																				<div> 
																					<h4> 
Credit rapid</h4>
																					<p>06-04-2016</p>
																					<p>Cu www.credite.md ai acces rapid la toate serviciile noastre, oriunde și oricând. Solicita online suma de care ai nevoie, iar consultanții noștri te vor contacta!</p></div>
																				</div>

																			</div>
																		</div>
																	</div>
																	<div class="newsType" style="">
																		<div class="container" style="">
																			<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																				<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																					<a class="imgDiv" ><img src="resources/newsImg/16.png"  class="newsImg"></a>
																				</div>
																				<div class="col s10 m10 l10 left-align" style="  ">
																					<div> 
																						<h4> 
La mulți Ani de 8 martie </h4>
																						<p>08-03-2016</p>
																						<p>"Atât de fragedă, te-asameniCu floarea albă de cireş.." M.EminescuLa multi ani, scumpe femei! Cu drag, ehipa CreditBun!</p></div>
																					</div>

																				</div>
																			</div>
																		</div>
																		<div class="newsType" style="">
																			<div class="container" style="">
																				<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																					<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																						<a class="imgDiv" ><img src="resources/newsImg/3.png"  class="newsImg"></a>
																					</div>
																					<div class="col s10 m10 l10 left-align" style="  ">
																						<div> 
																							<h4> 
Sarbatori Fericite! </h4>
																							<p>28-12-2015</p>
																							<p>Echipa CreditBun Va ureaza Craciun Fericit si La multi ani.  Totodata Va informam ca in zilele 1,2 si 7 ianuarie 2016, avem zile de odihna. Cererile de imprumut le puteti expedia on-line. In urmatoarea zi de lucru toate cererile vor…</p></div>
																						</div>

																					</div>
																				</div>
																			</div>
																			<div class="newsType" style="">
																				<div class="container" style="">
																					<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																						<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																							<a class="imgDiv" ><img src="resources/newsImg/4.png"  class="newsImg"></a>
																						</div>
																						<div class="col s10 m10 l10 left-align" style="  ">
																							<div> 
																								<h4> 
Credite pentru vacanta</h4>
																								<p>17-12-2015</p>
																								<p>Bucura-te de sarbatorile de iarna din plin cu creditele de la CreditBun. Cum primesc banii? 1. Alege destinatia de vacanta si stabileste costurile +10% cheltuieli neprevazute :), 2. Solicita un imprumut la Credit Bun - trimite o cerere online, sau completeaza cererea…</p></div>
																							</div>

																						</div>
																					</div>
																				</div>
																				<div class="newsType" style="">
																					<div class="container" style="">
																						<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																							<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																								<a class="imgDiv" ><img src="resources/newsImg/17.png"  class="newsImg"></a>
																							</div>
																							<div class="col s10 m10 l10 left-align" style="  ">
																								<div> 
																									<h4> 
Credite fara gaj usor </h4>
																									<p>07-12-2015</p>
																									<p>Acum sa iai un credit fara gaj e mai simplu ca oricind.  Atinge-ti visele impreuna cu CreditBun.  Completeaza formularul online pe site-ul nostru, iar noi revenim cit de curind posibil cu un apel. (In orele de lucru revenim pina la…</p></div>
																								</div>

																							</div>
																						</div>
																					</div>
																					<div class="newsType" style="">
																						<div class="container" style="">
																							<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																								<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																									<a class="imgDiv" ><img src="resources/newsImg/14.png"  class="newsImg"></a>
																								</div>
																								<div class="col s10 m10 l10 left-align" style="  ">
																									<div> 
																										<h4> 
Credite auto - cel mai simplu</h4>
																										<p>23-11-2015</p>
																										<p>Va reamintim, ca pina la 01 decembrie, conform legislatiei in vigoare, este necesar de schimbat anvelopele la automobil in cele de iarna. In acest scop, Credit Bun Va propune sa beneficiati de un imprumut pentru a procura 4 anvelope si…</p></div>
																									</div>

																								</div>
																							</div>
																						</div>

																			<div class="newsType" style="">
																						<div class="container" style="">
																							<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																								<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																									<a class="imgDiv" ><img src="resources/newsImg/13.png"  class="newsImg"></a>
																								</div>
																								<div class="col s10 m10 l10 left-align" style="  ">
																									<div> 
																										<h4> 

Credite pentru anvelope</h4>
																										<p>23-11-2015</p>
																										<p>Va reamintim, ca pina la 01 decembrie, conform legislatiei in vigoare, este necesar de schimbat anvelopele la automobil in cele de iarna. In acest scop, Credit Bun Va propune sa beneficiati de un imprumut pentru a procura 4 anvelope si…</p></div>
																									</div>

																								</div>
																							</div>
																						</div>
																						<div class="newsType" style="">
																						<div class="container" style="">
																							<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																								<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																									<a class="imgDiv" ><img src="resources/newsImg/9.png"  class="newsImg"></a>
																								</div>
																								<div class="col s10 m10 l10 left-align" style="  ">
																									<div> 
																										<h4> 

Creditul e la tine in mina</h4>
																										<p>20-11-2015</p>
																										<p>Banii de care ai nevoie se afla la tine in mina - Trimite cerere de pe orice smartphone. Ai nevoie de bani urgent, dar esti in drum, sau esti prea ocupat sa mergi la o institutie de creditare? Credit Bun Va…</p></div>
																									</div>

																								</div>
																							</div>
																						</div>
																						<div class="newsType" style="">
																						<div class="container" style="">
																							<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																								<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																									<a class="imgDiv" ><img src="resources/newsImg/19.png"  class="newsImg"></a>
																								</div>
																								<div class="col s10 m10 l10 left-align" style="  ">
																									<div> 
																										<h4> 
Credit online mai comod</h4>
																										<p>10-11-2015</p>
																										<p>Pentru comoditatea clientilor Credit Bun, am simplificat si imbunatatit site-ul nostru www.credite.md. Astfel, am adaugat calculatorul cu cei mai importanti indicatori si am simplificat cererea online. Introducind suma si termenul, puteti vedea care este rata lunara spre achitare. Rata lunara cuprinde…</p></div>
																									</div>

																								</div>
																							</div>
																						</div>
																						<div class="newsType" style="">
																						<div class="container" style="">
																							<div class="row" style="padding: 20px 20px 20px 20px; background-color: white;">
																								<div class="col s6 m6 l2 left-align" style="margin-right: 0px !important;">
																									<a class="imgDiv" ><img src="resources/newsImg/6.jpg"  class="newsImg"></a>
																								</div>
																								<div class="col s10 m10 l10 left-align" style="  ">
																									<div> 
																										<h4> 

Cerere credit la telefon</h4>
																										<p>01-09-2014</p>
																										<p>CreditBun a lansat serviciul "Cerere la Telefon".  Acum clientii nostri pot apela un credit prin telefon.  Procedura este in felul urmator: - Telefonati-ne la unul din numerele companiei afisate pe site, intrebati conditiile, aflati rata lunara, etc. Daca Va convin conditiile,…</p></div>
																									</div>

																								</div>
																							</div>
																						</div>











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




