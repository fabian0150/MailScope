<?php
	session_start();
	include_once("db_user.php");
	
	$user_id = $_SESSION['state_id'];

	$countries = $_POST['countries'];
	$countries = $conn_user->real_escape_string($countries);
	$countries = rtrim($countries,", ");
	
	$cities = $_POST['cities'];
	$cities = $conn_user->real_escape_string($cities);
	$cities = rtrim($cities,", ");
	
	$regions = $_POST['regions'];
	$regions = $conn_user->real_escape_string($regions);
	$regions = rtrim($regions,", ");
	
	$message = $_POST['message'];
	$message = $conn_user->real_escape_string($message);
	
	$amount = $_POST['amount'];
	$amount = $conn_user->real_escape_string($amount);
	
	
	$additional_data = $_POST['additional_data'];
	$additional_data = $conn_user->real_escape_string($additional_data);
	

	$sql    = "INSERT INTO user_lists SET 
				user_id = " . $user_id . ", 
				countries = '" . $countries . "', 
				regions = '" . $regions . "', 
				cities = '" . $cities . "',
				amount = " . $amount . ",
				message = '" . $message . "',
				additional_data = '" . $additional_data . "';";
	
	
	if ($conn_user->query($sql) === TRUE) {
		echo "success";
		
		
	} else {
		echo "error";
		
	}

$conn_user->close();						

	
?>