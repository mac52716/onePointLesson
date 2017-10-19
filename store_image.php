<?php
$conns = new mysqli("localhost", "root", "", "demo");

$folder="images/";

$imagename=$_FILES["myimage"]["name"]; 

move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);

$insert_path="INSERT INTO image_table VALUES('','$imagename','$folder')";

if ($conns->query($insert_path)=== TRUE) {
					echo "record saved";
					//header("location: index.php");
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conns);
				}

?>