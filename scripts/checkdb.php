<?php
	include_once("db.php");

	$mail = $_POST['mail'];
	$mail = $conn->real_escape_string($mail);

	$sql    = "SELECT ID FROM account_data WHERE EMAIL = '" . $mail . "' LIMIT 1;";
	$result = $conn->query($sql);
    //echo "<img src='images/mail.png' heigth='70px' width='70px'/>";						
	//echo "<h2>E-Mails</h2><hr>";
	
	
	//echo "<div class='no-dots'>";
	if ($result->num_rows > 0) {
		
		echo "<h2>E-Mail wurde gefunden!</h2>";
		echo "<a style='z-index:100;' href='delete.php'>Beantrage eine Löschung</a>";
		
	} else {
		echo "<h2>E-Mail wurde nicht in unserer Datenbank gefunden!</h2>";
	}
	//echo "</div>";						
$conn->close();
	
?>