<!DOCTYPE html>
<html>
<body>
<?php
	echo "test commenced<br>";

	$con = new mysqli('127.0.0.1', 'root');  
	
	mysqli_query($con, 'create database loginDB;');
	mysqli_query($con, 'create table loginDB.login (user varchar(255), pw varchar(255), loggedIn boolean, loginIP varchar(255) in loginDB;');
	mysqli_query($con, 'use loginDB;');
	echo "created loginDB<br>";

	mysqli_query($con, 'create database groupMembersDB;');
	mysqli_query($con, 'create table groupMembersDB.group1 (user varchar(255), admin boolean);');
  echo "created groupMembersDB<br>";

	mysqli_query($con, 'create database filesDB;');
	mysqli_query($con, 'create table filesDB.group1 (user varchar(255), post_time time, post_date date, file mediumblob) in filesDB;');
  echo "created filesDB<br>";

	mysqli_query($con, 'create database eventsDB;');
	mysqli_query($con, 'create table eventsDB.group1 (user varchar(255), eventname varchar(255), description text, timeStart time, timeStop time, dateStart date, dateStop date, recurrence set) in eventsDB;');
  echo "created eventsDB<br>";
  
	mysqli_query($con, 'create database calendarDB;');
	mysqli_query($con, 'create table calendarDB.root (eventName varchar(255), groupName varchar(255), description text, timeStart time, timeStop time, dateStart date, dateStop date, recurrence set) in calendar DB;');
  echo "created calendarDB<br>";

  //mysqli_query($con, 'insert into login (user, pw, loggedIn, loginIP) in loginDB values ('root', 'toor', 'true', '127.0.0.1'); ');
	//echo "loginDB insert query completed";
	
	$str = mysqli_query($con, 'SELECT * FROM group1 in groupMembersDB;');
  echo "loginDB select query completed<br>";

	while ($row = mysqli_fetch_array($result) )
	{ 
	echo( '<p>' . $row['user'] . ' ' . $row['logged_in'] . '</p>');
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
