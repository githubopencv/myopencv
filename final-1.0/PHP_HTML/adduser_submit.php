<!-- Savpreet Singh
     CSCI 430 - Register Page
	 Fall 2014
	 Used PHP Tutorial for Creation
-->

<?php

session_start();

/* Check that username, password, and form token are sent */
if(!isset( $_POST['username'], $_POST['password'], $_POST['form_token'], $_POST['email']))
{
    $message = 'Please enter a valid username, password, and email';
}
/* Check for a valid email address */
elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $message = 'This email address is invalid.';
}
/* Check for valid form token */
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}

/* Check to see if username and password are under 20 character */
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
else /* Insert username and password to database */
{
	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	
	/* Encrypt Password */
	$password = sha1($password);
	
	$db_username = 'root';
	$db_password = '';
	$db_info = 'mysql:dbname=user_login;host=127.0.0.1';
	
	try 
	{
		
		$dbhandle = new PDO($db_info, $db_username, $db_password);
		$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		/* Insert username and password into database */
		$insert_user = $dbhandle->prepare("INSERT INTO UserNameTable (username, password, email ) VALUES (:username, :password, :email)");

		/* Bind parameters */
		$insert_user->bindParam(':username', $username, PDO::PARAM_STR);
        $insert_user->bindParam(':password', $password, PDO::PARAM_STR, 40);
		$insert_user->bindParam(':email', $email, PDO::PARAM_STR);

		$insert_user->execute();
		unset($_SESSION['form_token']);
		$message = 'New User Added!';
	}
	catch (PDOException $e) 
	{
		//$message = $e->getMessage(); // To print out error messages
		$message = 'Email already exists!';
	}	
	catch(Exception $excep)
	{
		/* Check if username exists */
		if($excep->getCode() == 2300)
		{
			$message = 'Username already exists!';
		}
		else /* Other issues */
		{
			$message = 'Unable to add user, contact admin.';
			//$message = $excep->getMessage(); // To print out error messages
		}
	}
}
?>
		
<html>
<head>
	<title> User Registration </title>
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
	<h2>Welcome to the Group Management Project!</h2>
	</header>
	<center><h4>User Registration:</h4></center>
	
	<center>
		<body id="body_color">
		<p><?php echo $message; ?>
		<p><a href='http://localhost/adduser.php?submit=Register'>Return</a></p>
	</center>
</body>
</html>
		
		
		
		
		
		
		
		
		
		
		