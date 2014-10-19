
<?php
  /*
  This script will drop all databases and tables created by createDB.php
  Don't run this unless you're REALLY certain you want to.
  Also, don't make this script usable via Apache; 
  anyone could type <our website>.com/nukeDB.php into firefox,
  and brick our project. Only run from cmd with "php nukeDB.php"
  */

	echo "Nuking databases from orbit...<br>";

	$con = new mysqli('127.0.0.1', 'root'); 
	mysqli_query($con, 'use mysql;'); 
	
	mysqli_query($con, 'drop database loginDB');
	echo "dropped loginDB<br>";

	mysqli_query($con, 'drop database groupMembersDB;');
	echo "dropped groupMembersDB<br>";

	mysqli_query($con, 'drop database filesDB;');
  echo "dropped filesDB<br>";

	mysqli_query($con, 'drop database eventsDB;');
	echo "dropped eventsDB<br>";
  
	mysqli_query($con, 'drop database calendarDB;');
	echo "dropped calendarDB<br>";

	echo "Databases nuked<br>";

?>

