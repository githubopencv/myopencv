<!--JAmes Villanueva
CSCI 430 - Login Page
Fall 2014
-->
<?php
session_start();

?>

<html>
<head>
<title> Join A Group </title>
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
	echo '<form action="adduser.php" target="_self" action="post" class="login_form">
			<center>If you need to register, please click here:
			<br>
			<br>
			<input class="button" type="submit" name="submit" value="Register">
			</center>   
			<label><br>
			<br>
			<a href="index.php">Return Home</a>
			<br></label></center>			
	</form>';
}
?>

<?php
if(isset($_POST['submit2']))
{
	$groupname = $_SESSION['groupname'];
    $password = sha1($_POST['password']);
	$connection = new mysqli('localhost','root','','user_login');
	$result = mysqli_query($connection,"SELECT * FROM groups where groupname = '$groupname';");
	$username = $_SESSION['user_name'];
	$schedule = $groupname.'calendar';
	$row = mysqli_fetch_array($result);
	$temp = $row['password'];
	if($password == $temp)
	{
		mysqli_query($connection,"INSERT INTO groups (username,groupname,password) VALUES ('$username','$groupname','$password')");
		$result = mysqli_query($connection,"SELECT * FROM calendar where username = '$username';");
  
	
		while($row = mysqli_fetch_array($result))
		{
			$day = $row['day'];
			$time = $row['time'];
			$username = $row['username'];
			mysqli_query($connection,"INSERT INTO $schedule (day,time,username) VALUES ('$day','$time','$username')");
		}
	
		echo '<center>
			<br>
			<br>
			<font size=4px style="Helvetica Neue", Helvetica, Arial, sans-serif;
			color= #3300FF;
			text-shadow= 1px 1px 1px #FFF;> Group joined, you will be returned to the homepage in 5 seconds. </font>
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
		
	    echo "$password";
		echo "<br>";
		echo "$temp";
		echo "Incorrect password:";
		echo "<br>";

	}


}
else
{

		$_SESSION['groupname'] = $_POST['groupname'];

	echo "<br>";
	echo "<br>";
	echo "<form action='join_group_submit.php' method='POST' class='login_form'>";
	echo "<br><center>";
	echo "<label>";
	echo "<label for='password'>Group Password:</label>";
	echo "<input type='password' name='password' value='' maxlength='20' placeholder='Please enter group password'>";
	echo "<br>";
	echo "<input class='button' type='submit' name='submit2' value='Join Group'>";
	echo "<label><br>";
	echo "<br>";
    echo "<a href='index.php'>Return Home</a>";
	echo "<br></label></center>";
	echo "</form>";
}

?>

</form>
</body>
</html>
