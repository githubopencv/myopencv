<!--Savpreet Singh
CSCI 430 - Login Page
Fall 2014
-->
<?php
session_start();
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
$message = 'Login Failed!';
}
else
{
$_SESSION['user_id'] = $user_id;
$logged_in = true;
$message = 'You are now logged in';
}
}
catch (Exception $excep)
{
/* Some error, couldn't log in */
$message = 'Unable to log in, please contact admin.';
}
}
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
<center><h4>User Log In</h4></center>
<center>
<body id="body_color">
<p><?php echo $message; ?>
<?php
if(isset($logged_in)){
echo "<form action='log_out.php' target='_self' action='post'>";
echo "<input id='button' type='submit' name='submit' value='Log Out'>";
echo "</form>";
echo "<br>";
echo "<form action='change_password.php' target='_self' action='post'>";
echo "<input id='button' type='submit' name='submit' value='Change Password'>";
echo "</form>";
}
?>
</center>
</body>
</html>