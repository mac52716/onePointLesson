<?php
include('dbcon.php');
//$conns = new mysqli("localhost", "root", "", "howanalysis");

if(isset($_POST['submit'])){
$approval=$_POST['approval'];
$itemno=$_POST['itemno'];

$sql = "UPDATE howhow SET approved='$approval' WHERE item_no=$itemno";
 
if ($conn->query($sql) === TRUE) {
    echo "<!DOCTYPE html>",
	"<html>",
	"<body onload='myFunction();'>",
	"<script>",
		"function myFunction(){alert('Record has been updated!');(location.href='verifierpage.php')}",
		"</script>",
		"</body>",
		"</html>";
} else {
    echo "Error updating record: " . $conn->error;
}
}
$conn->close();

?>