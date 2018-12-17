<?php
	include_once("db.php");

	$country = $_POST['country'];
	$country = $conn->real_escape_string($country);

	$sql    = "SELECT EMAIL, COUNTRY FROM account_data WHERE COUNTRY_SHORT = '" . $country . "' AND MAIL_STATUS = 1 ORDER BY RAND() LIMIT 1;";
	$result = $conn->query($sql);
    //echo "<img src='images/mail.png' heigth='70px' width='70px'/>";						
	//echo "<h2>E-Mails</h2><hr>";
	
	
	//echo "<div class='no-dots'>";
	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
				$mail = $row["EMAIL"];
				$start = 1;
				$end = rand($start + 2, strrpos($mail, "@")-1);
				$cnt = $end-$start;
				$str = "";
				for($i = 0; $i <= $cnt; $i++) {
					$str .= "*";
				}
				$masked_mail = str_replace(substr($mail, $start, $cnt), $str, $mail);
				
				echo "<div class='col-12'>
						<img src='images/mail.png' heigth='70px' width='70px'/><input type='text' class='no-select' name='email' value='" . $masked_mail . "' style='text-align: center;' readonly /><hr>
				</div>";

				//echo "<p style='font-size: 35px; font-weight: 900;'>" . $masked_mail . "</p>";
			
		}
		
	}
	//echo "</div>";						

	echo "<a href='#plans' class='button scrolly'>Bestelle ein Paket</a>";
	$conn->close();
?>