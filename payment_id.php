<?php
	session_start();
	if($_SESSION['state'] != true) {
		header('Location: ../login.php?err=2');
	}
	
	
	$plan = 0;

	if(isset($_POST['plan'])) {
		$plan = $_POST['plan'];
	}

	
	if(!isset($_POST['btcwallet'])) {
		header('Location: payment.php?err=2&plan='. $plan);
		exit();
	}
	
	if($_POST['btcwallet'] == "") {
		header('Location: payment.php?err=2&plan='. $plan);
		exit();
	}
	
	if(!isset($_POST['plan'])) {
		header('Location: payment.php?err=2&plan='. $plan);
		exit();
	}
	
	
	
	
	$user_mail = "";
	$user_registered = "";
	$user_credit = 0.0;

	
	include_once("scripts/db.php");
	include_once("scripts/db_user.php");
	
	
	$plan_cost = "";
	$plan_name = "";
	
	$sql    = "SELECT cost, plan_name FROM plan_data WHERE ID = " . $_POST['plan'] . ";";
	$result = $conn_user->query($sql);
	
	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			$plan_cost = $row["cost"];
			$plan_name = $row["plan_name"];
		}
		
	}

	
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
							
								<h2 class="alt"><strong>Zahlung senden</strong></h2>
								<hr>
								
								<form method="post" action="scripts/createPayment.php" id="payForm">
									<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['state_id']; ?>" />
									<input type="hidden" name="plan_id" id="plan_id" value="<?php echo $plan; ?>" />
									<div class="row">
										<div class="col-12">
												<p>1) Sende den angezeigten Betrag an die unten stehende MailScope BTC Adresse</p>
												<p>2) Sobald du deine Transaktion gesendet hast kannst du für eine schnellere Verarbeitung deinen Link für die Transaktion angeben</p>
												<p>3) Fahre mit klick auf "Zahlung verarbeiten" mit deiner Einzahlung fort</p>
											</div>
										
											<div class="col-12">
												<h2>MailScope BTC Wallet</h2>
											</div>
										<div class="col-12">
											<input type="text" name="walletMS" id="walletMS" value="3KJ3rTgT2iTyqDMeuytuebP6XAbipk8Uzk" readonly style="text-align: center;" />
										</div>
										<div class="col-12">
											<img src="images/wallet_qr.png" height="" width="" /><br>
											
										</div>
										
										<div class="col-12">
											<p>An diese Adresse sollen deine Coins gesendet werden</p>	
										</div>
										
										
										<div class="col-6 col-12-mobile"><h2>Deine Wallet Adresse</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="text" name="btcwallet" id="btcwallet" value="<?php echo $_POST['btcwallet']; ?>" required />
										</div>
										<div class="col-12">
											<p>Deine Bitcoin Adresse um die zu identifizieren</p>	
										</div>
										
										
										
										<div class="col-6 col-12-mobile"><h2>Betrag</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="text" name="payamount" id="payamount" value="<?php echo $plan_cost; ?>" readonly required /></div>
										<div class="col-12">
											<span>Dein ausgewähltes Paket: <strong><?php echo $plan_name; ?></strong></span>
											<a href="payment.php?plan=<?php echo $plan; ?>&btcwallet=<?php echo $_POST['btcwallet']; ?>"> (Change)</a>
											</div>
										
										
										
										<div class="col-6 col-12-mobile"><h2>Transaction ID</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="text" name="txID" id="txID" placeholder="" /> <!--onChange="changeFlag(this.value);" -->
										</div>
										<div class="col-12">
											<p>Deine TxID für eine schnellere Verarbeitung (Nicht benötigt)</p>	
										</div>
										<div class="col-12">
											<a href="payment.php?plan=<?php echo $plan; ?>&btcwallet=<?php echo $_POST['btcwallet']; ?>">Zurück</a>

											<input type="submit" value="Zahlung verarbeiten" />
											
										</div>
										<div class="col-12">
											<div id="result">
											<?php 
												if(isset($_GET['err'])) {
													$code = $_GET['err'];
													if($code == 1) {
														echo "<h2 style='color:red;'>Falschen Betrag eingegeben</h2>";
													}
													if($code == 2) {
														echo "<h2 style='color:red;'>Betrag oder Wallet nicht angegeben</h2>";
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