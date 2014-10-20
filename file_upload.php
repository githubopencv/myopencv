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
<h2>File Upload</h2>
</header>
<center>
<?php

    $connection = new mysqli('localhost','root','mysql','fileDB');
  if(!$connection)
  {
    echo('<p> Unable to connect. </p>');
	  exit();
  }
  
  $fileName$_POST['file'];
  
  $result = mysqli_query($connection, "INSERT INTO group1 (username , post_time, post_date, file) values ();");
  

?>

<a href="http://localhost/grouphomepage.html">Go to Group Home page</a>
</center>
</body>
</html>
