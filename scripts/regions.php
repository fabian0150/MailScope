<?php
	include_once("db.php");
	
	$sql = "SELECT DISTINCT REGION FROM account_data WHERE NOT (REGION <=> NULL) AND MAIL_STATUS = 1 ORDER BY REGION ASC;";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {
			if($row['REGION'] != "") {
				echo "<option value='" . $row["REGION"] . "'> " . $row["REGION"] . "</option>";
			}
		}
	}
												

	$conn->close();
?>