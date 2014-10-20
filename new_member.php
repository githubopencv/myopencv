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

  $connection = new mysqli('localhost','root','mysql','db');
  if(!$connection)
  {
      echo('<p> Unable to connect. </p>');
	  exit();
  }
  
  $Username = $_POST['username'];
  $Password = $_POST['password'];
  $Email = $_POST['email'];
  $result = mysqli_query($connection,"INSERT INTO db.logins (username, password, email, loggedIn) VALUES ('$Username', '$Password', '$Email', '1')");
  
  //print errors
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err);
  }
    
  $result = mysqli_query($connection,'SELECT * FROM logins');
  
  while($row = mysqli_fetch_array($result))
  {
      echo('<p>' . $row['username'] . ' ' . $row['password'] . ' ' . $row['email'] . '</p>');
  }

  mysqli_close($connection);
?>
  <a href="http://localhost/grouphomepage.html">Go to Group Home page</a>
</center>
</body>
</html>
