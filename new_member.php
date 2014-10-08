<!DOCTYPE html>
<html>
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
<h2>Welcome to the Group!</h2>
</header>
<center>
<?php

  $connection = new mysqli('localhost','root','Munchy1*','group_management');
  if(!$connection)
  {
      echo('<p> Unable to connect. </p>');
	  exit();
  }
  
  $Username = $_POST['username'];
  $Password = $_POST['password'];
  $Email = $_POST['email'];
  mysqli_query($connection,"INSERT INTO users SET Username = '$Username', Password = '$Password', Email = '$Email'");
  
  $result = mysqli_query($connection,'SELECT * FROM users');
  
  while($row = mysqli_fetch_array($result))
  {
      echo('<p>' . $row['Username'] . ' ' . $row['Password'] . ' ' . $row['Email'] . '</p>');
  }

?>
  <a href="http://localhost/grouphomepage.html">Go to Group Home page</a>
</center>
</body>
</html>
