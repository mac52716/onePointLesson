<?php
include('dbcon.php');
//$conns = new mysqli("localhost", "root", "", "howanalysis");

if(!empty($_POST['platform']) && ($_POST['platform']!=='All') && !empty($_POST['search'])){
	$platformsearch=$_POST['platform'];
	$textsearch=$_POST['search'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE approved LIKE '1' AND platform LIKE '%".$platformsearch."%' AND problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
						
	$count=mysqli_num_rows($result);
	if ($count==0){
		$_SESSION['count']=0;
	}else{
		$_SESSION['count']=$count;
	}
	
	while ($row = $result->fetch_assoc()) {
		$item_no = $row['item_no'];
		$owners = $row['owners'];
		$problems = $row['problems'];
		$status = $row['status'];
		$corrective_actions = $row['corrective_actions'];
		$whens = $row['whens'];
		$enteredby = $row['entered_by'];
		$verifiedby = $row['verified_by'];
		$ratings = $row['ratings'];
		$timesviewed = $row['times_viewed'];

		echo"<tr class='clickable-row'><form action='viewapproved.php' method='POST'><td>".$item_no."</td>",
		"<td>".$platform."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$verifiedby."</td>",
		"<td>".$ratings."</td>",
		"<td>".$timesviewed."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}elseif(!empty($_POST['platform']) && ($_POST['platform']!=='All')){
	$platformsearch=$_POST['platform'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE approved LIKE '1' AND platform LIKE '%".$platformsearch."%' ORDER by item_no ASC");
						
	$count=mysqli_num_rows($result);
	if ($count==0){
		$_SESSION['count']=0;
	}else{
		$_SESSION['count']=$count;
	}
	
	while ($row = $result->fetch_assoc()) {
		$item_no = $row['item_no'];
		$problems = $row['problems'];
		$status = $row['status'];
		$corrective_actions = $row['corrective_actions'];
		$whens = $row['whens'];
		$enteredby = $row['entered_by'];
		$verifiedby = $row['verified_by'];
		$ratings = $row['ratings'];
		$timesviewed = $row['times_viewed'];

		echo"<tr class='clickable-row'><form action='viewapproved.php' method='POST'><td>".$item_no."</td>",
		"<td>".$platform."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$verifiedby."</td>",
		"<td>".$ratings."</td>",
		"<td>".$timesviewed."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}elseif(!empty($_POST['search'])){
	$textsearch=$_POST['search'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE approved LIKE '1' AND problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
						
	$count=mysqli_num_rows($result);
	if ($count==0){
		$_SESSION['count']=0;
	}else{
		$_SESSION['count']=$count;
	}
	
	while ($row = $result->fetch_assoc()) {
		$item_no = $row['item_no'];
		$owners = $row['owners'];
		$problems = $row['problems'];
		$status = $row['status'];
		$corrective_actions = $row['corrective_actions'];
		$whens = $row['whens'];
		$enteredby = $row['entered_by'];
		$verifiedby = $row['verified_by'];
		$ratings = $row['ratings'];
		$timesviewed = $row['times_viewed'];

		echo"<tr class='clickable-row'><form action='viewapproved.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$verifiedby."</td>",
		"<td>".$ratings."</td>",
		"<td>".$timesviewed."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}else{
	$result = $conn->query("SELECT * FROM howhow WHERE approved LIKE '1' ORDER by item_no ASC");
	
	$count=mysqli_num_rows($result);
	if ($count==0){
		$_SESSION['count']=0;
	}else{
		$_SESSION['count']=$count;
	}
	
	while ($row = $result->fetch_assoc()) {
		$item_no = $row['item_no'];
		$owners = $row['owners'];
		$problems = $row['problems'];
		$status = $row['status'];
		$corrective_actions = $row['corrective_actions'];
		$whens = $row['whens'];
		$enteredby = $row['entered_by'];
		$verifiedby = $row['verified_by'];
		$ratings = $row['ratings'];
		$timesviewed = $row['times_viewed'];

		echo"<tr class='clickable-row'><form action='viewapproved.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$verifiedby."</td>",
		"<td>".$ratings."</td>",
		"<td>".$timesviewed."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}
?>