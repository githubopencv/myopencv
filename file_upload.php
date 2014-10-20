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

  //there should be a non-root user that oversees all fileDB operations
  $connection = new mysqli('localhost','root','mysql','fileDB');
  
  if(!$connection) //print error and quit if no connection
  {
    echo('<p> Unable to connect to database. </p>');
	  exit();
  }
  else //else proceed with upload
  {
    //ensure date and time are configured correctly
    date_default_timezone_set('America/Los_Angeles');
    
    $username = "default";
    $fileName = $_POST['file'];
    /*
    php uses linux epoch time, mysql does not. it is necessary to transform between them.
    
    transform date from php format to mysql format: 
    $mysqldate = date('Y-m-d H:i:s', $somedate); //$somedate arg optional
    
    transform date from mysql format to php format:
    $phpdate = strtotime( $mysqldate );
    */
    $postDateTime = date('Y-m-d H:i:s'); 
    
    $result = mysqli_query($connection, "INSERT INTO group1 (username , post_time, post_date, file) values ('$filename', '$postDateTime' );");
    
  }

?>

<a href="http://localhost/grouphomepage.html">Go to Group Home page</a>
</center>
</body>
</html>
