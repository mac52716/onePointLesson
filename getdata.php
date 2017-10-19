<?php

$conns = new mysqli("localhost", "root", "", "demo");

$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO image_table VALUES('','$imagetmp','$imagename')";

if ($conns->query($insert_image)=== TRUE) {
					echo "record saved";
					//header("location: index.php");
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conns);
				}

?>