<!--Savpreet Singh-->
<!--CSCI 430 - Group Scheduler/Manager Project-->
<!--Intro Page-->


<!DOCTYPE html>
<html>
<head>
	<title> Log In Page </title>
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
	<center><h4>Please login to manage your group(s):</h4></center>
	
	<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Sign In Here</legend>
		<form action="user_login.php" method="POST"> <!-- User Login/Pass input + submit button -->
			<br>
			Username: <input type="text" name="username" value="" maxlength="20"><br>
			<br>
			Password: <input type="password" name="password" value="" maxlength="20"><br>
			<br>
			<input id="button" type="submit" name="submit" value="Sign In">
		</form>
		<br>
		<a href="forgot_password.php"> Forgot Password? </a>
		<br>
		</fieldset>
		</div>
	</center>
	
	<center>
		<h4>If you need to register, please click here:</h4>
		<form action="adduser.php" target="_self" action="post">
		<input id="button" type="submit" name="submit" value="Register">
		</form>		
	</center>
	
</body>
</html>
