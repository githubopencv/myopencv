<!-- Savpreet Singh
	 CSCI 430 - Change Password DB
	 Fall 2014
-->

<?php

session_start();

/* Is user logged in? */
if(!isset($_SESSION['user_id']))
{
	$message = 'You must be logged in to access this page!';
}
/* Check to see if all required info was sent */
if(!isset($_POST['current_password'], $_POST['new_password'], $_POST['re_new_password']))
{
	$message = 'Please enter in all required info.';
}
/* Check for valid form token */
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}
/* Check if new entered passwords are the same, and valid format */
elseif (strlen( $_POST['new_password']) > 20 || strlen($_POST['new_password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
elseif ( $_POST['new_password'] != $_POST['re_new_password'])
{
    $message = 'New password entries do not match. Re-enter.';
}
else
{
	/* Make sure current password is the same as DB */
	$db_username = 'root';
	$db_password = '';
	$db_info = 'mysql:dbname=user_login;host=127.0.0.1';
	
	$cur_pass = sha1($_POST['current_password']);
	
	try
	{
		$dbhandle = new PDO($db_info, $db_username, $db_password);
		$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
		$query = $dbhandle->prepare("SELECT password FROM usernametable WHERE usernameid = :usernameid");
		$query->bindParam(':usernameid', $_SESSION['user_id'], PDO::PARAM_INT);
		//$query->bindParam(':password', $cur_pass, PDO::PARAM_STR, 40);
		$query->execute();
		$old_password = $query->fetchColumn();
		
		if($old_password == false)
		{
			$message = 'Access Error! Contact admin.';
		}
		else
		{
			$password = filter_var($_POST['new_password'], FILTER_SANITIZE_STRING);
			$password = sha1($_POST['new_password']);
			
			$query = $dbhandle->prepare("UPDATE usernametable SET password = :password WHERE usernameid = :usernameid");
			$query->bindParam(':usernameid', $_SESSION['user_id'], PDO::PARAM_INT);
			$query->bindParam(':password', $password, PDO::PARAM_STR, 40);
			$query->execute();
			
			$message = 'Password changed.';
		}
	}
	catch(Exception $excep)
	{
		//$message = 'Please contact an admin.';
		$message = $excep->getMessage();
	}
}
?>

<html>
<head>
	<title> Change Password </title>
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
	<center><h4>Password Change</h4></center>
	
	<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Password Change</legend>
		<br>
		<p><?php echo $message; ?>
		</fieldset>
		</div>
	</center>
</body>
</html>
