<!--Savpreet Singh
CSCI 430 - Login Page
Fall 2014
-->
<?php
session_start();
?>
<html>
<title> GroupR </title>
		<link rel="stylesheet" type="text/css" href="login_style.css">
		</head>
		<style>
		
			body { 
				background-image: url('./background.png');
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-position: center; 
			}
        
			div {
				background-color: lightgrey;
				border: 2px solid lightgrey;
				border-radius: 15px;
				font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
				/*color: #888;*/
				color: #191975;
				width: 70%;
				padding: 10px;
				margin: auto;
			}
		</style>
    
		<div>
		<h1>Hello, World!</h1>

			<p> Welcome to GroupR, a group management project created by Team Android for CSCI 430 at CSU Chico. Use this website
			to organize your group schedule, files, and members.</p>
		</div>

		</style>

<body>
<?php
$message=' ';
if(isset($_POST['submit']))
{
    /* Check that both username and password are entered */
    if(!isset( $_POST['username'], $_POST['password']))
    {
        //$message = 'Please enter a valid username and password!';
		echo '<center>
			  <h3><font color="red"> Please enter a valid username and password! </font></h3>
			  </center>';
    }
    /* Check if username and password are 20 characters or less */
    elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
    {
        //$message = 'Incorrect Length for Username';
		echo '<center>
			  <h3><font color="red"> Incorrect Length for Username </font></h3>
			  </center>';
		
    }
    elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
    {
        //$message = 'Incorrect Length for Password';
		echo '<center>
			  <h3><font color="red"> Incorrect Length for Password </font></h3>
			  </center>';
    }
    else
    {
        /* Insert username and password to database to log in */
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        /* Hash password */
        $password = sha1($password);
        $db_username = 'root';
        $db_password = '';
        $db_info = 'mysql:dbname=user_login;host=127.0.0.1';
        try
        {
            $dbhandle = new PDO($db_info, $db_username, $db_password);
            $dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $insert_user = $dbhandle->prepare("SELECT usernameid, username, password FROM usernametable WHERE username = :username AND password = :password");
            /* Bind parameters */
            $insert_user->bindParam(':username', $username, PDO::PARAM_STR);
            $insert_user->bindParam(':password', $password, PDO::PARAM_STR, 40);
            $insert_user->execute();
            /* Check to see if user exists */
            $user_id = $insert_user->fetchColumn();
            if($user_id == false)
            {
				echo '<center>
					  <h3><font color="red"> Login Failed! Please Try Again. </font></h3>
					  </center>';
            }
            else
            {
                $_SESSION['user_name'] = $username;
                $_SESSION['logged_in'] = true;
            }
        }
        catch (Exception $excep)
        {
            /* Some error, couldn't log in */
            $message = 'Unable to log in, please contact admin.';
            /*$message = $excep->getMessage();*/
        }
    }
} 
?>
<body id="body_color">
<p><?php echo $message; ?>
<?php

/* Is user already logged in? */
if(isset($_SESSION['logged_in']))
{
	$connection = new mysqli('127.0.0.1','root','','user_login');
	$temp=$_SESSION['user_name'];
	$result = mysqli_query($connection,"SELECT * FROM groups WHERE username = '$temp';");
	echo "<ul class='nav'>";
	
	echo "<li><a href='http://localhost/join_group.php'>Join Group</a></li>";
	echo "<li><a href='http://localhost/create_group.php'>Create Group</a></li>";
	echo "<li><a href='http://localhost/cal.php'>Update Schedule</a></li>";
	echo "<li><a href='http://localhost/change_password.php'>Change Password</a></li>";
	echo "<li><a href='http://localhost/log_out.php'>Log Out</a></li>";
	
	echo "</ul>";
	
	echo "<div id='user'>";
		echo "<ins>";
		echo "Your Groups";
		echo "</ins>";
		echo "<br>";
		
		  while($row = mysqli_fetch_array($result))
		  {	
			  $name = $row['groupname'].'calendar';
			  echo "<br><br><b>";
			  echo $row['groupname'];
			  $group_name = $row['groupname'];
			  echo ":</b>";
			  echo "<br>";
			  echo "<br>";
			  echo "<form action='index.php' method='POST'>";
			  echo "<button class='linkbutton' type='submit' name='calendar' value='Calendar'>Calendar</button>";
			  echo "</form>";
			  echo "<a href='http://localhost/file_management.php' style='text-decoration:none'><font color='#069'>Files</font></a></li>";
			  echo "<br>";
			  echo "<br>";
			  echo "<form action='index.php' method='POST'>";
			  echo "<button class='linkbutton' type='submit' name='members' value='Members'>Members</button>";
			  echo "</form>";	  
		  }
		 echo "</div>";
}

