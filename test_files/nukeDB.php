
<?php
  /*
  This script will drop all databases and tables created by createDB.php
  Don't run this unless you're REALLY certain you want to.
  Also, don't make this script usable via Apache; 
  anyone could type <our website>.com/nukeDB.php into firefox,
  and brick our project. Only run from cmd with "php nukeDB.php"
  */
	$db = "jvillanueva";
	echo "Dropping tables\n";

	$con = new mysqli("db.ecst.csuchico.edu", "jvillanueva", "H5msvMGK", "jvillanueva", "5551"); //using db, not $db, on purpose 
	mysqli_query($con, "use $db;"); 
	
	mysqli_query($con, "drop table $db.login");
	echo "dropped table login\n";

	mysqli_query($con, "drop table $db.groupMembers;");
	echo "dropped table groupMembers\n";

	mysqli_query($con, "drop table $db.files;");
  echo "dropped table files\n";

	mysqli_query($con, "drop database $db.events;");
	echo "dropped table events\n";
  
	mysqli_query($con, "drop database $db.calendar;");
	echo "dropped table calendar\n";

	// mysqli_query($con, "drop database $db;");
 	//echo "dropped database $db\n";

	echo "Dropped tables\n";

?>

