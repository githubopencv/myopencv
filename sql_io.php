<!DOCTYPE html>
<html>
<body>

<?php
//function connect() 
//{
	echo "test commenced<br>";

	$con = new mysqli('127.0.0.1', 'root', 'mysql', 'employees');  

	$str = mysqli_query($con, 'SELECT * FROM departments');

	while ($row = mysqli_fetch_array($result) )
	{
	echo( '<p>' . $row['JokeText'] . ' ' . $row['JokeDate'] . '</p>');
	}
/*
	if(!$con) //mysqli_connect_errno() )
	{
		echo "ERR: could not connect to MySQL: " . mysqli_connect_error() . "<br>";
	}
	else
	{
		echo "Connection Established $con<br>";
	}
*/
	echo "test completed<br>";

//	return $con;
//}

//echo "sql connection test <br>";
//connect();

//$result = mysqli_query

?>

</body>
</html>
