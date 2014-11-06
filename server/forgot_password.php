<!-- Savpreet Singh
     CSCI 430 - Password Recovery Page
	 Fall 2014
-->

<?php

session_start();

$form_token = md5(uniqid('auth', true));

$_SESSION['form_token'] = $form_token;

?>

<html>
<head>
	<title> Password Recovery </title>
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
	<center><h4>Please enter in your account email:</h4></center>
	
	<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Password Recovery</legend>
		<br>
		<form action="send_new_password.php" method="POST"> 
			Please enter a valid email address:
			<br>
			<br>
			<label for="pass">Email: </label>
			<input type="text" name="email" value="" maxlength="80"><br>
			<br>
			<input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
			<input id="button" type="submit" name="submit" value="Send Password">
		</form>
		</fieldset>
		</div>
	</center>
</body>
</html>
	
