<<<<<<< HEAD
<!--Savpreet Singh-->
<!--CSCI 430 - Group Scheduler/Manager Project-->
<!--Intro Page-->


<!DOCTYPE html>
<html>
<head>
	<title> Log In Page </title>
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
	
	<header>
	<h2>Welcome to the Group Management Project!</h2>
	</header>
	<center><h4>Please login to manage your group(s):</h4></center>
	
	<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Sign In Here</legend>
		<form action="user_login.php" method="POST"> <!-- User Login/Pass input + submit button -->
			<br>
			Username: <input type="text" name="username" value="" maxlength="20"><br>
			<br>
			Password: <input type="password" name="password" value="" maxlength="20"><br>
			<br>
			<input id="button" type="submit" name="submit" value="Sign In">
		</form>
		<br>
		<a href="forgot_password.php"> Forgot Password? </a>
		<br>
		</fieldset>
		</div>
	</center>
	
	<center>
		<h4>If you need to register, please click here:</h4>
		<form action="adduser.php" target="_self" action="post">
		<input id="button" type="submit" name="submit" value="Register">
		</form>		
	</center>
	
=======
<!--Savpreet Singh
CSCI 430 - Login Page
Fall 2014
-->
<?php
session_start();
?>
<html>
<head>
<title> User Log In </title>
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
<header>
<h2>Welcome to the Group Management Project!</h2>
</header>
<?php
$message=' ';
if(isset($_POST['submit']))
{
/* Check if user is already logged in */
if(isset($_SESSION['user_id']))
{
	$message = 'User is already logged in!';
}
/* Check that both username and password are entered */
if(!isset( $_POST['username'], $_POST['password']))
{
	$message = 'Please enter a valid username and password!';
}
/* Check if username and password are 20 characters or less */
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
{
	$message = 'Incorrect Length for Username';
}
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
	$message = 'Incorrect Length for Password';
}
else
{
	/* Insert username and password to database to log in */
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	/* Encrypt password */
	$password = sha1($password);
	$db_username = 'root';
	$db_password = 'Munchy1*';
	$db_info = 'mysql:host=localhost;dbname=group_management';
	try
	{
		$dbhandle = new PDO($db_info, $db_username, $db_password);
		$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$insert_user = $dbhandle->prepare("SELECT ID, username, password FROM usernametable WHERE username = :username AND password = :password");
		/* Bind parameters */
		$insert_user->bindParam(':username', $username, PDO::PARAM_STR);
		$insert_user->bindParam(':password', $password, PDO::PARAM_STR, 40);
		$insert_user->execute();
		/* Check to see if user exists */
		$user_id = $insert_user->fetchColumn();
		if($user_id == false)
		{
			$message = 'Login Failed!';
		}
		else
		{
			$_SESSION['user_id'] = $user_id;
			$_SESSION['logged_in'] = true;
			$message = 'You are now logged in';
		}
	}
	catch (Exception $excep)
	{
		/* Some error, couldn't log in */
		$message = 'Unable to log in, please contact admin.';
	}
}
}
?>

<center>
<body id="body_color">
<p><?php echo $message; ?>
<?php
if(isset($_SESSION['logged_in']))
{
echo "<form action='log_out.php' target='_self' action='post'>";
echo "<input id='button' type='submit' name='submit' value='Log Out'>";
echo "</form>";
echo "<br>";
echo "<form action='change_password.php' target='_self' action='post'>";
echo "<input id='button' type='submit' name='submit' value='Change Password'>";
echo "</form>";
}
else
{
echo "<form action='index.php' method='POST'>";
echo "<br>";
echo "Username: <input type='text' name='username' value='' maxlength='20'><br>";
echo "<br>";
echo "Password: <input type='password' name='password' value='' maxlength='20'><br>";
echo "<br>";
echo "<input id='button' type='submit' name='submit' value='Sign In'>";
echo "</form>";
echo "<br>";
echo "<a href='forgot_password.php'> Forgot Password? </a>";
echo "<br>";
echo "</fieldset>";
echo "</div>";
echo "</center>";
echo "<center>";
echo "<h4>If you need to register, please click here:</h4>";
echo "<form action='adduser.php' target='_self' action='post'>";
echo "<input id='button' type='submit' name='submit' value='Register'>";
echo "</form>";	
echo "</center>";
}
?>
</center>
>>>>>>> ff791e48f951acbc7c38b78f3e62e8a94b750eb6
</body>
</html>
