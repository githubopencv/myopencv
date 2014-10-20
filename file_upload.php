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

  //there should be a non-root user that oversees all file DB operations
  $connection = new mysqli('localhost','root','mysql','db');
  
  if(!$connection) //print error and quit if no connection
  {
    echo('<p> Unable to connect to database. </p>');
	  exit();
  }
  else //else proceed with upload
  {
    //ensure date and time are configured correctly
    date_default_timezone_set('America/Los_Angeles');
    
    //checks should be run to ensure these are valid names,
    //and that this isn't a duplicate database entry
    $username = "defaultUser";
    $groupname = "defaultGroup";
    $postDateTime = date('Y-m-d H:i:s'); //mysql's date format 
    $fileName = $_FILE['uploadFile']['name'];
    $file = $_FILE['uploadFile'];
    
    $result = mysqli_query($connection, "INSERT INTO db.files (username, groupname, filename, postDateTime, file) values ('$username', '$groupname', '$filename', '$postDateTime', '$file', );");
    
  }

?>

<a href="http://localhost/grouphomepage.html">Go to Group Home page</a>
</center>
</body>
</html>
