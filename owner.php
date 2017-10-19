<?php
include('dbcon.php');
    	$result = $conn->query("SELECT DISTINCT owner FROM promis_code_owner1");
    	while ($row = $result->fetch_assoc()) {
                  $owner = $row['owner']; 
                  echo '<option value="'.$owner.'">'.$owner.'</option>';
	}
?>