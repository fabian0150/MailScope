<?php
	session_start();
	
	$user_mail = "";
	$user_registered = "";
	$user_credit = 0.0;

	
	include_once("scripts/db.php");
	include_once("scripts/db_user.php");

	
?>

<!DOCTYPE HTML>
<!--
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>MailScope</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

	
	</head>
	<body class="is-preload">

		<!-- Header -->
			<div id="header">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<?php
								
								if(isset($_SESSION['state_id'])) {
									include("nav_user.html");
								} else {
									include("nav.html");
								}
														
							?>
						
							
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="index.php#top" id="top-link"><span class="icon fa-home">Home</span></a></li>
							</ul>
						</nav>

				</div>

				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="soon.php" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="soon.php" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="soon.php" class="icon fa-github"><span class="label">Github</span></a></li>
							<li><a href="soon.php" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
						</ul>

				</div>

			</div>

		<!-- Main -->
			<div id="main">
				
				<!-- Intro -->	
					<section id="top" class="two" >
						
						<div class="container">
							
							<header>
							
								<h2 class="alt"><strong>Listenpreis Rechner</strong></h2>
								<hr>
								
								<form method="post" action="payment_id.php" id="calcForm">
									<div class="row">
										<div class="col-12"><h2>Anzahl Datensätze</h2></div>

										<div class="col-4"><button onclick="cntChange(0, 'm');">-</button></div>
										<div class="col-4"><input type="text" name="amount" id="amount" value="1000" onkeypress="change();" /></div>
										<div class="col-4"><button onclick="cntChange(0, 'p');">+</button></div>
										
										<div class="col-12"><h2>Länder</h2></div>

										<div class="col-4"><button onclick="cntChange(1, 'm');">-</button></div>
										<div class="col-4"><input type="text" name="countries" id="countries" value="10" onkeypress="change();" /></div>
										<div class="col-4"><button onclick="cntChange(1, 'p');">+</button></div>
										
										<div class="col-12"><h2>Regionen</h2></div>

										<div class="col-4"><button onclick="cntChange(2, 'm');">-</button></div>
										<div class="col-4"><input type="text" name="regions" id="regions" value="10" onkeypress="change();" /></div>
										<div class="col-4"><button onclick="cntChange(2, 'p');">+</button></div>
										
										<div class="col-12"><h2>Städte</h2></div>

										<div class="col-4"><button onclick="cntChange(3, 'm');">-</button></div>
										<div class="col-4"><input type="text" name="cities" id="cities" value="15" onkeypress="change();" /></div>
										<div class="col-4"><button onclick="cntChange(3, 'p');">+</button></div>
										<div class="col-12">
										<h2>Zusätzliche Daten (Kosten pro Datensatz)</h2>
											 <fieldset>      
												   
													<input type="checkbox" name="fn" id="fn" value="1" onclick="change();">Vollständiger Name<br>      
													<input type="checkbox" name="prof" id="prof" value="2" onclick="change();">Job<br>      
													<input type="checkbox" name="add" id="add" value="3" onclick="change();">Adresse<br>
													<input type="checkbox" name="smp" id="smp" value="4" onclick="change();">Social Media Profil<br>  
													
											</fieldset>      
										</div>
									
										<div class="col-12">
											

											<br>
											<h2 id="price">0.00 BTC</h2>
											<button onclick="change();">Berechnen</button>
											<hr>
											<a href="requestList.php" class="button scrolly">Liste beantragen</a>
											<hr>
											<a href="payment.php?plan=4" class="button scrolly">Einzahlen</a>
											<p>Betrag bitte genau einzahlen!</p>
											<hr>
										</div>
										<div class="col-12">
											<div id="result">
											<?php 
												if(isset($_GET['err'])) {
													$code = $_GET['err'];
													if($code == 1) {
														echo "<h2 style='color:red;'>Ein Fehler ist aufgetreten! Bitte erneut versuchen</h2>";
													}
													if($code == 2) {
														echo "<h2 style='color:red;'></h2>";
													}
												}
											?>
												
											</div>
										</div>
									</div>
								</form>
							</header>

							<footer style="padding-bottom: 15px;">
								<!--<a href="#plans" class="button scrolly">Take a look</a>-->
							</footer>

						</div>
						
					</section>
			</div>

		<!-- Footer -->
			<div id="footer">

				<!-- Copyright -->
					<ul class="copyright">
						<li>2018 &copy; MailScope. All rights reserved.</li>
					</ul>

			</div>

		<!-- Scripts -->
		
			
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/particles.js"></script>
			
			<script>
			
			
				
				$("#calcForm").submit(function() {
				
					return false;
				});
				
				
				function calcPrice() {
					
					var price_mail 			= 0.00000385;
					var price_country 		= 0.00000950; //0.0000087;
					var price_region 		= 0.00000960; //0.0000087;
					var price_city 			= 0.00001000; //0.0000087;
					var price_fullname 		= 0.0000260;
					var price_profession 	= 0.0000780;
					var price_address 		= 0.0000260;
					var price_socialmedia 	= 0.0000430;
					
					var price_sum = 0.0;
					var price_txt = document.getElementById("price");
					
					
					var cnt_countries = document.getElementById("countries").value;
					var cnt_regions = document.getElementById("regions").value;
					var cnt_cities = document.getElementById("cities").value;
					var cnt = document.getElementById("amount").value;
					
					var field_fullname =  document.getElementById("fn").checked;
					var field_profession =  document.getElementById("prof").checked;
					var field_address =  document.getElementById("add").checked;
					var field_socialmedia =  document.getElementById("smp").checked;
					
					
					if(cnt_countries == 0) { cnt_countries = 1;}
					if(cnt_regions == 0) { cnt_regions = 1;}
					if(cnt_cities == 0) { cnt_cities = 1;}
					if(cnt == 0) { cnt = 1;}
					
					var price_countries = (cnt * (price_country * cnt_countries));
					var price_regions = (cnt * (price_region * cnt_regions));
					var price_cities = (cnt * (price_city * cnt_cities));
					var price_mails = (cnt * price_mail);
				
					price_sum = (price_countries + price_regions + price_cities + price_mails); 
					
					
					if(field_fullname) {
						price_sum += cnt * price_fullname;
					}
					if(field_profession) {
						price_sum += cnt * price_profession;
					}
					if(field_address) {
						price_sum += cnt * price_address;
					}
					if(field_socialmedia) {
						price_sum += cnt * price_socialmedia;
					}
					
					price_txt.innerHTML = price_sum.toFixed(8) + " BTC";
				}
				
				function cntChange(field, type) {
					
					var id = "none";
					var val = 1;
					
					switch(field) {
						case 0: id = "amount"; val = 100; break;
						case 1: id = "countries"; val = 10; break;
						case 2: id = "regions"; val = 5; break;
						case 3: id = "cities"; val = 1; break;
						
					}
					
					var cnt_value = parseInt(document.getElementById(id).value);
					
					
				
					
					if(type == "m") {
						if(cnt_value - val < 0) {
						
						if(cnt_value - 1 < 0) {
							return;
						} else {
							val = 1;
						}
					}
						cnt_value -= val;
					} else {
						cnt_value += val;
					}
				
				
					if(cnt_value == 0) {
						document.getElementById(id).value = 1;
					} else {
						document.getElementById(id).value = cnt_value;
					}
					
					
						calcPrice();
				}
				
				function change() {
					
					
					calcPrice();
				}
				
				
			
			</script>

	</body>
</html>