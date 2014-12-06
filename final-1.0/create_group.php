<!--JAmes Villanueva
CSCI 430 - Login Page
Fall 2014
-->
<?php
session_start();
?>

<html>
<head>
<title> Create Group </title>
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
<body id='body_color'>
<header>
<h2>Welcome to the Group Management Project!</h2>
</header>
<?php
if(!isset($_SESSION['logged_in']))
{
echo '
			<br>
			<br>
			<form action="adduser.php" target="_self" action="post" class="login_form">
			<center>If you need to register, please click here:
			<br>
			<br>
			<input class="button" type="submit" name="submit" value="Register">  
			<label><br>
			<br>
			<a href="index.php">Return Home</a>
			<br></label></center>			
	</form>';
}
else if(isset($_POST['submit']))
{
	/* Insert username and password to database to log in */
	$groupname = filter_var($_POST['groupname'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$username = $_SESSION['user_name'];
	/* Encrypt password */
	$password = sha1($password);
	$db_username = 'root';
	$db_password = '';
	$db_info = 'mysql:host=localhost;dbname=user_login';
	$schedule = $groupname.'calendar';

	try
	{
		$dbhandle = new PDO($db_info, $db_username, $db_password);
		$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$insert_user = $dbhandle->prepare("INSERT INTO groups (username,groupname,password) VALUES ('$username','$groupname','$password')");
		/* Bind parameters */
		$insert_user->bindParam(':groupname', $groupname, PDO::PARAM_STR);
		$insert_user->bindParam(':username', $username, PDO::PARAM_STR);
		$insert_user->bindParam(':password', $password, PDO::PARAM_STR, 40);
		$insert_user->execute();
	
		$message = 'Login Failed!';
	
	}
	catch (Exception $excep)
	{
		/* Some error, couldn't log in */
		$message = 'Unable to log in, please contact admin.';
	}
	$connection = new mysqli('localhost','root','','user_login');
	mysqli_query($connection,"create table $schedule (id int(11) not null auto_increment, day varchar(30) not null, time varchar(30) not null, username varchar(30) not null,primary key(id));");
	$result = mysqli_query($connection,"SELECT * FROM calendar where username = '$username';");
  
	
	while($row = mysqli_fetch_array($result))
	{
		$day = $row['day'];
		$time = $row['time'];
		$username = $row['username'];
		mysqli_query($connection,"INSERT INTO $schedule (day,time,username) VALUES ('$day','$time','$username')");
	}
	
	echo '<br>
			<br>
			<center>
			<font size=4px style="Helvetica Neue", Helvetica, Arial, sans-serif;
			color= #3300FF;
			text-shadow= 1px 1px 1px #FFF;> Group created, please return to the homepage </font>
			<br>
			<br>
			<br>
			<META HTTP-EQUIV="refresh" CONTENT="5;URL=index.php">
			<a href="index.php">Return Home</a>
			<br>
			</center>';
}
else
{
echo '	<br>
		<br>
		<form action="create_group.php" method="POST" class="login_form"> 
				<center><h1>Create Group
					<span><h2></h2>Create Your New Group</span>
				</h1></center>
				<center>
				<label>
					<label for="groupname">Group Name:</label>
					<input type="text" name="groupname" value="" maxlength="20" placeholder="Please enter your username">
				</label>
				<label>
					<label for="password">Password:</label>
					<input type="password" name="password" value="" maxlength="20" placeholder="Please enter your password">
				</label>
				<label>                
					<input class="button" type="submit" name="submit" value="Create Group">
					<br>
					<br>
				</label>
				<br>
				<a href="index.php">Return Home</a>
				<br>				
				</center>
			</form>	';
}

?>
</body>



</html>
