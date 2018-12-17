<?php
	session_start();
	if($_SESSION['state'] == true) {
		header('Location: ../dashboard.php');
		exit();
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
							<span class="image avatar48"><img src="images/logo.png" alt="" /></span>
							
							<a href="register.php"><p>Registrieren<p></a> 
						
							
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
				<div id="particles-js" class="background-netting"></div>
				<!-- Intro -->	
					<section id="top" class="one dark cover" >
						
						<div class="container" style="background-color: #0000008c;">
							
							<header>
							
								<h2 class="alt"><strong>Login</strong></h2>
								<hr>
								
								<form method="post" action="scripts/loginuser.php" id="loginForm">
									<div class="row">
										
										<div class="col-6 col-12-mobile"><h2>E-Mail</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="text" name="mail" id="mail" placeholder="beispiel@mail.com" /> <!--onChange="changeFlag(this.value);" -->
										</div>
										<div class="col-6 col-12-mobile"><h2>Passwort</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="password" name="password" id="password" placeholder="Passwort" /> <!--onChange="changeFlag(this.value);" -->
										</div>
										<div class="col-12">
											<input type="submit" value="Login" />
										</div>
										<div class="col-12">
											<div id="result">
											<?php 
												if(isset($_GET['err'])) {
													$code = $_GET['err'];
													if($code == 1) {
														echo "<h2 style='color:red;'>Falsche(s) E-Mail/Passwort</h2>";
													}
													if($code == 2) {
														echo "<h2 style='color:red;'>User nicht eingeloogt</h2>";
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