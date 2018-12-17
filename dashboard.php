<?php
	session_start();
	if($_SESSION['state'] != true) {
		header('Location: login.php?err=2');
	}
	
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
								} 
							?>
							
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link"><span class="icon fa-home">Home</span></a></li>
								<li><a href="#list" id="portfolio-link"><span class="icon fa-th">Deine Listen</span></a></li>
								<li><a href="#plans" id="about-link"><span class="icon fa-user">Pakete</span></a></li>
								<li><a href="#payments" id="about-link"><span class="icon fa-chart-bar">Einzahlungen</span></a></li>
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
								<h2>Willkommen zurück!</h2>
								<p id="new_records">Lade neue Mails ...</p>
							</header>

							<footer style="padding-bottom: 15px;">
								<a href="#list" class="button scrolly">Liste beantragen</a>
							</footer>

						</div>
						
					</section>

				
					

			
					
		
					<section id="list" class="two">
						<div class="container">
			<br>
							<header>
								<h2>Deine Listen</h2>
							</header>

							<p>Vitae natoque dictum etiam semper magnis enim feugiat convallis convallis
							egestas rhoncus ridiculus in quis risus amet curabitur tempor orci penatibus.
							Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis
							fusce hendrerit lacus ridiculus.</p>
							
							<a href="requestList.php" class="button scrolly">Liste beantragen</a><hr>

							<table class="table">
								<thead>
								  <tr >
									<th>Status</th>
									<th>Länder</th>
									<th>Datensätze</th>
									<th>Preis</th>
									<th>Datum</th>
									<th></th>
								  </tr>
								</thead>
								<tbody>
								
								  <?php
									  $sql    = "SELECT state, countries, price, amount, record_date, ID FROM user_lists WHERE user_id = " . $_SESSION['state_id'] . ";";
									$result = $conn_user->query($sql);
									if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
													$countries = $row['countries'];
													$amount = $row['amount'];
													$price = $row['price'];
											
													$type = "warning";
													$state = "Requested";
													if($row['state'] == 1) { $state = "Requested"; $type = "warning"; }
													if($row['state'] == 2) { $state = "Download"; $type = "success";}
													if($row['state'] == 3) { $state = "Canceled"; $type = "danger";}
											
													echo " <tr class='" . $type . "'>
															<td>" . $state . "</td>
															<td>" . $countries . "</td>
															<td>" . $amount . "</td>
															<td>" . $price . " BTC</td>
															<td>" . $row['record_date'] . "</td>
															<td><a href='#' class='button scrolly'>" . $state . "</a></td>
														  </tr>";
											}
									} else {
											echo " <tr class='danger'>
															<td>Keine Liste beantragt</td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														  </tr>";
									}
								
								?>
   
								  
								</tbody>
							  </table>

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
					
					<section id="payments" class="two">
						<div class="container">
		<br>
							<header>
								<h2>Einzahlungen</h2>
							</header>

	
							  <table class="table">
								<thead>
								  <tr >
									<th>Status</th>
									<th>BTC Wert</th>
									<th>Paket</th>
									<th>BTC Wallet</th>
									<th>Tx ID</th>
									<th>Datum</th>
								  </tr>
								</thead>
								<tbody>
								
								  <?php
									  $sql    = "
SELECT u.btc_wallet, u.btc_amount, u.transaction_id, u.pay_state, u.createdAt, d.plan_name FROM user_payments u JOIN plan_data d on u.plan = d.ID WHERE user_id = " . $_SESSION['state_id'] . ";";
									$result = $conn_user->query($sql);
									if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()) {
													$cnt_mail = $row['CNT_Mail'];
													$cnt_country = $row['CNT_Country'];
													$cnt_city = $row['CNT_City'];
											
													$type = "warning";
													$state = "Waiting";
													if($row['pay_state'] == 1) { $state = "Waiting"; $type = "warning"; }
													if($row['pay_state'] == 2) { $state = "Confirmed"; $type = "success";}
													if($row['pay_state'] == 3) { $state = "Expired"; $type = "danger";}
											
													echo " <tr class='" . $type . "'>
															<td>" . $state . "</td>
															<td>" . $row['btc_amount'] . "</td>
															<td>" . $row['plan_name'] . "</td>
															<td>" . $row['btc_wallet'] . "</td>
															<td>" . $row['transaction_id'] . "</td>
															<td>" . $row['createdAt'] . "</td>
														  </tr>";
											}
									}
								
								?>
   
								  
								</tbody>
							  </table>
							

						</div>
					</section>

				<!-- Contact -->
					

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
			
			  $(document).ready(init());
         
         
			 function init() {
				 loadNew();

			 }
				
			
				particlesJS.load('particles-js', 'assets/js/particlesjs-config.json', function() {
				  console.log('callback - particles.js config loaded');
				});
				
				 function loadNew() {
         	$.ajax({url: "scripts/new_records.php"}).done(function( html ) {
         		$("#new_records").empty();
         	    $("#new_records").append(html);
         	});
         	
         						
         }
				
			</script>

	</body>
</html>