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
							
							<a href="login.php"><p>Login</p></a> 
						
							
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
							
								<h2 class="alt"><strong>Registrieren</strong></h2>
								<p>Registriere dich gratis!</p>
								<hr>
								
								<form method="post" action="" id="registerForm">
									<div class="row">
										
										<div class="col-6 col-12-mobile"><h2>E-Mail</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="text" name="mail" id="mail" placeholder="your@mail.com" /> <!--onChange="changeFlag(this.value);" -->
										</div>
										<div class="col-6 col-12-mobile"><h2>Passwort</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="password" name="password" id="password" placeholder="Password" /> <!--onChange="changeFlag(this.value);" -->
										</div>
										<div class="col-6 col-12-mobile"><h2>Passwort (wiederholen)</h2></div>
										<div class="col-6 col-12-mobile">
											<input type="password" name="password_repeat" id="password_repeat" placeholder="Password" /> <!--onChange="changeFlag(this.value);" -->
										</div>
										<div class="col-12">
											<a class="button" onClick="registerUser();">Registrieren</a>
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
				
				$("#password").on('keyup', function (e) {
					if (e.keyCode == 13) {
						registerUser();
					}
				});

				$("#registerForm").submit(function() {
				
				return false;
			});
				
				
				function registerUser() {
					
					var email = document.getElementById('mail').value;
					var password = document.getElementById('password').value;
					var password_repeat = document.getElementById('password_repeat').value;
					
					 $('#result').addClass('loading');
				 //send your data to a php script here i am only sending one variable
				 //if using more than one then use json format
				 $.post("scripts/registeruser.php", {mail: ""+email+"", password: ""+password+"", password_repeat: ""+password_repeat+""}, function(data){
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