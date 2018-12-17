<?php
    $servername_user = "localhost";
	$username_user = "ms";
	$password_user = "xA37b3!o";
	$dbname_user = "mailscope";

	$conn_user = new mysqli($servername_user, $username_user, $password_user, $dbname_user);
	// Check connection
	if ($conn_user->connect_error) {
		die("Connection failed: " . $conn_user->connect_error);
		exit();
	}
	if (!$conn_user->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $conn_user->error);
		exit();
	} 
?>