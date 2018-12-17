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
		<style>

			

			
		</style>
	
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
								<li><a href="#top" id="top-link"><span class="icon fa-home">Home</span></a></li>
								<li><a href="#plans" id="portfolio-link"><span class="icon fa-th">Pakete</span></a></li>
								<li><a href="#about" id="about-link"><span class="icon fa-user">Was ist MailScope</span></a></li>
								<li><a href="#stats" id="about-link"><span class="icon fa-chart-bar">Statistik</span></a></li>
								<li><a href="#tryout" id="contact-link"><span class="icon fa-envelope">Probier es aus</span></a></li>
								<li><a href="check.php" id="check-link"><span class="icon fa-search">Meine Mail checken</span></a></li>
								<li><a href="calculator.php" id="calc-link"><span class="icon fa-calculator">Listenpreis Rechner</span></a></li>
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
				<div id="particles-js" class="background-netting"></div>
				<!-- Intro -->	
					<section id="top" class="one dark cover" >
						
						<div class="container" style="background-color: #0000008c;">
							
							<header>
							
								<h2 class="alt"><strong>MailScope</strong></h2>
								<hr>
								<h2>Targeting. Ohne Umwege.</h2>
								<p>Wir stellen Ihnen essenzielle Elemente zur Verfügung um Ihr Business auf das nächste Level zu heben.</p>
							</header>

							<footer style="padding-bottom: 15px;">
								<a href="#plans" class="button scrolly">Was kann MailScope?</a>
							</footer>

						</div>
						
					</section>

				
					

			
					
		
					<section id="plans" class="two">
											
						
						<div class="container">
			<br>
							<header>
								<h2>Pakete</h2>
							</header>

							<p>Bereits in der Informations- und Gründungsphase des Unternehmens ist es
								notwendig neue Kunden, Lieferanten, Händler anzuschreiben, anzurufen und
								letztlich zu akquirieren. Um das zu tun gibt es unterschiedliche
								Möglichkeiten, eine davon ist, die entsprechenden Adressen zu kaufen und
								via Kaltakquiese zu kontaktieren. Wir haben Ihnen deshalb eine Auswahl an
								verschiedenen Paketen für Ihr Business zusammengestellt, aus welchen Sie
								wählen können.</p>

							<div class="row">
							<div class="col-12">
									<article class="item">
										
										<header>
											<h2>Personalisiertes Paket</h2>
											<ul class="no-dots">
												<li>Wähle aus was du brauchst!</li>
											</ul>
											
											<?php
							
													$price_btc = 0;
													$price_eur = 0;
													$record_cnt = 0;
													
													$sql    = "SELECT cost, cost_eur, record_cnt FROM plan_data WHERE ID = 1;";
													$result = $conn_user->query($sql);
													if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																	$price_btc = $row['cost'];
																	$price_eur = $row['cost_eur'];
																	$record_cnt = $row['record_cnt'];
																break;
															}
													}
													
												?>
											<a href='calculator.php' class='button scrolly'>Jetzt berechnen!</a>
											<p>ab <?php echo number_format($price_eur / $record_cnt, 2, '.', ' ') . "€ pro Datensatz" ?></p>
										</header>
									</article>
									
								</div>
								<div class="col-4 col-12-mobile">
									<article class="item">
										
										<header>
											<h2>Starter</h2>
											<ul class="no-dots">
												<li>✔ 2 Länder</li>
												<li>✔ 100 Mails</li>
												<li class="not-included">✖ Regionen</li>
												<li class="not-included">✖ Städte</li>
												<li class="not-included">✖ Vollständiger Name</li>
												<li class="not-included">✖ Job</li>
												<li class="not-included">✖ Adresse</li>
												<li class="not-included">✖ Social Media Profil</li>
											</ul>
											
												<?php
							
													$price_btc = 0;
													$price_eur = 0;
													$record_cnt = 0;
													
													$sql    = "SELECT cost, cost_eur, record_cnt FROM plan_data WHERE ID = 1;";
													$result = $conn_user->query($sql);
													if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																	$price_btc = $row['cost'];
																	$price_eur = $row['cost_eur'];
																	$record_cnt = $row['record_cnt'];
																break;
															}
													}
													
												?>


											
											
											<a href='payment.php?plan=1' class='button scrolly'><?php echo $price_eur . "€ (" . $price_btc . " BTC)"; ?></a>
											<p><?php echo number_format($price_eur / $record_cnt, 2, '.', ' ') . "€ pro Datensatz" ?></p>
										</header>
									</article>
									
								</div>
								<div class="col-4 col-12-mobile">
									<article class="item">
									<header>
											<h2>Allrounder</h2>
											<ul class="no-dots">
												<li>✔ 30 Länder</li>
												<li>✔ 1.000 Mails</li>
												<li>✔ Regionen</li>
												<li class="not-included">✖ Städte</li>
												<li class="not-included">✖ Vollständiger Name</li>
												<li class="not-included">✖ Job</li>
												<li class="not-included">✖ Adresse</li>
												<li class="not-included">✖ Social Media Profil</li>
											</ul>
											
										<?php
							
													$price_btc = 0;
													$price_eur = 0;
													$record_cnt = 0;
													
													$sql    = "SELECT cost, cost_eur, record_cnt FROM plan_data WHERE ID = 2;";
													$result = $conn_user->query($sql);
													if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																	$price_btc = $row['cost'];
																	$price_eur = $row['cost_eur'];
																	$record_cnt = $row['record_cnt'];
																break;
															}
													}
													
												?>


											
											
											<a href='payment.php?plan=1' class='button scrolly'><?php echo $price_eur . "€ (" . $price_btc . " BTC)"; ?></a>
											<p><?php echo number_format($price_eur / $record_cnt, 2, '.', ' ') . "€ pro Datensatz" ?></p>										</header>
									</article>
								
								</div>
								<div class="col-4 col-12-mobile">
									<article class="item">
										<header>
											<h2>Pro</h2>
											<ul class="no-dots">
												<li>✔ 100+ Länder</li>
												<li>✔ 5.000 Mails</li>
												<li>✔ Regionen</li>
												<li>✔ Städte</li>
												<li>✔ Vollständiger Name</li>
												<li>✔ Job</li>
												<li>✔ Adresse</li>
												<li>✔ Social Media Profil</li>
											</ul>
											
											<?php
							
													$price_btc = 0;
													$price_eur = 0;
													$record_cnt = 0;
													
													$sql    = "SELECT cost, cost_eur, record_cnt FROM plan_data WHERE ID = 3;";
													$result = $conn_user->query($sql);
													if ($result->num_rows > 0) {
															while ($row = $result->fetch_assoc()) {
																	$price_btc = $row['cost'];
																	$price_eur = $row['cost_eur'];
																	$record_cnt = $row['record_cnt'];
																break;
															}
													}
													
												?>


											
											
											<a href='payment.php?plan=1' class='button scrolly'><?php echo $price_eur . "€ (" . $price_btc . " BTC)"; ?></a>
											<p><?php echo number_format($price_eur / $record_cnt, 2, '.', ' ') . "€ pro Datensatz" ?></p>
										</header>
									</article>
									
								</div>
							</div>

						</div>
					</section>
					
						
					<section id="about" class="three">
						<div class="container">
			<br>
							<header>
								<h2>Was ist MailScope?</h2>
							</header>

						
							<p>„Get the basics right.“<br>
							Die Basis für alle Aktivitäten sind gute Stammdaten. Unvollständige oder falsche
							Adressen, längst umgezogene Kunden oder gar nicht mehr existente Ansprechpartner
							stressen nicht nur das Budget.<br>
							Genau darin liegt die Stärke von MailScope. </p>
							<p>Nutzen Sie unsere Erfahrung für einen ganzheitlichen Blick auf Ihre Kunden und
								Wertschöpfungspotentiale. Somit werden Zielgruppen greifbar und lassen sich
								differenziert steuern.</p>
							
							
							<a href="#tryout" class="image featured"><img src="images/world.png" alt="" /></a>

						</div>
					</section>
					
					<section id="stats" class="two">
						<div class="container">
		<br>
							<header>
								<h2>Statistik</h2>
							</header>

							<p>Hier ein kleiner Auszug aus unserer Datenbank.
								Wir nehmen stündlich bis zu <strong>1200</strong> neue Mails und Adressen auf.
								Schaue später noch einmal vorbei um zu sehen wie schnell MailScope wächst.</p>

							<?php
							
								$cnt_mail = 0;
								$cnt_country = 0;
								$cnt_city = 0;
								$sql    = "SELECT COUNT(ID) as 'CNT_Mail',  COUNT(DISTINCT COUNTRY) as 'CNT_Country', COUNT(DISTINCT CITY) as 'CNT_City' FROM account_data WHERE MAIL_STATUS = 1;";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
										while ($row = $result->fetch_assoc()) {
												$cnt_mail = $row['CNT_Mail'];
												$cnt_country = $row['CNT_Country'];
												$cnt_city = $row['CNT_City'];
											break;
										}
								}
								
							?>
							<div class="row">
								<div class="col-4 col-12-mobile">
								<img src="images/mail.png" height="100px" width="100px" style="margin-top: 30px;"/>
									<h2>E-Mails</h2>
									<hr>
									<?php
										
										echo "<span style='font-size: 50px; font-weight: 900;'>" . number_format($cnt_mail / 1000, 0, '.', ' ')  . "k</span>";
									?>
									<br>
									
								</div>
								<div class="col-4 col-12-mobile">
								<img src="images/country.png" height="100px" width="100px" style="margin-top: 30px;"/>
									<h2>Länder</h2>
									<hr>
									<?php
										
										echo "<span style='font-size: 50px; font-weight: 900;'>" . number_format($cnt_country, 0, '.', ' ') . " von 195</span>";
									?>
									<br>
								
								</div>
								<div class="col-4 col-12-mobile">
								<img src="images/region.png" height="100px" width="100px" style="margin-top: 30px;"/>
									<h2>Städte</h2>
									<hr>
									<?php
										
										echo "<span style='font-size: 50px; font-weight: 900;'>" . number_format($cnt_city, 0, '.', ' ') . "</span>";
									?>
									<br>
									
								</div>
							</div>

						</div>
					</section>

				<!-- Contact -->
					<section id="tryout" class="four">
						<div class="container">
							<br>
							<header>
								<h2>Probiere MailScope</h2>
							</header>

							<p>Teste es selbst anhand eines Beispieles</p>

							<form method="post" action="#">
								<div class="row">
									
									<div class="col-6 col-12-mobile"><h2>Wähle ein Land</h2><img src="https://www.countryflags.io/DZ/flat/64.png" id="country_flag" /></div>
									<div class="col-6 col-12-mobile">
									<select name="country" onChange="changeFlag(this.value);" id="country">
										<option value="loading">Loading...</option>
									 </select>
									</div>
									<div class="col-12" id="mail_results" name="mail_results">
									
									</div>
									<!--<div class="col-12">
										<input type="submit" value="Send Message" />
									</div>-->
								</div>
							</form>

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
				var country = "";
				var cnt = 0;
				var reloader;
				particlesJS.load('particles-js', 'assets/js/particlesjs-config.json', function() {
				  console.log('callback - particles.js config loaded');
				});
				
				$(document).ready(loadCountries());
				
				function loadCountries() {
					$.ajax({url: "scripts/countries.php"}).done(function( html ) {
						$("#country").empty();
					    $("#country").append(html);
					});
					
										
				}
				
				
				function changeFlag(flag) {
					clearTimeout(reloader);
					flag_url = flag;
					
					if(flag == "UK") {
						flag_url = "GB";
					} 
					if(flag == "YU") {
						flag_url = "MK";
					} 
					document.getElementById('country_flag').setAttribute("src", "https://www.countryflags.io/" + flag_url + "/flat/64.png");
					country = flag;

					cnt++;
					if ( cnt <= 3) {
						loadTryOut();
						
					} else {
						console.log("Too many tries!");
						$('#mail_results').html("<h2 style='color:red;'>Too many tries! Try again later.</h2>");
						$('#mail_results').hide().fadeIn('slow');
						$('#mail_results').fadeOut(1500);
					}
					

					
				}
				
				function sleep(ms) {
				  return new Promise(resolve => setTimeout(resolve, ms));
				}
				
				async function loadTryOut() {
						$('#mail_results').html('');
						ShowActive(country);
						
					
						await sleep(10000);

						$('#mail_results').fadeOut(1500);
						
					
					 
				}
			  function ShowActive(inputString){
				
				 //gives visual that something is happening
				 $('#mail_results').addClass('loading');
				 //send your data to a php script here i am only sending one variable
				 //if using more than one then use json format
				 $.post("scripts/tryout.php", {country: ""+inputString+""}, function(data){
				   if(data.length >0) {
					 //populate div with results
					 $('#mail_results').html(data);
					 $('#mail_results').removeClass('loading');
					 $('#mail_results').hide().fadeIn('slow');
				   }
				 });
				
			   }
			</script>

	</body>
</html>