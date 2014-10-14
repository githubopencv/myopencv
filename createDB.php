<!DOCTYPE html>
<html>
<body>

<?php
//function connect() 
//{
	echo "test commenced<br>";

	$con = new mysqli('127.0.0.1', 'root', 'mysql', 'employees');  
	
	mysqli_query($con, 'create database loginDB;');
	mysqli_query($con, 'create table login (user varchar(255), pw varchar(255), logged_in boolean, login_IP varchar(255) in loginDB;');

	mysqli_query($con, 'create database groupMembersDB;');
	mysqli_query($con, 'create table group1 (user varchar(255), admin boolean) in group_members_db) in groupMembersDB;');

	mysqli_query($con, 'create database filesDB;');
	mysqli_query($con, 'create table group1 (user varchar(255), post_time time, post_date date, file mediumblob) in filesDB;');

	mysqli_query($con, 'create database eventsDB;');
	mysqli_query($con, 'create table group1 (user varchar(255), eventname varchar(255), description text, timeStart time, timeStop time, dateStart date, dateStop date, recurrence set) in eventsDB;');
  
	mysqli_query($con, 'create database calendarDB;');
	mysqli_query($con, 'create table someuser (eventName varchar(255), groupName varchar(255), description text, timeStart time, timeStop time, dateStart date, dateStop date, recurrence set) in calendar DB;');

//	$str = mysqli_query($con, 'SELECT * FROM departments');

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
