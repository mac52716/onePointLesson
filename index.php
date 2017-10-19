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
<title>One Point Lesson</title>
<link rel="stylesheet" href="style.css">
</head>
	
	<body onLoad="startTime()">
	
	<div class="navigationbar">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.200:81/Default.aspx'">PROMIS</button>
	<form action="authentication.php" method="POST">
	<div style="text-align: right; margin: -30px 10px;">
				<div style="text-align: center; color: maroon; width: 900px; margin-top:-12px; position: absolute;">
				<?php if(!empty($_SESSION['errMsg'])) { echo $_SESSION['errMsg']; } 
				?>
				</div>
				<?php unset($_SESSION['errMsg']);?>
	Verifier :<select name="verifier" style="margin:8px;" required>
	<option value="" disabled selected>Select name</option>
	<?php
	include('verifier.php');
	?>
	</select>
	Password :<input name="mypassword" type="password" style="margin:8px;" placeholder="Password">
	<button class="mybutton" type="submit" name="submit">LOGIN</button>
	</div>
	</form>
	</div>
	</div>
	
	<div class="maincontent">

		<div class="formcontainer">
			<div class="text">
				<table class="" style="width: 1115px; background-color:transparent; border:#37be70;">
				<tr style="background-color:transparent;">				
					<td style="border:#37be70; padding-left: 90px;"><h1>One Point Lesson</h1></td>
					<td style="width: 100px;border:#37be70; font-size: 12px;">Date:
							<?php
							echo date("M.d.y");
							?>
							Time:
							<content id="txt"></content>
							</td>
				</tr>
				</table>
					
							<button class="mybutton" style="width: 140px;" onclick="location.href='newentry.php'">NEW ENTRY</button>
							<div style="width: 100%; text-align: right;">
							<form action="" method="POST">
								Owner:<select name="owners" onchange="showfield(this.options[this.selectedIndex].value)">
								<option value="" disabled selected>Select Owner</option>
								<option value="TESTER">TESTER</option>
								<option value="HANDLER">HANDLER</option>
								<option value="HARDWARE">HARDWARE</option>
								<option value="SOFTWARE">SOFTWARE</option>
								<option value="OTHERS">OTHERS</option>
								</select>
								<content id="machine"></content>
								<content id="machine2"></content>
								<content id="textfield"></content>
								Input Keyword:<input type="text" name="search">
								<input type="submit" class="" value="search">
							</form>
							</div>

					</table>
					</div>
					<table style="width: 1115px;">
						<th style="width: 40px;">ITEM No.</th>
						<th>OWNER</th>
						<th>PROBLEM</th>
						<th>STATUS</th>
						<th>CORRECTIVE ACTION</th>
						<th>WHEN</th>
						<th>ENTERED BY</th>
						<th>VERIFIED BY</th>
						<th>RATING</th>
						<th style="width: 60px;">TIMES VIEWED</th>
						<th style="width: 40px;">ACTION</th>
						<?php
							include ('allapproved.php');
						?>
					</table>
					<?php
					echo "<div style='text-align:center;color:#505050;'>Total number of rows : ".$_SESSION['count']."</div>";
					?>

		</div>
	</div>
		<div id="footer"><p style="text-align: center; color: white; padding: 15px;">&#9400; TEST APPLICATIONS ENGG.</p></div>
		
<script type="text/javascript">
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