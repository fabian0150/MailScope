<?php
	session_start();
	include_once("scripts/db.php");
	if(isset($_SESSION['state_id'])) {
		
		include_once("scripts/db_user.php");
		$sql    = "SELECT user_mail, createdAt FROM user_data WHERE ID = " . $_SESSION['state_id'] . ";";
		$result = $conn_user->query($sql);
		
		if ($result->num_rows > 0) {
			
			while ($row = $result->fetch_assoc()) {
				$user_mail = $row["user_mail"];
				$user_registered = $row["createdAt"];
			}
		
		}
		
	}
	

?>