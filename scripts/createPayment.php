<?php
	include_once("db_user.php");

	$btc_wallet = $_POST['btcwallet'];
	$btc_wallet = $conn_user->real_escape_string($btc_wallet);
	
	$plan = $_POST['plan_id'];
	$plan = $conn_user->real_escape_string($plan);
	
	$transaction_id = $_POST['txID'];
	$transaction_id = $conn_user->real_escape_string($transaction_id);
	
	$user_id = $_POST['user_id'];
	$user_id = $conn_user->real_escape_string($user_id);
	
	$payamount = $_POST['payamount'];
	$payamount = $conn_user->real_escape_string($payamount);
	
	

	$sql    = "INSERT INTO user_payments SET 
				user_id = " . $user_id . ", 
				btc_wallet = '" . $btc_wallet . "', 
				btc_amount = " . $payamount . ", 
				transaction_id = '" . $transaction_id . "', 
				plan = " . $plan . ";";
	
	echo $sql;
	if ($conn_user->query($sql) === TRUE) {
		header('Location: ../payment_done.php');
		exit();
		
	} else {
		header('Location: ../payment.php?err=1');
		exit();
	}

$conn_user->close();						

	
?>