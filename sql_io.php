<?php



function sqlconnect($sqld, $user, $pw, $db_name)
{
	$con = mysqli_connect($sqld, $user, $pw, $db_name);

	if( mysqli_connect_errno() )
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	return $con;
} //end sqlconnect

function sqlclose($con)
{
	mysqli_close($con);

}


?>
