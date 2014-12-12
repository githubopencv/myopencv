<!-- Savpreet Singh
	 CSCI 430 - Change Password Page
	 Fall 2014
-->

<?php

session_start();

$form_token = md5(uniqid('auth', true));

$_SESSION['form_token'] = $form_token;

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
	<center><h4>Please enter in your account details:</h4></center>
	
	<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Password Change</legend>
		<br>
		<form action="new_password.php" method="POST"> 
			Please enter your current password:
			<br>
			<br>
			<label for="pass">Current Password: </label>
			<input type="text" name="current_password" value="" maxlength="20"><br>
			<br>
			<br>
			<label for="pass">New Password: </label>
			<input type="password" name="new_password" value="" maxlength="20"><br>
			<br>
			<br>
			<label for="pass">Re-Enter New Password: </label>
			<input type="password" name="re_new_password" value="" maxlength="20"><br>
			<br>
			<input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
			<input id="button" type="submit" name="submit" value="Change Password">
		</form>
		</fieldset>
		</div>
	</center>
</body>
</html>
