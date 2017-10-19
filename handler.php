<?php
include('dbcon.php');
if (empty($_GET['q'])){

}else{
	$q = strval($_GET['q']);

//$con = mysqli_connect('localhost','peter','abc123','my_db');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

//mysqli_select_db($con,"ajax_demo");
$sql="SELECT EquiptID FROM equipt_list WHERE Equipt_PF = '".$q."'";
$result = mysqli_query($conn,$sql);

	if ($result->num_rows > 0) {
				echo '<option value="" disabled selected>Select Handler</option>';
		while ($row = $result->fetch_assoc()){
		echo "<option value=".$row['EquiptID'].">" .$row['EquiptID']. "</option>";

		}
	}else {
		echo '<option style="color: red;" value="Check Connection">*--Check Connection--*</option>';;
	}

mysqli_close($conn);
}
?>

