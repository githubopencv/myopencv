<!-- Savpreet Singh
     CSCI 430 - Fall 2014
	 
	 
	 **** This is to be added to each page to make sure user is still logged in ****
-->

<?php

session_start();

if(!isset($_SESSION['user_id']))
{
	$message = 'You must be logged in to access this page!';
}
else
{
	$db_username = 'root';
	$db_password = '';
	$db_info = 'mysql:dbname=user_login;host=127.0.0.1';
	
	try
	{
		
		$dbhandle = new PDO($db_info, $db_username, $db_password);
		$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$insert_user = $dbhandle->prepare("SELECT username FROM usernametable
        WHERE usernameid = :usernameid");

		$insert_user->bindParam(':usernameid', $_SESSION['user_id'], PDO::PARAM_INT);

		$insert_user->execute();
		
		$username_check = $insert_user->fetchColumn();
		
		if($username_check == false)
		{
			$message = 'Access Error!';
		}
		else
		{
			$message = 'Welcome '.$username_check;
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
	<title> Member Access </title>
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
	<center><h4>Member Access</h4></center>
	
	<center>
		<body id="body_color">
		<p><?php echo $message; ?>
	</center>
</body>
</html>
