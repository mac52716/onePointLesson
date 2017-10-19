<?php 
session_start();
include('dbcon.php');
//$conns = new mysqli("localhost", "root", "", "howanalysis");



		 if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// username and password sent from form
			$username=mysqli_real_escape_string($conn,$_POST['myusername']);
			$password=mysqli_real_escape_string($conn,MD5($_POST['mypassword']));
			$selectsql="SELECT * FROM users WHERE Email_Address='$username' and Password='$password'";

			$result=mysqli_query($conn,$selectsql);

			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

			//$active=$row['active'];

			$count=mysqli_num_rows($result);

			// If result matched $username and $password, table row must be 1 row

			if($count>0)
			{
				
				if(isset($_POST['submit'])){
					
				$rates=$_POST['rates'];
				$itemno=$_POST['itemno'];
				
				$result = $conn->query("SELECT ratings FROM howhow WHERE item_no=$itemno");
					while ($row = $result->fetch_assoc()) {
					$ratings=$row['ratings'];
					}
					
				$totalrate=$ratings + $rates;

				$sql = "UPDATE howhow SET ratings='$totalrate' WHERE item_no=$itemno";
 
				if ($conn->query($sql) === TRUE) {
						echo "<!DOCTYPE html>",
						"<html>",
						"<body onload='myFunction();'>",
						"<script>",
							"function myFunction(){alert('A record has been rated. Thank you!');(location.href='index.php')}",
							"</script>",
							"</body>",
							"</html>";
					} else {
						echo "Error updating record: " . $conn->error;
						}
				}
			}
		}
$conn->close();
?>