<!--JAmes Villanueva
Savpreet Singh
CSCI 430 - Login Page
Fall 2014
-->
<?php
session_start();
?>

<html>
<head>
<title> Join A Group </title>
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
<body id='body_color'>
<header>
	<h2>Welcome to the Group Management Project!</h2>
</header>
<center>
<br>
<br>
<form action='join_group_submit.php' method='POST' class='login_form'>
<?php

	$connection = new mysqli('localhost','root','','user_login');
    $result = mysqli_query($connection,"SELECT * FROM groups");
	echo "Choose a Group to Join:";

	while($row = mysqli_fetch_array($result))
	{
		$name = $row['groupname'];
		echo "<br>";
		echo "<br>";
		echo "<input type='checkbox' name='groupname' value='$name'>$name";
		echo "<br>";
		echo "<br>";
		
    }
?>
<input class='button' type='submit' value='Join Group'>
<br>
<br>
<a href='index.php'>Return Home</a>
<br></label></center>
</form>
</center>
</body>
</html>
