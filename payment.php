<?php
	session_start();
	if($_SESSION['state'] != true) {
		header('Location: ../login.php?err=2');
	}
	
	
	$plan = 0;

	if(isset($_GET['plan'])) {
		$plan = $_GET['plan'];
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
							
								<h2 class="alt"><strong>Einzahlung</strong></h2>
								<hr>
								
								<form method="post" action="payment_id.php" id="payForm">
									<div class="row">
										
										<div class="col-6 col-12-mobile"><h2>Betrag</h2></div>
										<div class="col-6 col-12-mobile">
											
											
											<select name="plan" id="plan" required>
												
												<?php
														$sql    = "SELECT ID, plan_name, cost, cost_eur FROM plan_data;";
														$result = $conn_user->query($sql);
														if ($result->num_rows > 0) {
																while ($row = $result->fetch_assoc()) {
																	if($plan == $row['ID']) {
																		echo "<option selected value='" . $row['ID'] . "'>" . $row['plan_name'] . " - " . $row['cost'] . " BTC - " . $row['cost_eur'] . " €</option>";

																	} else {
																		echo "<option value='" . $row['ID'] . "'>" . $row['plan_name'] . " - " . $row['cost'] . " BTC - " . $row['cost_eur'] . " €</option>";

																	}
																																			
																}
														}	
													
												?>
											</select>
										</div>
										<div class="col-6 col-12-mobile"><h2>BTC Wallet</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="text" name="btcwallet" id="btcwallet" placeholder="Enter your wallet" value="<?php echo $_GET['btcwallet']; ?>" required /> 
										</div>
										<div class="col-12">
											<a href="dashboard.php">Abbrechen</a>

											<input type="submit" value="Weiter" />
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
														echo "<h2 style='color:red;'>Betrag oder Wallet nicht eingegeben</h2>";
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
	
				particlesJS.load('particles-js', 'assets/js/particlesjs-config.json', function() {
				  console.log('callback - particles.js config loaded');
				});
				
				
			
			</script>

	</body>
</html>