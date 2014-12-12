<html>
<head>
	<title> Group Home </title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<style>
	header {
		background-color:black;
		color:white;
		text-align:center;
		padding:5px;	
	}
</style>
<body>
<body id="body_color">
<header>
<h2>Group Home</h2>
</header>
    <a href="http://localhost/cal.html">Add a member</a>
	<a href="http://localhost/files.html">Files</a>
	<a href="http://localhost/events.html">Events</a>
	<form action="grouphomepage.php" method="post">
	Comment: <input type="text" name="comment"><br>
	<input type="submit" value="Submit">
	</form>
<table id="customers">
<tr>
<th>Times</th>
<th>Sunday:</th>
<th>Monday:</th>
<th>Tuesday:</th>
<th>Wednesday:</th>
<th>Thursday:</th>
<th>Friday:</th>
<th>Saturday:</th>
</tr>
<?php

    $connection = new mysqli('localhost','root','Munchy1*','group_management');
    if(!$connection)
    {
        echo('<p> Unable to connect. </p>');
	    exit();
    }
	
	if (isset($_POST['comment'])) 
	{
	    $comment = $_POST['comment'];
  
        mysqli_query($connection,"INSERT INTO comments SET comment_text = '$comment'"); 
	}

	$result = mysqli_query($connection,'SELECT * FROM calendar');
    $sun = array(0,0,0,0,0,0,0);
	$mon = array(0,0,0,0,0,0,0);
	$tue = array(0,0,0,0,0,0,0);
	$wed = array(0,0,0,0,0,0,0);
	$thu = array(0,0,0,0,0,0,0);
	$fri = array(0,0,0,0,0,0,0);
	$sat = array(0,0,0,0,0,0,0);
	$count = 0;
	$prev = " ";
    while($row = mysqli_fetch_array($result))
    {
	    if($row['username'] != $prev){
		    $prev = $row['username'];
		    $count++;
		}
        if($row['day'] == "Sunday"){
		    if($row['time'] == "8:00 - 9:50 am")
			    $sun[0]++;
			if($row['time'] == "10:00 - 11:50 am")
			    $sun[1]++;
			if($row['time'] == "12:00 - 1:50 pm")
			    $sun[2]++;
			if($row['time'] == "2:00 - 3:50 pm")
			    $sun[3]++;
			if($row['time'] == "4:00 - 5:50 pm")
			    $sun[4]++;
			if($row['time'] == "6:00 - 7:50 pm")
			    $sun[5]++;
			if($row['time'] == "No Free Time")
			    $sun[6]++;
	    }
		if($row['day'] == "Monday"){
		    if($row['time'] == "8:00 - 9:50 am")
			    $mon[0]++;
			if($row['time'] == "10:00 - 11:50 am")
			    $mon[1]++;
			if($row['time'] == "12:00 - 1:50 pm")
			    $mon[2]++;
			if($row['time'] == "2:00 - 3:50 pm")
			    $mon[3]++;
			if($row['time'] == "4:00 - 5:50 pm")
			    $mon[4]++;
			if($row['time'] == "6:00 - 7:50 pm")
			    $mon[5]++;
			if($row['time'] == "No Free Time")
			    $mon[6]++;
	    }
		if($row['day'] == "Tuesday"){
		    if($row['time'] == "8:00 - 9:50 am")
			    $tue[0]++;
			if($row['time'] == "10:00 - 11:50 am")
			    $tue[1]++;
			if($row['time'] == "12:00 - 1:50 pm")
			    $tue[2]++;
			if($row['time'] == "2:00 - 3:50 pm")
			    $tue[3]++;
			if($row['time'] == "4:00 - 5:50 pm")
			    $tue[4]++;
			if($row['time'] == "6:00 - 7:50 pm")
			    $tue[5]++;
			if($row['time'] == "No Free Time")
			    $tue[6]++;
	    }
		if($row['day'] == "Wednesday"){
		    if($row['time'] == "8:00 - 9:50 am")
			    $wed[0]++;
			if($row['time'] == "10:00 - 11:50 am")
			    $wed[1]++;
			if($row['time'] == "12:00 - 1:50 pm")
			    $wed[2]++;
			if($row['time'] == "2:00 - 3:50 pm")
			    $wed[3]++;
			if($row['time'] == "4:00 - 5:50 pm")
			    $wed[4]++;
			if($row['time'] == "6:00 - 7:50 pm")
			    $wed[5]++;
			if($row['time'] == "No Free Time")
			    $wed[6]++;
	    }
		if($row['day'] == "Thursday"){
		    if($row['time'] == "8:00 - 9:50 am")
			    $thu[0]++;
			if($row['time'] == "10:00 - 11:50 am")
			    $thu[1]++;
			if($row['time'] == "12:00 - 1:50 pm")
			    $thu[2]++;
			if($row['time'] == "2:00 - 3:50 pm")
			    $thu[3]++;
			if($row['time'] == "4:00 - 5:50 pm")
			    $thu[4]++;
			if($row['time'] == "6:00 - 7:50 pm")
			    $thu[5]++;
			if($row['time'] == "No Free Time")
			    $thu[6]++;
	    }
		if($row['day'] == "Friday"){
		    if($row['time'] == "8:00 - 9:50 am")
			    $fri[0]++;
			if($row['time'] == "10:00 - 11:50 am")
			    $fri[1]++;
			if($row['time'] == "12:00 - 1:50 pm")
			    $fri[2]++;
			if($row['time'] == "2:00 - 3:50 pm")
			    $fri[3]++;
			if($row['time'] == "4:00 - 5:50 pm")
			    $fri[4]++;
			if($row['time'] == "6:00 - 7:50 pm")
			    $fri[5]++;
			if($row['time'] == "No Free Time")
			    $fri[6]++;
	    }
		if($row['day'] == "Saturday"){
		    if($row['time'] == "8:00 - 9:50 am")
			    $sat[0]++;
			if($row['time'] == "10:00 - 11:50 am")
			    $sat[1]++;
			if($row['time'] == "12:00 - 1:50 pm")
			    $sat[2]++;
			if($row['time'] == "2:00 - 3:50 pm")
			    $sat[3]++;
			if($row['time'] == "4:00 - 5:50 pm")
			    $sat[4]++;
			if($row['time'] == "6:00 - 7:50 pm")
			    $sat[5]++;
			if($row['time'] == "No Free Time")
			    $sat[6]++;
	    }
    }
	$j=0;
	
	for($j=0; $j<7; $j++){
	  echo "<tr>";
	  if($j == 0)
	      echo "<th>" . "8:00 - 9:50 am" . "</th>";
	  if($j == 1)
	      echo "<th>" . "10:00 - 11:50 am" . "</th>";
      if($j == 2)
	      echo "<th>" . "12:00 - 1:50 pm" . "</th>";
      if($j == 3)
	      echo "<th>" . "2:00 - 3:50 pm" . "</th>";
      if($j == 4)
	      echo "<th>" . "4:00 - 5:50 pm" . "</th>";
      if($j == 5)
	      echo "<th>" . "6:00 - 7:50 pm" . "</th>";
      if($j == 6)
	      echo "<th>" . "No Free Time" . "</th>";		  
      if($sun[$j] == $count)
	      echo "<td class='green'><center>" . " ". "</center></td>";
	  else
	      echo "<td class='red'><center>" . " " . "</center></td>";
	  if($mon[$j] == $count)
	      echo "<td class='green'><center>" . " ". "</center></td>";
	  else
	      echo "<td class='red'><center>" . " " . "</center></td>";
      if($tue[$j] == $count)
	      echo "<td class='green'><center>" . " ". "</center></td>";
	  else
	      echo "<td class='red'><center>" . " " . "</center></td>";
      if($wed[$j] == $count)
	      echo "<td class='green'><center>" . " ". "</center></td>";
	  else
	      echo "<td class='red'><center>" . " " . "</center></td>";
      if($thu[$j] == $count)
	      echo "<td class='green'><center>" . " ". "</center></td>";
	  else
	      echo "<td class='red'><center>" . " " . "</center></td>";
      if($fri[$j] == $count)
	      echo "<td class='green'><center>" . " ". "</center></td>";
	  else
	      echo "<td class='red'><center>" . " " . "</center></td>";
      if($sat[$j] == $count)
	      echo "<td class='green'><center>" . " ". "</center></td>";
	  else
	      echo "<td class='red'><center>" . " " . "</center></td>";
	  echo "</tr>";
	}
?>
</body>
</html>
