<?php
	session_start();
	include_once("db_user.php");

	$mail = $_POST['mail'];
	$mail = $conn_user->real_escape_string($mail);
	$password = $_POST['password'];
	$password = $conn_user->real_escape_string($password);

	$sql    = "SELECT ID FROM user_data WHERE user_mail = '" . $mail . "' AND user_pass = '" . md5($password) . "' LIMIT 1;";
	$result = $conn_user->query($sql);
	if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$_SESSION['state_id'] = $row['ID'];
				break;
			}
		$_SESSION['state'] = true;
		
		header('Location: ../dashboard.php');
	} else {
		
			$_SESSION['state'] = false;
			header('Location: ../login.php?err=1');
	}
	$conn_user->close();
					

	
?>