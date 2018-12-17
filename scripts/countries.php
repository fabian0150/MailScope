<?php
	include_once("db.php");
	
	$sql = "SELECT DISTINCT COUNTRY, COUNTRY_SHORT FROM account_data WHERE NOT (COUNTRY <=> NULL) AND MAIL_STATUS = 1 ORDER BY COUNTRY ASC;";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			if($row['COUNTRY_SHORT'] != "") {
				echo "<option value='" . $row["COUNTRY_SHORT"] . "'> " . $row["COUNTRY"] . "</option>";
			}
		}
	}
												

	$conn->close();
?>