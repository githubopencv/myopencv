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

session_start();

if(!isset($_SESSION['user_id']))
{
	$message = 'You must be logged in to access this page!';
  exit();
}
else
{
	$db_username = 'root';
	$db_password = '';
	$db_info = 'mysql:dbname=user_login;host=127.0.0.1';
	
	try
	{
		
		$dbhandle = new PDO($db_info, $db_username, $db_password);
		$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$insert_user = $dbhandle->prepare("SELECT username FROM usernametable
        WHERE usernameid = :usernameid");

		$insert_user->bindParam(':usernameid', $_SESSION['user_id'], PDO::PARAM_INT);

		$insert_user->execute();
		
		$username_check = $insert_user->fetchColumn();
		
		if($username_check == false)
		{
			$message = 'Access Error!';
		}
		else
		{
			$message = 'Welcome '.$username_check;
		}
	}
	catch(Exception $excep)
	{
		$message = 'Please contact an admin.';
		//$message = $excep->getMessage();
	}
}

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
  
  $result = mysqli_query($connection,'SELECT DISTINCT groupname FROM groupMembers');
  while($row = mysqli_fetch_array($result))
  {
      if ($row['groupname'] == $groupname)
      {
        echo('<p>' . 'Group with name ' . $row['groupname'] . ' already exists' '</p>');
        exit();
      }
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
      echo('<p>' . $row['username'] . '  ' . $row['groupname'] . '  ' . $row['admin'] . '</p>');
  }

  mysqli_close($connection);
?>
  <a href="http://localhost/grouphomepage.html">Go to Group Home page</a>

</center>
</body>
</html>
