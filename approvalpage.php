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
		<title>How Analysis</title>

    </head>
    
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

	<body onLoad="startTime()">

		<div class="formcontainer">
			<div class="text">
				<table class="" style="width: 1115px; background-color:transparent; border:#38be70;">
				<tr style="background-color:transparent;">
					<td style="border:#37be70; padding-left: 90px;"><h1>FOR APPROVAL</h1></td>
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
					<form action="approved.php" method="post">
					<content id="txt2"></content>
						<div style="margin-left: 80px;">
							<br>
							<?php
							include ('selecteditem.php');
							?>
						</div>
					<div class="bttncontainer">
					<input type="radio" name="approval" value="1"> Approve
					<input type="radio" name="approval" value="0" checked> Disapprove
					<br>
					<br>
					</div>
					<div class="bttncontainer">
					<input class="mybutton" name="submit" type="submit" value="OK">
					<input type="button" class="mybutton" onclick="location.href='verifierpage.php'" formnovalidate="formnovalidate" value="Back"></button>
					</div>
					</form>
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

  $( function() {

    $( "#datepicker" ).datepicker();

  } );

  </script>
    </body>
</html>