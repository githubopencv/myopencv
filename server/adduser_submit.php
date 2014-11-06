<!-- Savpreet Singh
     CSCI 430 - Register Page
	 Fall 2014
	 Used PHP Tutorial for Creation
-->

<?php

	session_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	/* Encrypt Password */
	$password = sha1($password);

	$connection = new mysqli('db.ecst.csuchico.edu','jvillanueva','H5msvMGK','jvillanueva','5551');

	$message = ('-');
	$count = 0;
	/* Check that username, password, and form token are sent */
	if(!isset( $_POST['username'], $_POST['password'], $_POST['form_token'], $_POST['email']))
	{
	    $message = ('<p> Please enter a valid username, password, and email </p>');
		$count = 1;
	}
	/* Check for a valid email address */
	elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
	{
		$message = ('<p> This email address is invalid.</p>');
		$count = 1;
	}
	/* Check for valid form token */
	elseif( $_POST['form_token'] != $_SESSION['form_token'])
	{	
		$message = ('<p>Invalid form submission</p>');
		$count = 1;
	}
	/* Check to see if username and password are under 20 character */
	elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
	{
		$message = ('<p>Incorrect Length for Username</p>');
		$count = 1;
	}
	elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
	{
		$message = ('<p>Incorrect Length for Password</p>');
		$count = 1;
	}

	mysqli_query($connection,"INSERT INTO UserNameTable (Username,pass,email) VALUES ('$username','$password','$email');")

	//unset($_SESSION['form_token']);

?>



<html>
<head>
	<title> User Registration </title>
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
	<center><h4>User Registration:</h4></center>
	
	<center>
		<body id="body_color">
		<p><?php echo $message; ?>
	</center>
  </body>
</html>