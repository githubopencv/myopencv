
<?php
  /*
  This is a backend script, so it doesn't output in HTML;
  It is intended to be used from cmd with the command "php createDB.php"
  It creates a common database format we can all use to stay on the same page,
  and avoid integration headaches later if everyone used their own database format.
  Push any changes to github if this setup doesn't do everything you need.
  That way, everyone stays on the same page; just remember to git pull & merge often. 
  */

	echo "Database setup commenced\n";

	$con = new mysqli('127.0.0.1', 'root');  
	mysqli_query($con, 'use mysql;');
	
	mysqli_query($con, 'create database loginDB;');
	mysqli_query($con, 'create table loginDB.logins (username varchar(255), password varchar(255), email text, loggedIn boolean, loginIP varchar(255), sessionID text);');
	
	echo "created loginDB\n";

	mysqli_query($con, 'create database groupMemberDB;');
	mysqli_query($con, 'create table groupMembersDB.group1 (username varchar(255), admin boolean);');
  echo "created groupMembersDB\n";

	mysqli_query($con, 'create database fileDB;');
	mysqli_query($con, 'create table filesDB.group1 (username varchar(255), filename text, post_time time, post_date date, file mediumblob);');
  echo "created filesDB\n";

	mysqli_query($con, 'create database eventDB;');
	mysqli_query($con, 'create table eventsDB.group1 (username varchar(255), eventname varchar(255), description text, timeStart time, timeStop time, dateStart date, dateStop date, recurrence set);');
  echo "created eventsDB\n";
  
	mysqli_query($con, 'create database calendarDB;');
	mysqli_query($con, 'create table calendarDB.root (eventName varchar(255), groupName varchar(255), description text, timeStart time, timeStop time, dateStart date, dateStop date, recurrence set);');
  echo "created calendarDB\n";

  //mysqli_query($con, 'insert into login (user, pw, loggedIn, loginIP) in loginDB values ('root', 'toor', 'true', '127.0.0.1'); ');
	//echo "loginDB insert query completed";
/*	
	$result = mysqli_query($con, 'SELECT * FROM group1 in groupMembersDB;');
  echo "loginDB select query completed\n";

	while ($row = mysqli_fetch_array($result) )
	{ 
	echo( '<p>' . $row['user'] . ' ' . $row['logged_in'] . '</p>');
	}
*/
/*
	if(!$con) //mysqli_connect_errno() )
	{
		echo "ERR: could not connect to MySQL: " . mysqli_connect_error() . "\n";
	}
	else
	{
		echo "Connection Established $con\n";
	}
*/
	echo "Database setup completed\n";

//	return $con;
//}

//echo "sql connection test \n";
//connect();

//$result = mysqli_query
?>

