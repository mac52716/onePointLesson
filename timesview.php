<?php 
include('dbcon.php');
//$conns = new mysqli("localhost", "root", "", "howanalysis");

				if(isset($_POST['submit'])){
					
				$view="1";
				$itemno=$_POST['itemno'];
				
				$result = $conn->query("SELECT times_viewed FROM howhow WHERE item_no=$itemno");
					while ($row = $result->fetch_assoc()) {
					$times_viewed=$row['times_viewed'];
					}
					
				$totalviewed=$times_viewed + $view;

				$sql = "UPDATE howhow SET times_viewed='$totalviewed' WHERE item_no=$itemno";
 
				if ($conn->query($sql) === TRUE) {
					} else {
						echo "Error updating record: " . $conn->error;
						}
				}
$conn->close();
?>