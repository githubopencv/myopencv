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
	
	<center>
		<body id="body_color">
		<br>
		<form action="send_new_password.php" method="POST" class="login_form">
			If you have forgotten your password, it can be reset!
			<br>
			<br>
			<label for="pass">Please enter your account email:</label>
			<input type="text" name="email" value="" maxlength="80" placeholder="Please enter your email address"><br>
			<br>
			<input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
			<input id="button" type="submit" name="submit" value="Send Password">
		</form>
	</center>
</body>
</html>
	
