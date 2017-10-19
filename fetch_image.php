<?php

//header("content-type:image/jpeg");

$conns = new mysqli("localhost", "root", "", "demo");


//$name=$_GET['your_imagename'];

//$select_image="select * from image_table where imagename='$name'";

//$var=mysqli_query($conns,$select_image);

//if($row=mysqli_fetch_array($var))

//{
// $image_name=$row["imagename"];
// $image_content=$row["imagecontent"];
//}
//echo $image_content;

$select_path="select * from image_table";

$var=mysqli_query($conns,$select_path);

while($row=mysqli_fetch_array($var))
{
 $image_name=$row["imagecontent"];
 //$image_path=$row["images/"];
 echo '<img src="images/'.$image_name.'" width=100 height=100">';
}
?>