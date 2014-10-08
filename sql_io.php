<!DOCTYPE html>
<html>
<body>

<?php
//function connect() 
//{
	echo "test commenced<br>";

	$con = mysqli_connect("localhost", "root", "mysql", "employees");  

	if( mysqli_connect_errno() )
	{
		echo "ERR: could not connect to MySQL: " . mysqli_connect_error() . "<br>";
	}
	else
	{
		echo "Connection Established $con<br>";
	}

	echo "test completed<br>";

	return $con;
//}

//echo "sql connection test <br>";
//connect();

//$result = mysqli_query

?>

</body>
</html>
