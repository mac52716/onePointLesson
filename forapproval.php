<?php
include('dbcon.php');
//$conns = new mysqli("localhost", "root", "", "howanalysis");

if ($_SESSION['login_user'] == 'Victor.Nacino'){
	if(!empty($_POST['platform']) && ($_POST['platform']!=='All') && !empty($_POST['search'])){
	$platformsearch=$_POST['platform'];
	$textfield=$_POST['textfield'];
	$textsearch=$_POST['search'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE testerId LIKE '%".$platformsearch."%' AND problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow WHERE platform LIKE '%".$platformsearch."%' AND problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
		
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$testerId."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}elseif(!empty($_POST['platform']) && !empty($_POST['owners']) && ($_POST['platform']!=='All')){
	$platformsearch=$_POST['platform'];
	$owners=$_POST['owners'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE owners LIKE '%".$owners."%' AND testerId LIKE '%".$platformsearch."%' ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow WHERE platform LIKE '%".$platformsearch."%' ORDER by item_no ASC");
	
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}elseif(!empty($_POST['search'])){
	$textsearch=$_POST['search'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow WHERE problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
	
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}else{

	$result = $conn->query("SELECT * FROM howhow ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow ORDER by item_no ASC");
	
	//$verified_by = $row['verified_by'];
	$count=mysqli_num_rows($result);
	
	if($count==0){
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}
}else{
if(!empty($_POST['platform']) && ($_POST['platform']!=='All') && !empty($_POST['search'])){
	$platformsearch=$_POST['platform'];
	$textfield=$_POST['textfield'];
	$textsearch=$_POST['search'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE verified_by LIKE '%".$_SESSION['login_user']."%' AND testerId LIKE '%".$platformsearch."%' AND problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow WHERE platform LIKE '%".$platformsearch."%' AND problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
		
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$testerId."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}elseif(!empty($_POST['platform']) && !empty($_POST['owners']) && ($_POST['platform']!=='All')){
	$platformsearch=$_POST['platform'];
	$owners=$_POST['owners'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE verified_by LIKE '%".$_SESSION['login_user']."%' AND owners LIKE '%".$owners."%' AND testerId LIKE '%".$platformsearch."%' ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow WHERE platform LIKE '%".$platformsearch."%' ORDER by item_no ASC");
	
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}elseif(!empty($_POST['search'])){
	$textsearch=$_POST['search'];
	
	$result = $conn->query("SELECT * FROM howhow WHERE verified_by LIKE '%".$_SESSION['login_user']."%' AND problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow WHERE problems LIKE '%".$textsearch."%' ORDER by item_no ASC");
	
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}else{

	$result = $conn->query("SELECT * FROM howhow WHERE verified_by LIKE '%".$_SESSION['login_user']."%' ORDER by item_no ASC");
	//$result = $conn->query("SELECT item_no,platform,problems,status,corrective_actions,whens,entered_by,approved FROM howhow ORDER by item_no ASC");
	
	//$verified_by = $row['verified_by'];
	$count=mysqli_num_rows($result);
	
	if($count==0){
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
				  
				  
				  if ($row['approved']==1){
					  $approved="Yes";
				  }else{
					  $approved="No";
				  }

		echo"<tr class='clickable-row'><form action='approvalpage.php' method='POST'><td>".$item_no."</td>",
		"<td>".$owners."</td>",
		"<td>".$problems."</td>",
		"<td>".$status."</td>",
		"<td>".$corrective_actions."</td>",
		"<td>".$whens."</td>",
		"<td>".$enteredby."</td>",
		"<td>".$approved."</td>",
		"<td><input name='itemno' type='text' value='$item_no' style='display:none;'><input name='submit' type='submit' value='SELECT' style='cursor: pointer;border: 1px solid #38dd70;border-collapse: collapse;font-size:10px;font-family:verdana;'></td>",
		"</form></tr>";
	}
}
}
?>