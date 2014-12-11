<!-- Savpreet Singh
CSCI 430 - Log Out Page
Fall 2014
This page will be displayed when user logs out.
-->
<?php
session_start();
session_destroy();
setcookie (session_name(), '', time()-300);
?>
<html>
	<head>
	<title> Log Out </title>
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
<!--<h2>Thanks for Visiting the Group Management Project!</h2>-->
</header>
<center>
<body id="body_color">
<!--<p>You have successfully logged out</p>-->
<META HTTP-EQUIV="refresh" CONTENT="0;URL=index.php">
</center>
</body>
</html>
