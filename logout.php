<?php
	session_start();
	$_SESSION['state'] = false;
	$_SESSION['state_id'] = 0;
	session_destroy();
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
		<meta http-equiv="refresh" content="3; URL=https://mailscope.shop/">
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
							
							<a href="login.php"><p>Einloggen</p></a> 
						
							<a href="register.php"><p>Registrieren</p></a>
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
							
								<h2 class="alt"><strong>Erfolgreich ausgeloggt!</strong></h2>
								<hr>
								<h2>Stay tuned!</h2>
							</header>

							<footer style="padding-bottom: 15px;">
								<!--<a href="index.php#tryout" class="button scrolly">Try it in the meantime</a>-->
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
				var country = "";
				var reloader;
				particlesJS.load('particles-js', 'assets/js/particlesjs-config.json', function() {
				  console.log('callback - particles.js config loaded');
				});
				
				
				function changeFlag(flag) {
					clearTimeout(reloader);
					document.getElementById('country_flag').setAttribute("src", "https://www.countryflags.io/" + flag + "/flat/64.png");
					country = flag;

					
					loadTryOut();

					console.log("https://www.countryflags.io/" + flag + "/flat/64.png");
				}
				
				function sleep(ms) {
				  return new Promise(resolve => setTimeout(resolve, ms));
				}
				
				async function loadTryOut() {
						
						ShowActive(country);
						
						$('#mail_results').fadeIn(1500);
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