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
								<li><a href="index.php#plans" id="portfolio-link"><span class="icon fa-th">Pakete</span></a></li>
								<li><a href="index.php#about" id="about-link"><span class="icon fa-user">Was ist MailScope</span></a></li>
								<li><a href="index.php#stats" id="about-link"><span class="icon fa-chart-bar">Statistik</span></a></li>
								<li><a href="index.php#tryout" id="contact-link"><span class="icon fa-envelope">Probier es aus</span></a></li>
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
								<p>Schau nach ob wir deine Mail Adresse in unserer Datenbank haben und beantrage eine Löschung</p>
								<hr>
								
								<form method="post" action="" id="searchForm">
									<div class="row">
										
										<div class="col-6 col-12-mobile"><h2>Deine Mail Adresse</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="text" name="mail" id="mail" placeholder="beispiel@mail.com" /> <!--onChange="changeFlag(this.value);" -->
										</div>
										<div class="col-12">
											<a class="button" onClick="checkMail();">Prüfen</a>
										</div>
										<div class="col-12">
											<div id="result"></div>
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
				
				$("#mail").on('keyup', function (e) {
					if (e.keyCode == 13) {
						checkMail();
					}
				});

				$("#searchForm").submit(function() {
				
				return false;
			});
				
				
				function checkMail() {
					
					var email = document.getElementById('mail').value;
					console.log(email);
					 $('#result').addClass('loading');
				 //send your data to a php script here i am only sending one variable
				 //if using more than one then use json format
				 $.post("scripts/checkdb.php", {mail: ""+email+""}, function(data){
				   if(data.length >0) {
					 //populate div with results
					 $('#result').html(data);
					 $('#result').removeClass('loading');
					
				   }
				 });
					
				}
				
				function sleep(ms) {
				  return new Promise(resolve => setTimeout(resolve, ms));
				}
				
				
			
			</script>

	</body>
</html>