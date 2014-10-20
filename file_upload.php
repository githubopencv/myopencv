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
  
  if (!$connection) //print error and quit if no connection
  {
    echo('<p> Unable to connect to database. </p>');
	  exit();
  }
  else //if ( isset($_POST['uploadFile']) && $_FILES['uploadFile']['size'] > 0)
  {
    
    //ensure date and time are configured correctly
    date_default_timezone_set('America/Los_Angeles');
    
    $tmpName = $_FILES['uploadFile']['tmpname'];
    $f = fopen($tmpName, 'r') or die ("cannot open file");
    $fileContent = fread($f, filesize($tmpName)) or die ("cannot read file");
    $fileContent = addslashes($fileContent) or die ("cannot sanitize content"); //escape special chars in file if present
    $fileName = addslashes($_FILES['uploadFile']['name']) or die ("cannot sanitize file name <br>"); //escape special chars in file name if present
    fclose($f);
    
    print_r($_FILES);
    
    echo "<br>". $_FILES['uploadFile']['name'] . "<br>";
    
    //checks should be run to ensure these are valid names,
    //and that this isn't a duplicate database entry
    $username = "defaultUser";
    $groupname = "defaultGroup";
    $postDateTime = date('Y-m-d H:i:s'); //mysql's date format 
    //$fileName = $_FILE['uploadFile']['name'];
    //$file = $_FILE['uploadFile'];
    
    echo"Uploading " . $fileName . "<br>";
    
    $result = mysqli_query($connection, "INSERT INTO db.files (username, groupname, filename, postDateTime, file) values ('$username', '$groupname', '$filename', '$postDateTime', '$fileContent' );");
  
    //print upload errors
    if (!$result)
    {
      $err = mysqli_error($connection);
      echo($err);
    }  
    
    //show uploaded files for debug
    $result = mysqli_query($connection,'SELECT * FROM files');
    
    while($row = mysqli_fetch_array($result))
    {
        echo('<p>' . $row['username'] . ' ' . $row['groupname'] . ' ' . $row['postDateTime'] . ' ' . $row['filename'] . '</p>');
    }
  }

?>

<a href="http://localhost/grouphomepage.html">Go to Group Home page</a>
</center>
</body>
</html>
