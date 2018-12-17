<?php
	include_once("db_user.php");

	$mail = $_POST['mail'];
	$mail = $conn_user->real_escape_string($mail);
	$password = $_POST['password'];
	$password = $conn_user->real_escape_string($password);
	
	$password_repeat = $_POST['password_repeat'];
	$password_repeat = $conn_user->real_escape_string($password_repeat);
	
	if($password != $password_repeat) {
		echo "<h2 style='color:red;'>Passwörter stimmen nicht überein!</h2>";

		exit();
	}

	$sql    = "INSERT INTO user_data SET user_mail = '" . $mail . "', user_pass = '" . md5($password) . "';";
	

	if ($conn_user->query($sql) === TRUE) {
		echo "<h2>Erfolgreich registriert!</h2>";
		echo "<a href='login.php'>Login</a>";
	} else {
		echo "<h2 style='color:red;'>Bist du bereits registriert?</h2>";
	}

$conn_user->close();						

	
?>