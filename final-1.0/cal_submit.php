<?php

session_start();

?>
<html>
<head>
	<title>Schedule</title>
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
	<h2>GroupR Schedule</h2>
</header>
<center>
<?php
  $name = $_SESSION['user_name'];
?> 

<?php
  $name = $_SESSION['user_name'];
  $connection = new mysqli('localhost','root','','user_login');
  if(!$connection)
  {
    echo('<p> Unable to connect. </p>');
    exit();
  }
  $check=mysqli_query($connection,"select * from calendar where username = '$name';");
  if(isset ($check)){
		mysqli_query($connection,"delete from calendar where username = '$name';");
		$groups=mysqli_query($connection,"select * from groups where username = '$name';");
		foreach($groups as $selected2){
			$groupname = $selected2['groupname'].'calendar';
			mysqli_query($connection,"delete from $groupname where username = '$name';");
		}
	}
  $good = array(0,0,0,0,0,0,0);
  if(isset($_POST['8:00-9:50am']) && is_array($_POST['8:00-9:50am'])){
  foreach($_POST['8:00-9:50am'] as $selected) {
    if($selected == "Sunday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Sunday','8:00 - 9:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Sunday','8:00 - 9:50 am','$name');");
			}
		}
	    $good[0] = 1;
	}
    if($selected == "Monday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Monday','8:00 - 9:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Monday','8:00 - 9:50 am','$name');");
			}
		}
	    $good[1] = 1;
	}
    if($selected == "Tuesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Tuesday','8:00 - 9:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Tuesday','8:00 - 9:50 am','$name');");
			}
		}
	    $good[2] = 1;
	}
    if($selected == "Wednesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Wednesday','8:00 - 9:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Wednesday','8:00 - 9:50 am','$name');");
			}
		}
	    $good[3] = 1;
	}
	if($selected == "Thursday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Thursday','8:00 - 9:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Thursday','8:00 - 9:50 am','$name');");
			}
		}
	    $good[4] = 1;
	}
	if($selected == "Friday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Friday','8:00 - 9:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Friday','8:00 - 9:50 am','$name');");
			}
		}
	    $good[5] = 1;
	}
	if($selected == "Saturday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Saturday','8:00 - 9:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Saturday','8:00 - 9:50 am','$name');");
			}
		}
	    $good[6] = 1;
	}
  }
  }
  $j=0;
  for($j=0; $j<7; $j++){
      if($good[$j] == 1)
	      echo "";
	  else
	      echo "";
    }
  $good = array(0,0,0,0,0,0,0);
  if(isset($_POST['10:00-11:50am']) && is_array($_POST['10:00-11:50am'])){
  foreach($_POST['10:00-11:50am'] as $selected) {
    if($selected == "Sunday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Sunday','10:00 - 11:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Sunday','10:00 - 11:50 am','$name');");
			}
		}
	    $good[0] = 1;
	}
    if($selected == "Monday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Monday','10:00 - 11:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Monday','10:00 - 11:50 am','$name');");
			}
		}
	    $good[1] = 1;
	}
    if($selected == "Tuesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Tuesday','10:00 - 11:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Tuesday','10:00 - 11:50 am','$name');");
			}
		}
	    $good[2] = 1;
	}
    if($selected == "Wednesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Wednesday','10:00 - 11:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Wednesday','10:00 - 11:50 am','$name');");
			}
		}
	    $good[3] = 1;
	}
	if($selected == "Thursday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Thursday','10:00 - 11:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Thursday','10:00 - 11:50 am','$name');");
			}
		}
	    $good[4] = 1;
	}
	if($selected == "Friday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Friday','10:00 - 11:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Friday','10:00 - 11:50 am','$name');");
			}
		}
	    $good[5] = 1;
	}
	if($selected == "Saturday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Saturday','10:00 - 11:50 am','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Saturday','10:00 - 11:50 am','$name');");
			}
		}
	    $good[6] = 1;
	}
  }
  }
  $j=0;
  for($j=0; $j<7; $j++){
      if($good[$j] == 1)
	      echo "";
	  else
	      echo "";
    }
  $good = array(0,0,0,0,0,0,0);
  if(isset($_POST['12:00-1:50pm']) && is_array($_POST['12:00-1:50pm'])){
  foreach($_POST['12:00-1:50pm'] as $selected) {
    if($selected == "Sunday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Sunday','12:00 - 1:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Sunday','12:00 - 1:50 pm','$name');");
			}
		}
	    $good[0] = 1;
	}
    if($selected == "Monday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Monday','12:00 - 1:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Monday','12:00 - 1:50 pm','$name');");
			}
		}
	    $good[1] = 1;
	}
    if($selected == "Tuesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Tuesday','12:00 - 1:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Tuesday','12:00 - 1:50 pm','$name');");
			}
		}
	    $good[2] = 1;
	}
    if($selected == "Wednesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Wednesday','12:00 - 1:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Wednesday','12:00 - 1:50 pm','$name');");
			}
		}
	    $good[3] = 1;
	}
	if($selected == "Thursday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Thursday','12:00 - 1:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Thursday','12:00 - 1:50 pm','$name');");
			}
		}
	    $good[4] = 1;
	}
	if($selected == "Friday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Friday','12:00 - 1:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Friday','12:00 - 1:50 pm','$name');");
			}
		}
	    $good[5] = 1;
	}
	if($selected == "Saturday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Saturday','12:00 - 1:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Saturday','12:00 - 1:50 pm','$name');");
			}
		}
	    $good[6] = 1;
	}
  }
  }
  $j=0;
  for($j=0; $j<7; $j++){
      if($good[$j] == 1)
	      echo "";
	  else
	      echo "";
    }
  $good = array(0,0,0,0,0,0,0);
  if(isset($_POST['2:00-3:50pm']) && is_array($_POST['2:00-3:50pm'])){
  foreach($_POST['2:00-3:50pm'] as $selected) {
    if($selected == "Sunday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Sunday','2:00 - 3:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Sunday','2:00 - 3:50 pm','$name');");
			}
		}
	    $good[0] = 1;
	}
    if($selected == "Monday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Monday','2:00 - 3:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Monday','2:00 - 3:50 pm','$name');");
			}
		}
	    $good[1] = 1;
	}
    if($selected == "Tuesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Tuesday','2:00 - 3:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Tuesday','2:00 - 3:50 pm','$name');");
			}
		}
	    $good[2] = 1;
	}
    if($selected == "Wednesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Wednesday','2:00 - 3:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Wednesday','2:00 - 3:50 pm','$name');");
			}
		}
	    $good[3] = 1;
	}
	if($selected == "Thursday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Thursday','2:00 - 3:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Thursday','2:00 - 3:50 pm','$name');");
			}
		}
	    $good[4] = 1;
	}
	if($selected == "Friday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Friday','2:00 - 3:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Friday','2:00 - 3:50 pm','$name');");
			}
		}
	    $good[5] = 1;
	}
	if($selected == "Saturday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Saturday','2:00 - 3:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Saturday','2:00 - 3:50 pm','$name');");
			}
		}
	    $good[6] = 1;
	}
  }
  }
  $j=0;
  for($j=0; $j<7; $j++){
      if($good[$j] == 1)
	      echo "";
	  else
	      echo "";
    }
  $good = array(0,0,0,0,0,0,0);
  if(isset($_POST['4:00-5:50pm']) && is_array($_POST['4:00-5:50pm'])){
  foreach($_POST['4:00-5:50pm'] as $selected) {
    if($selected == "Sunday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Sunday','4:00 - 5:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Sunday','4:00 - 5:50 pm','$name');");
			}
		}
	    $good[0] = 1;
	}
    if($selected == "Monday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Monday','4:00 - 5:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Monday','4:00 - 5:50 pm','$name');");
			}
		}
	    $good[1] = 1;
	}
    if($selected == "Tuesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Tuesday','4:00 - 5:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Tuesday','4:00 - 5:50 pm','$name');");
			}
		}
	    $good[2] = 1;
	}
    if($selected == "Wednesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Wednesday','4:00 - 5:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Wednesday','4:00 - 5:50 pm','$name');");
			}
		}
	    $good[3] = 1;
	}
	if($selected == "Thursday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Thursday','4:00 - 5:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Thursday','4:00 - 5:50 pm','$name');");
			}
		}
	    $good[4] = 1;
	}
	if($selected == "Friday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Friday','4:00 - 5:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Friday','4:00 - 5:50 pm','$name');");
			}
		}
	    $good[5] = 1;
	}
	if($selected == "Saturday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Saturday','4:00 - 5:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Saturday','4:00 - 5:50 pm','$name');");
			}
		}
	    $good[6] = 1;
	}
  }
  }
  $j=0;
  for($j=0; $j<7; $j++){
      if($good[$j] == 1)
	      echo "";
	  else
	      echo "";
    }
  $good = array(0,0,0,0,0,0,0);
  if(isset($_POST['6:00-7:50pm']) && is_array($_POST['6:00-7:50pm'])){
  foreach($_POST['6:00-7:50pm'] as $selected) {
    if($selected == "Sunday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Sunday','6:00 - 7:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Sunday','6:00 - 7:50 pm','$name');");
			}
		}
	    $good[0] = 1;
	}
    if($selected == "Monday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Monday','6:00 - 7:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Monday','6:00 - 7:50 pm','$name');");
			}
		}
	    $good[1] = 1;
	}
    if($selected == "Tuesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Tuesday','6:00 - 7:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Tuesday','6:00 - 7:50 pm','$name');");
			}
		}
	    $good[2] = 1;
	}
    if($selected == "Wednesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Wednesday','6:00 - 7:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Wednesday','6:00 - 7:50 pm','$name');");
			}
		}
	    $good[3] = 1;
	}
	if($selected == "Thursday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Thursday','6:00 - 7:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Thursday','6:00 - 7:50 pm','$name');");
			}
		}
	    $good[4] = 1;
	}
	if($selected == "Friday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Friday','6:00 - 7:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Friday','6:00 - 7:50 pm','$name');");
			}
		}
	    $good[5] = 1;
	}
	if($selected == "Saturday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Saturday','6:00 - 7:50 pm','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Saturday','6:00 - 7:50 pm','$name');");
			}
		}
	    $good[6] = 1;
	}
  }
  }
  $j=0;
  for($j=0; $j<7; $j++){
      if($good[$j] == 1)
	      echo "";
	  else
	      echo "";
    }
  $good = array(0,0,0,0,0,0,0);
  if(isset($_POST['NoFreeTime']) && is_array($_POST['NoFreeTime'])){
  foreach($_POST['NoFreeTime'] as $selected) {
    if($selected == "Sunday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Sunday','No Free Time','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Sunday','No Free Time','$name');");
			}
		}
	    $good[0] = 1;
	}
    if($selected == "Monday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Monday','No Free Time','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Monday','No Free Time','$name');");
			}
		}
	    $good[1] = 1;
	}
    if($selected == "Tuesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Tuesday','No Free Time','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Tuesday','No Free Time','$name');");
			}
		}
	    $good[2] = 1;
	}
    if($selected == "Wednesday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Wednesday','No Free Time','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Wednesday','No Free Time','$name');");
			}
		}
	    $good[3] = 1;
	}
	if($selected == "Thursday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Thursday','No Free Time','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Thursday','No Free Time','$name');");
			}
		}
	    $good[4] = 1;
	}
	if($selected == "Friday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Friday','No Free Time','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Friday','No Free Time','$name');");
			}
		}
	    $good[5] = 1;
	}
	if($selected == "Saturday"){ 
        mysqli_query($connection,"INSERT INTO calendar (day,time,username) VALUES ('Saturday','No Free Time','$name');");
		if(isset($groups))
		{
			foreach($groups as $selected2){
				$groupname = $selected2['groupname'].'calendar';
				mysqli_query($connection,"insert into $groupname (day,time,username) VALUES ('Saturday','No Free Time','$name');");
			}
		}
	    $good[6] = 1;
	}
  }
  }
  $j=0;
  for($j=0; $j<7; $j++){
      if($good[$j] == 1)
	      echo "";
	  else
	      echo "";
    }
?>
</table>
	
	<br>
	<br>
	<font size=4px style="Helvetica Neue", Helvetica, Arial, sans-serif;
    color= #3300FF;
    text-shadow= 1px 1px 1px #FFF;> Schedule updated, you will be returned to the homepage in 5 seconds. </font>
	<br>
	<br>
	<br>
	<META HTTP-EQUIV="refresh" CONTENT="5;URL=index.php">
    <a href='index.php'>Return Home</a>
	<br>
	
</center>
</body>
</html>
