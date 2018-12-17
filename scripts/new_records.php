<?php
	include_once("db.php");
	$cnt_mail = 0;

	$sql = "SELECT COUNT(ID) as 'CNT_Mail' FROM account_data WHERE date(CHECKED_DATE)=date(date_sub(now(),interval 1 day));";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
					$cnt_mail = $row['CNT_Mail'];
				break;
			}
			echo "<p>" . number_format($cnt_mail, 0, '.', ' ') . " neue Mails wurden seit gestern geprüft!";
	}
?>