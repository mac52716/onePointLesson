<?php
include('dbcon.php');

    	$result = $conn->query("SELECT DISTINCT TesterPF FROM testers ORDER by TesterPF ASC");
		if ($result->num_rows > 0) {
			echo '<option value="" disabled selected>Select Platform</option>';
    	while ($row = $result->fetch_assoc()) {
			$TesterPF = $row['TesterPF']; 
			echo '<option value="'.$TesterPF.'">'.$TesterPF.'</option>';
		}
	}else {
		echo '<option style="color: red;" value="Check Connection">*--Check Connection--*</option>';;
}
mysqli_close($conn);
?>