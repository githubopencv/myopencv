<!-- Savpreet Singh
   CSCI 430 - Register Page
   Fall 2014
-->

<?php

session_start();

$form_token = md5(uniqid('auth', true));

$_SESSION['form_token'] = $form_token;

?>

<html>
<head>
	<title> Registration </title>
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
	<center><h4>Please register to manage group work:</h4></center>
	
	<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Register</legend>
		<br>
		<form action="adduser_submit.php" method="POST"> <!-- User Login/Pass input + submit button -->
			Please enter a username between 4-20 characters:
			<br>
			<br>
			<label for="username">Username: </label>
			<input type="text" name="username" value="" maxlength="20"><br>
			<br>
			Please enter a password between 4-20 characters:
			<br>
			<br>
			<label for="pass">Password: </label>
			<input type="password" name="password" value="" maxlength="20"><br>
			<br>
			Please enter a valid email address:
			<br>
			<br>
			<label for="pass">Email: </label>
			<input type="text" name="email" value="" maxlength="80"><br>
			<br>
			<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
			<input id="button" type="submit" name="submit" value="Register">
		</form>
		</fieldset>
		</div>
	</center>
</body>
</html>
	
	
	
	
	
