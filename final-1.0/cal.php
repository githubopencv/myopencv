<?php

session_start();

?>
<html>
<head>
	<title> Update Schedule </title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>

	<style>
		header {
			background-color:lightgray;
			font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #888;
			text-align:center;
			padding:5px;	 
		}
	</style>
<body>
	<header>
	<h2>GroupR Scheduler</h2>
	</header>

	<center>
	<div id="sign_in">
	<br>
	<br>
	<form action="cal_submit.php" method="post" class="schedule">
	<h4>Please Select Your Available Times:</h4>
	<table id="customers" style="width:100%" border="1">
	<br>
    <tr>	
	    <th>Sunday:</th>
		<th>Monday:</th>
		<th>Tuesday:</th>
		<th>Wednesday:</th>
		<th>Thursday:</th>
		<th>Friday:</th>
		<th>Saturday:</th>
	</tr>
    <tr>
        <td class="checkbox"><input type="checkbox" name="8:00-9:50am[]" value="Sunday">8:00 - 9:50 am</td>
		<td class="checkbox"><input type="checkbox" name="8:00-9:50am[]" value="Monday">8:00 - 9:50 am</td>
		<td class="checkbox"><input type="checkbox" name="8:00-9:50am[]" value="Tuesday">8:00 - 9:50 am</td>
		<td class="checkbox"><input type="checkbox" name="8:00-9:50am[]" value="Wednesday">8:00 - 9:50 am</td>
		<td class="checkbox"><input type="checkbox" name="8:00-9:50am[]" value="Thursday">8:00 - 9:50 am</td>
		<td class="checkbox"><input type="checkbox" name="8:00-9:50am[]" value="Friday">8:00 - 9:50 am</td>
		<td class="checkbox"><input type="checkbox" name="8:00-9:50am[]" value="Saturday">8:00 - 9:50 am</td>
	</tr>
	<tr>
	    <td class="checkbox"><input type="checkbox" name="10:00-11:50am[]" value="Sunday">10:00 -11:50 am</td>
		<td class="checkbox"><input type="checkbox" name="10:00-11:50am[]" value="Monday">10:00 - 11:50 am</td>
		<td class="checkbox"><input type="checkbox" name="10:00-11:50am[]" value="Tuesday">10:00 - 11:50 am</td>
		<td class="checkbox"><input type="checkbox" name="10:00-11:50am[]" value="Wednesday">10:00 - 11:50 am</td>
		<td class="checkbox"><input type="checkbox" name="10:00-11:50am[]" value="Thursday">10:00 - 11:50 am</td>
		<td class="checkbox"><input type="checkbox" name="10:00-11:50am[]" value="Friday">10:00 - 11:50 am</td>
		<td class="checkbox"><input type="checkbox" name="10:00-11:50am[]" value="Saturday">10:00 - 11:50 am</td>
	</tr>
	<tr>
	    <td class="checkbox"><input type="checkbox" name="12:00-1:50pm[]" value="Sunday">12:00 -1:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="12:00-1:50pm[]" value="Monday">12:00 - 1:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="12:00-1:50pm[]" value="Tuesday">12:00 - 1:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="12:00-1:50pm[]" value="Wednesday">12:00 - 1:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="12:00-1:50pm[]" value="Thursday">12:00 - 1:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="12:00-1:50pm[]" value="Friday">12:00 - 1:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="12:00-1:50pm[]" value="Saturday">12:00 - 1:50 pm</td>
	</tr>
	<tr>
	    <td class="checkbox"><input type="checkbox" name="2:00-3:50pm[]" value="Sunday">2:00 -3:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="2:00-3:50pm[]" value="Monday">2:00 - 3:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="2:00-3:50pm[]" value="Tuesday">2:00 - 3:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="2:00-3:50pm[]" value="Wednesday">2:00 - 3:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="2:00-3:50pm[]" value="Thursday">2:00 - 3:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="2:00-3:50pm[]" value="Friday">2:00 - 3:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="2:00-3:50pm[]" value="Saturday">2:00 - 3:50 pm</td>
	</tr>
	<tr>
	    <td class="checkbox"><input type="checkbox" name="4:00-5:50pm[]" value="Sunday">4:00 -5:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="4:00-5:50pm[]" value="Monday">4:00 - 5:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="4:00-5:50pm[]" value="Tuesday">4:00 - 5:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="4:00-5:50pm[]" value="Wednesday">4:00 - 5:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="4:00-5:50pm[]" value="Thursday">4:00 - 5:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="4:00-5:50pm[]" value="Friday">4:00 - 5:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="4:00-5:50pm[]" value="Saturday">4:00 - 5:50 pm</td>
	</tr>
	<tr>
	    <td class="checkbox"><input type="checkbox" name="6:00-7:50pm[]" value="Sunday">6:00 - 7:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="6:00-7:50pm[]" value="Monday">6:00 - 7:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="6:00-7:50pm[]" value="Tuesday">6:00 - 7:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="6:00-7:50pm[]" value="Wednesday">6:00 - 7:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="6:00-7:50pm[]" value="Thursday">6:00 - 7:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="6:00-7:50pm[]" value="Friday">6:00 - 7:50 pm</td>
		<td class="checkbox"><input type="checkbox" name="6:00-7:50pm[]" value="Saturday">6:00 - 7:50 pm</td>
	</tr>
	<tr>
	    <td class="checkbox"><input type="checkbox" name="NoFreeTime[]" value="Sunday">No Free Time</td>
		<td class="checkbox"><input type="checkbox" name="NoFreeTime[]" value="Monday">No Free Time</td>
		<td class="checkbox"><input type="checkbox" name="NoFreeTime[]" value="Tuesday">No Free Time</td>
		<td class="checkbox"><input type="checkbox" name="NoFreeTime[]" value="Wednesday">No Free Time</td>
		<td class="checkbox"><input type="checkbox" name="NoFreeTime[]" value="Thursday">No Free Time</td>
		<td class="checkbox"><input type="checkbox" name="NoFreeTime[]" value="Friday">No Free Time</td>
		<td class="checkbox"><input type="checkbox" name="NoFreeTime[]" value="Saturday">No Free Time</td>
	</tr>
	</table>
	<br>
	<input class="button" type="submit" name="submit" value="Add to Schedule">
	<br>
	<br>
    <a href='index.php'>Return Home</a>
	<br></label></center>
	</form>
	</center>
	</div>
</body>
</html>
