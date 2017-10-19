<?php
session_start();
include('timesview.php');
?>
<!DOCTYPE html>
<html>
    <head>
		<!--Programmer: Victor Nacino-->
        
        <meta http-equiv="X-UA-Compatible" content="IE=Edge;IE=9;IE=8;IE=7">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="jquery-ui.css">
		<!--<link rel="stylesheet" href="/resources/demos/style.css">-->
		<script src="jquery-1.12.4.js"></script>
		<script src="jquery-ui.js"></script>
		<title>How Analysis</title>
		<link rel="stylesheet" href="style.css">

    </head>
    
	<div class="navigationbar">
	<div class="navibutton">
	<button class="mybutton" onclick="location.href='http://10.153.214.200:81/Default.aspx'">PROMIS</button>
	</div>
	</div>
	<div class="maincontent">

	<body onLoad="startTime()">

		<div class="formcontainer">
			<div class="text">
				<table class="" style="width: 1115px; background-color:transparent; border:#38be70;">
				<tr style="background-color:transparent;">
					<td style="border:transparent; padding-left: 90px;"></td>
					<td style="width: 100px;border:#38be70; font-size: 12px; padding-right: 10px;">Date:
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
								</script>
							<?php
							echo date("M.d.y");
							?>
							Time:
							<content id="txt"></content>
							</td>
				</tr>
				</table>
					<form action="submitrate.php" method="post">
					<content id="txt2"></content>
						<div style="margin-left: 80px;">
							<br>
							<?php
							include ('viewselecteditem.php');
							?>
						</div>
						<br>
					<div class="bttncontainer">
					Is this information helpful? Please Rate.
					<br>
					<input type="radio" name="rates" value="1" required>+1&nbsp;
					<input type="radio" name="rates" value="-1" required>-1
					<br>
					<div style="text-align: center; color: maroon;">
					<?php if(!empty($_SESSION['Msg'])) { echo $_SESSION['Msg']; } ?>
					</div>
					<?php unset($_SESSION['Msg']);?>
					<div class="bttncontainer">
					Name: <select name="myusername" style="margin-top:7px;" required>
					<option value="" disabled selected>Select name</option>
					<?php
					include('names.php');
					?>
					</select>
					Password: <input type="password" name="mypassword">
					<br>
					<br>
					</div>
					<div class="bttncontainer">
					<input class="mybutton" name="submit" type="submit" value="OK">
					<input type="button" class="mybutton" onclick="location.href='index.php'" formnovalidate="formnovalidate" value="Back"></button>
					</div>
					</form>
			</div>
			<br>
		</div>
	</div>
		<div id="footer"><p style="text-align: center; color: white; padding: 15px;">&#9400; 2016 ALL Rights Reserved</p></div>
		
		<script>

  $( function() {

    $( "#datepicker" ).datepicker();

  } );

  </script>
    </body>
</html>