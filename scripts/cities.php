<?php
	include_once("db.php");
	
	$sql = "SELECT DISTINCT CITY FROM account_data WHERE NOT (CITY <=> NULL) AND MAIL_STATUS = 1 ORDER BY CITY ASC;";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			if($row['CITY'] != "") {
				echo "<option value='" . $row["CITY"] . "'> " . $row["CITY"] . "</option>";
			}
		}
	}
												

	$conn->close();
?>