<?php
include('dbcon.php');
//$conns = new mysqli("localhost", "root", "", "howanalysis");

if(!empty($_POST['itemno'])) {
	$itemno=$_POST['itemno'];
}else{
 header("Location: verifierpage.php");
 exit;
}

    	$result = $conn->query("SELECT * FROM howhow WHERE item_no = '".$itemno."'");
    	while ($row = $result->fetch_assoc()) {
                $item_no=$row['item_no'];
				$testerId = $row['testerId'];
				$handlerId = $row['handlerId'];
				$hardware = $row['hardware'];
				$owners = $row['owners'];
				$others = $row['others'];
				$problems = $row['problems'];
				$why_1 = $row['why_1'];
				$why_2 = $row['why_2'];
				$why_3 = $row['why_3'];
				$why_4 = $row['why_4'];
				$why_5 = $row['why_5'];
				$imagename = $row['imagename'];
				$imagepath = $row['imagepath'];
				$status = $row['status'];
				$corrective_actions = $row['corrective_actions'];
				$whens = $row['whens'];
				$enteredby = $row['entered_by'];
				$datetime = $row['datetime_entry'];

							echo"<table style='width: 970px; margin-left: -10px; background-color:transparent; border:transparent;'>",
								"<tr class='tr2'>",
								"<th class='th2'>ITEM ID :</th>",
								"<td class='td2'><input type='text' name='itemno' value='$item_no' style='display:none;'>$item_no</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>OWNER :</th>",
								"<td class='td2'>$owners</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>TESTER ID :</th>",
								"<td class='td2'>$testerId</td>",
								"</tr>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>HANDLER ID :</th>",
								"<td class='td2'>$handlerId</td>",
								"</tr>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>HARDWARE :</th>",
								"<td class='td2'>$hardware</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>OTHER :</th>",
								"<td class='td2'>$others</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>PROBLEM :</th>",
								"<td class='td2'>$problems</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Why 1 :</th>",
								"<td class='td2'>$why_1</td>",
								"</tr>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Why 2 :</th>",
								"<td class='td2'>$why_2</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Why 3 :</th>",
								"<td class='td2'>$why_3</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Why 4 :</th>",
								"<td class='td2'>$why_4</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Why 5 :</th>",
								"<td class='td2'>$why_5</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Supporting file :</th>",
								//"<td class='td2'><img src='$imagepath/$imagename' alt='No uploaded image' style='width:300px;height:200px;border: 1px solid gray;'></td>",
								"<td class='td2'><div class='tooltip'><a href='$imagepath/$imagename' target='_blank'>$imagename</a><span class='tooltiptext'>Click to download</span></div></td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Status :</th>",
								"<td class='td2'>$status</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Corrective action :</th>",
								"<td class='td2'>$corrective_actions</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>When :</th>",
								"<td class='td2'>$whens</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Entered by :</th>",
								"<td class='td2'>$enteredby</td>",
								"</tr>",
								"<tr class='tr2'>",
								"<th class='th2'>Date/Time of entry :</th>",
								"<td class='td2'>$datetime</td>",
								"</tr>",
							"</table>";
	}
?>