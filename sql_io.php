<!DOCTYPE html>
<html>
<body>


<?php
/*
function sqlconnect($sqld, $user, $pw, $db_name)
{
	$con = mysqli_connect($sqld, $user, $pw, $db_name);

	if( mysqli_connect_errno() )
		echo "<p>Failed to connect to MySQL: </p>" . mysqli_connect_error();
	else
		echo "<p>connection established: </p>" . $con

	return $con;
} //end sqlconnect

function sqlclose($con)
{
	mysqli_close($con);

}
*/
echo "<p>attempting connection </p>";
//sqlconnect(127.0.0.1, root, "mysql", "test");

function hi($name)
{
	$s "<p>hi $name</p>";
	return $s;
}

//$t =  hi("dude");

echo "<p>test " . hi("dude") . "</p>";
?>

</body>
</html>

