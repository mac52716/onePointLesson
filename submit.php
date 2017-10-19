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
			
			//$query="SELECT * FROM tprs";
			date_default_timezone_set("Asia/Manila");
			$dates=(date("M.d.y H:i"));
				
				if(isset($_POST['submit'])){
					
				$testerId=$_POST['testerId'];
				$testerPf=$_POST['testerPf'];
				$handlerId=$_POST['handlerId'];
				$handlerPf=$_POST['handlerPf'];
				$problem=$_POST['problem'];
				$owners=$_POST['owners'];
				$hardware=$_POST['hardware'];
				$others=$_POST['others'];
				$why1=$_POST['why1'];
				$why2=$_POST['why2'];
				$why3=$_POST['why3'];
				$why4=$_POST['why4'];
				$why5=$_POST['why5'];
				$status=$_POST['status'];
				$corrective=$_POST['corrective'];
				$when=$_POST['when'];
				$verifier=$_POST['verifier'];
				$username=$_POST['myusername'];
				$timesviewed=isset($_POST['timesviewed']) ? (int)$_POST['timesviewed'] : 0;
				$rate=isset($_POST['rate']) ? (int)$_POST['rate'] : 0;
				
				$folder="files/";
				$imagename=$_FILES['myimage']['name']; 
				$file_name = preg_replace("/[^a-zA-Z0-9.]/", "", $imagename);
				move_uploaded_file($_FILES['myimage']['tmp_name'], "$folder".$file_name);
				
				$sql = "INSERT INTO howhow (testerId,testerPf,handlerId,handlerPf,problems,owners,hardware,others,why_1,why_2,why_3,why_4,why_5,
				imagename,imagepath,status,corrective_actions,whens,entered_by,verified_by,ratings,times_viewed,
				datetime_entry,approved)
				VALUES ('".$testerId."','".$testerPf."','".$handlerId."','".$handlerPf."','".$problem."','".$owners."','".$hardware."','".$others."','".$why1."',
				'".$why2."','".$why3."','".$why4."','".$why5."','".$file_name."','".$folder."','".$status."',
				'".$corrective."','".$when."','".$username."','".$verifier."','".$timesviewed."','".$rate."','".$dates."','0')";
				
				if ($conn->query($sql)=== TRUE){
					$_SESSION['Msg'] = "A new record have been saved.";
					header("location: newentry.php");
					exit;
					}else{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}

					$conn->close();
				}
				
			}else{
							$_SESSION['Msg'] = "*Invalid password! Please try again.*";
					header("Location: newentry.php"); //Redirect user back to your login form
					exit;
				}
		}

?>