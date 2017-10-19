<?php
include('dbcon.php');
    	$result = $conn->query("SELECT DISTINCT Equipt_PF FROM equipt_list ORDER by Equipt_PF ASC");
		
		if ($result->num_rows > 0) {
			echo '<option value="" disabled selected>Select Platform</option>';
    	while ($row = $result->fetch_assoc()) {
                  $Equipt_PF = $row['Equipt_PF']; 
                  echo '<option value="'.$Equipt_PF.'">'.$Equipt_PF.'</option>';
		}
	}else {
    echo '<option style="color: red;" value="Check Connection">*--Check Connection--*</option>';;
}
mysqli_close($conn);
?>