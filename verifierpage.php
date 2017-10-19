<?php
session_start();
?>	
<!DOCTYPE html>
<html>
    <head>
		<!--Programmer: Victor Nacino-->
		<meta http-equiv="X-UA-Compatible" content="IE=Edge;IE=9;IE=8;IE=7">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
		<title>One Point Lesson</title>
    </head>
	
	<body onLoad="startTime()">
	
	<div class="navigationbar">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.138:81/Default.aspx'">PROMIS</button>
	</div>
	<div style="text-align: right; margin: -25px 10px;">
	Welcome :
	<?php
		if(!empty($_SESSION["login_user"])) //check if session exists
			{
			   echo $_SESSION["login_user"];
			}
			else{
				header("Location:index.php");
				exit;
			}
	?>
	<button class="mybutton" style="margin: -5px 0px;" onclick="location.href='cancel.php'">LOGOUT</button>
	</div>
	</div>
	
	<div class="maincontent">

		<div class="formcontainer">
			<div class="text">
				<table class="" style="width: 1115px; background-color: #38be70; border:#38be70;">
				<tr style="background-color:transparent;">
					<td style="border:#37be70; padding-left: 90px;"><h1>FOR APPROVAL</h1></td>
					<td style="width: 100px;border:#38be70; font-size: 12px; padding-right: 10px;">Date:
							<script>
								
								</script>
							<?php
							echo date("M.d.y");
							?>
							Time:
							<content id="txt"></content>
							</td>
				</tr>
				</table>
				<table style="background-color:transparent; border:#38be70;">
						<tr style="background-color:transparent;">
							<form action="" method="POST">
							<td style="border:transparent; font-size: 14px; font-family:verdana;">
								Owner:<select name="owners" onchange="showfield(this.options[this.selectedIndex].value)">
								<option value="" disabled selected>Select Owner</option>
								<option value="TESTER">TESTER</option>
								<option value="HANDLER">HANDLER</option>
								<option value="HARDWARE">HARDWARE</option>
								<option value="OTHERS">OTHERS</option>
								</select>
								<content id="machine" name="platform"></content>
								<content id="machine2" name="platform"></content>
								<content id="textfield" name="textfield"></content>
								Input Keyword:<input type="text" name="search">
								<input type="submit" class="" value="search">
							</form>
						</tr>
					</table>
					</div>
					<table style="width: 1115px;">
						<th style="width: 50px;">ITEM No.</th>
						<th>OWNERS</th>
						<th style="width: 250px;">PROBLEM</th>
						<th>STATUS</th>
						<th>CORRECTIVE ACTION</th>
						<th>WHEN</th>
						<th>ENTERED BY</th>
						<th style="width: 50px;">APPROVED</th>
						<th style="width: 50px;">ACTION</th>
						<?php
						include('forapproval.php');
						?>
					</table>
					<?php
					echo "<div style='text-align:center;color:#505050;'>Total number of rows : ".$_SESSION['count']."</div>";
					?>
					<script>
					//jQuery(document).ready(function($) {
						//$(".clickable-row").click(function() {
							//var itemno=$(this).find('td:first').html();
							//window.location.href = "approvalpage.php";
							
						//});
					//});
					</script>
			</div>
			<br>
		</div>
	</div>
		<div id="footer"><p style="text-align: center; color: white; padding: 15px;">&#9400; 2016 ALL Rights Reserved</p></div>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
function startTime() {
								var today = new Date();
								var h = today.getHours();
								var m = today.getMinutes();
								var s = today.getSeconds();
								m = checkTime(m);
								s = checkTime(s);
								document.getElementById('txt').innerHTML =
								h + ":" + m;
								var t = setTimeout(startTime, 500);
							}
							function checkTime(i) {
								if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
								return i;
							}

$( function() {

$( "#datepicker" ).datepicker();

} );

function showfield(name){
	if(name=='OTHERS'){
		document.getElementById('textfield').innerHTML='<input type="text" name="others">';
		document.getElementById('machine').innerHTML='';
		document.getElementById('machine2').innerHTML='';
	}else if(name=='TESTER'){
		document.getElementById('machine').innerHTML='<select name="testerPf" onchange="showUser(this.value)"><?php include('testerpf.php');?></select>';
		document.getElementById('machine2').innerHTML='<select id="testers" name="testerId"></select>';
		document.getElementById('textfield').innerHTML='';
	}else if(name=='HANDLER'){
		document.getElementById('machine').innerHTML='<select name="handlerPf" onchange="showUser2(this.value)"><?php include('handlerpf.php');?></select>';
		document.getElementById('machine2').innerHTML='<select id="handler" name="handlerId"></select>';
		document.getElementById('textfield').innerHTML='';
	}else if(name=='HARDWARE'){
		document.getElementById('machine').innerHTML='';
		document.getElementById('machine2').innerHTML='';
		document.getElementById('textfield').innerHTML='<input type="text" name="hardware"/>';
	}else{
		document.getElementById('textfield').innerHTML='';
		document.getElementById('machine').innerHTML='';
		document.getElementById('machine2').innerHTML='';
	}
}

function showUser(str) {
    if (str == "") {
        document.getElementById("testers").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("testers").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","testers.php?q="+str,true);
        xmlhttp.send();
    }
}

function showUser2(str) {
    if (str == "") {
        document.getElementById("handler").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("handler").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","handler.php?q="+str,true);
        xmlhttp.send();
    }
}

window.onload = startTime();
  </script>

    </body>
</html>
