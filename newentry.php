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
		<link rel="stylesheet" href="jquery-ui.css">
		<!--<link rel="stylesheet" href="/resources/demos/style.css">-->
		<script src="jquery-1.12.4.js"></script>
		<script src="jquery-ui.js"></script>
        <title>One Point Lesson</title>
		<link rel="stylesheet" href="style.css">
    </head>
    
	<div class="navigationbar">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.138:81/Default.aspx'">PROMIS</button>
	</div>
	</div>
	<div class="maincontent">

	<body>

		<div class="formcontainer">
			<div class="text">
				<table class="" style="width: 1115px; background-color:transparent; border:#38be70;">
				<tr style="background-color:transparent;">
					<td style="border:#37be70; padding-left: 90px;"><h1>New Entry</h1></td>
					<td style="width: 100px;border:#38be70; font-size: 12px; padding-right: 10px;">Date:
							<?php
							echo date("M.d.y");
							?>
							Time:
							<content id="txt"></content>
							</td>
				</tr>
				</table>
					<form action="submit.php" method="post" enctype="multipart/form-data">
						<div style="margin-left: 80px;">
							<br>
							Category :<select name="owners" style="margin-left: 96px;" onchange="showfield(this.value)" required>
							<option value="" disabled selected>Select Owner</option>
							<option value="TESTER">TESTER</option>
							<option value="HANDLER">HANDLER</option>
							<option value="HARDWARE">HARDWARE</option>
							<option value="SOFTWARE">SOFTWARE</option>
							<option value="OTHERS">OTHERS</option>
							</select>
							<content id="textfield"></content>
							<content id="machine"></content>
							<content id="machine2"></content>
							<br>
							
							Problem :<input name="problem" type="text" style="width: 700px; margin-left: 103px;" required>
							<br>
							Why 1 :<input name="why1" type="text" style="width: 700px; margin-left: 118px;" required>
							<br>
							Why 2 :<input name="why2" type="text" style="width: 700px; margin-left: 118px;">
							<br>
							Why 3 :<input name="why3" type="text" style="width: 700px; margin-left: 118px;">
							<br>
							Why 4 :<input name="why4" type="text" style="width: 700px; margin-left: 118px;">
							<br>
							Why 5 :<input name="why5" type="text" style="width: 700px; margin-left: 118px;">
							<br>
							Supporting file :
							<input id="fileinput" type="file" name="myimage" style="width: 700px; margin-left: 48px;"><content id="size"></content>
							<br>
							Status :<input name="status" type="text" style="width: 700px; margin-left: 118px;" required>
							<br>
							Corrective action :<br><textarea name="corrective" type="text" style="width: 698px; margin: -20px 0px 0px 183px;" required></textarea>
							<br>
							Verifier :<select name="verifier" style="margin-left: 112px;" required>
							<option value="" disabled selected>Select verifier</option>
							<?php
							include('verifier.php');
							?>
							</select>
							<br>
							When :<input name="when" type="text" id="datepicker" style="width: 100px; margin-left: 123px;" required>&nbsp;<span style="font-size:12px;">mm/dd/yyyy</span>
							<br>
							<br>							
							Username :<select name="myusername" style="width: 185px; margin-left: 88px;" required>
							<option value="" disabled selected>Select name</option>
							<?php
							include('names.php')
							?>
							</select>
							<br>
							Password :<input name="mypassword" type="password" style="width: 181px; margin-left: 94px;">
						</div>
					
					<br>
					<br>
					<div style="text-align: center; color: maroon;">
							<?php if(!empty($_SESSION['Msg'])) { echo ($_SESSION['Msg']); } ?>
							</div>
							<?php unset($_SESSION['Msg']);?>
					<div class="bttncontainer">
					<input class="mybutton" name="submit" type="submit" value="Submit">
					<input type="button" class="mybutton" onclick="location.href='index.php'" formnovalidate="formnovalidate" value="Cancel">
					</div>
					</form>
			</div>
			<br>
		</div>
	</div>
		<div id="footer"><p style="text-align: center; color: white; padding: 15px;">&#9400; 2016 ALL Rights Reserved</p></div>
		
<script type="text/javascript">
$('#fileinput').bind('change', function() {
			var size = this.files[0].size/1024/1024;
			var decimal = size.toFixed(2);
			
			if(size > 25){
				alert('This file size is: ' + decimal + "MB \n Please compressed the file to 25MB or Below");
				document.getElementById('fileinput').value = "";
			}
            
        });

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