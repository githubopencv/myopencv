<!--Scott Stewart
CSCI 430
Fall 2014--
>

<?php

session_start();

$form_token = md5(uniqid('auth', true));

$_SESSION['form_token'] = $form_token;

/*
if( isset( $_SESSION['user_id'];) )	
{	
$form_token = md5(uniqid('auth', true));
$username = $_SESSION['user_id'];
}
else
{
	session_destroy();
	header("Location: index.php"); //redirect to login page if not logged in
}
*/

?>

<html>
<head>
	<title> Group Home Page </title>
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
	<h2>Groups Home Page</h2>
	</header>
	<center><h4>Please Login or Create a Group: <?php echo " " . $username; ?> </h4></center>
<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Create a Group Here</legend>
		<form action="groupX.php" method="POST"> <!-- Group Creation/Pass input + submit button -->
			<br>
			Group Name: <input type="text" name="new_groupname" value=""><br>
			<br>
			Password: <input type="password" name="new_password" value=""><br>
			<br>
			<input id="button" type="submit" name="login" value="Create">
		</form>
		</fieldset>
		</div>
	</center>



	
</body>
</html>
