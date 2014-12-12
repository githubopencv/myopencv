<!-- Savpreet Singh
	 CSCI 430 - Change Password Page
	 Fall 2014
-->

<?php

session_start();

$form_token = md5(uniqid('auth', true));


?>

<html>
<head>
	<title> Change Password </title>
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
		<form action="new_password.php" method="POST" class="login_form"> 
            <center><h1>Change Password
                <span><h2></h2>Please enter in your account details</span>
                <br>
            </h1></center>
			<label for="pass">Current Password: </label>
			<input type="password" name="current_password" value="" maxlength="20" placeholder="Please enter your current password"><br>
			<br>
			<br>
			<label for="pass">New Password: </label>
			<input type="password" name="new_password" value="" maxlength="20" placeholder="Please enter your new password"><br>
			<br>
			<br>
			<label for="pass">Re-Enter New Password: </label>
			<input type="password" name="re_new_password" value="" maxlength="20" placeholder="Please re-enter your new password"><br>
			<br>
			<input type="hidden" name="form_token" value="<?php echo $form_token; ?>">
			<input class="button" type="submit" name="submit" value="Change Password">
			<label><br>
			<br>
			<a href='index.php'>Return Home</a>
			<br></label></center>
		</form>
	</center>
</body>
</html>
