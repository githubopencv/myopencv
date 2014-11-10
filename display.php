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
<h2>Group Home</h2>
</header>
    <a href="http://localhost/cal.html">Add a member</a>
	<a href="http://localhost/files.html">Files</a>
	<a href="http://localhost/events.html">Events</a>
	<form action="index.php" method="post">
	Comment: <input type="text" name="comment"><br>
	<input type="submit" value="Submit">
	</form>
<?php

    phpinfo();

    $connection = new mysqli('db.ecst.csuchico.edu','jvillanueva','H5msvMGK','jvillanueva','5551');
    if(!$connection)
    {
        echo('<p> Unable to connect. </p>');
	    exit();
    }
	
	if (isset($_POST['comment'])) 
	{
	    $comment = $_POST['comment'];
  
        mysqli_query($connection,"INSERT INTO groups SET name = '$comment'"); 
	}
	
	$result = mysqli_query($connection,'SELECT * FROM groups ORDER BY ID DESC');

   
    while($row = mysqli_fetch_array($result))
    {
        echo('<p>' . $row['name'] .  '</p>');
    }
?>
</body>
</html>