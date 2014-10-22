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
<h2>Welcome!</h2>
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
  $groupname = $_POST['groupname'];
  
  //sanitize input; a single quote in input breaks everything
  if ($Username !== '' and $groupname !== '')
  {
    $Username = addslashes($Username);
    $groupname = addslashes($groupname);
  }
  else
  {
    echo ('<p> Invalid Admin User or Group Name </p>');
    exit();
  }
      
  $result = mysqli_query($connection,"INSERT INTO db.groupMembers (username, groupname, admin) VALUES ('$Username', '$groupname', '1');");
  
  //print errors
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err);
  }
    
  $result = mysqli_query($connection,'SELECT DISTINCT * FROM groupMembers');
  
  while($row = mysqli_fetch_array($result))
  {
      echo('<p>' . $row['username'] . ' ' . $row['groupname'] . ' ' . $row['admin'] . '</p>');
  }

  mysqli_close($connection);
?>
  <a href="http://localhost/grouphomepage.html">Go to Group Home page</a>

</center>
</body>
</html>
