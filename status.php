<?php
include('dbcon.php');
    	$result = $conn->query("SELECT DISTINCT description FROM promis_code_owner1");
    	while ($row = $result->fetch_assoc()) {
                  $description = $row['description']; 
                  echo '<option value="'.$description.'">'.$description.'</option>';
	}
?>