/* Members list + their emails */
if (isset($_POST['members'])) // Get list of group members and emails
{
	$user_name = $_SESSION['user_name'];
    $connection = new mysqli('127.0.0.1','root','','user_login');
    if(!$connection)
    {
        echo('<p> Unable to connect. </p>');
	    exit();
    }
	$result = mysqli_query($connection,"SELECT * FROM groups WHERE username != '$user_name'");
	
	while($row = mysqli_fetch_array($result)) {
		$group_name = $row['groupname'];
	}
	
	$result = mysqli_query($connection,"SELECT * FROM groups WHERE groupname = '$group_name'");
	
	echo "<div class='center'>";	
	echo "<table id='customers'>";
	echo "<tr>";
	echo "<th>Member</th>";
	echo "<th>Email</th>";
	echo "</tr>";
	
	while($row = mysqli_fetch_array($result)) {
		$user_names = $row['username'];
		echo "<tr><td><center><font color='blue'>";
		echo $user_names;
		echo "</font></td></center>";
		$new_result = mysqli_query($connection, "SELECT * FROM usernametable WHERE UserName = '$user_names'");
		$row = mysqli_fetch_array($new_result);
		$user_email = $row['email'];
		echo "<td><center><font color='blue'>";
		echo $user_email;
		echo "</font></td></center></tr>";
	}	
	
	echo "</div>";
}

/* Group meeting schedule */
if(isset($_POST['calendar']))
{
	echo "<div class='center'>";
	$temp2=$_POST['calendar'];
	echo "<table id='customers'>";
	echo "<tr>";
	echo "<th>Times</th>";
	echo "<th>Sunday:</th>";
	echo "<th>Monday:</th>";
	echo "<th>Tuesday:</th>";
	echo "<th>Wednesday:</th>";
	echo "<th>Thursday:</th>";
	echo "<th>Friday:</th>";
	echo "<th>Saturday:</th>";
	echo "</tr>";
	$connection = new mysqli('127.0.0.1','root','','user_login');
    if(!$connection)
    {
        echo('<p> Unable to connect. </p>');
	    exit();
    }

	$result = mysqli_query($connection,"SELECT * FROM $temp2");
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
	echo "</table>";
	echo "</div>";
}

/* If user is not logged in, display login page */
if(!isset($_SESSION['logged_in']))
{  
   echo '
	   <body> 	
		<center>
		<body id="body_color">
		<form action="index.php" method="POST" class="login_form"> <!-- User Login/Pass input + submit button -->
				<center><h1>Login
					<span><h2></h2>Please login to manage your group</span>
				</h1></center>
				<label>
					<label for="username">Username:</label>
					<input type="text" name="username" value="" maxlength="20" placeholder="Please enter your username">
				</label>
				<label>
					<label for="password">Password:</label>
					<input type="password" name="password" value="" maxlength="20" placeholder="Please enter your password">
				</label>
				<label>                
					<input class="button" type="submit" name="submit" value="Sign In">
					<br>
					<br>
					<a href="forgot_password.php"> Forgot Password? </a>
					<br>
				</label>            
			</form>	
		</center>
		  
		
		<br>
		<form action="adduser.php" target="_self" action="post" class="login_form">
			<center>If you need to register, please click here:
			<br>
			<br>
			<input class="button" type="submit" name="submit" value="Register">
			</center>        
		</form>
		
		<br>
		<br>
		<center>
		<footer>
		<small> Copyright &copy; Fall 2014 : Team Android : CSCI 430 : CSU Chico </small>
		</footer>
		</center>';
    
}
?>
</body>
</html>