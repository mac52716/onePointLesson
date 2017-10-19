<?php
include('dbcon.php');
    	$result = $conn->query("SELECT Email_Address FROM users WHERE Approver = 1 ORDER by Email_Address ASC");
    	while ($row = $result->fetch_assoc()) {
                  $Email_Address = $row['Email_Address']; 
                  echo '<option value="'.$Email_Address.'">'.$Email_Address.'</option>';
	}
?>