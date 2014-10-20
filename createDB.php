
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

	$connection = new mysqli('127.0.0.1', 'root');  
	mysqli_query($connection, 'use mysql;');
	
	/*
	every user's login data is stored in loginDB.login
	
	username, password, and email are self-explanitory.
	loggedIn is for tracking which users are logged in.
	loginIP is the last IP from which a user logged in from.
	sessionID is checking that a user's current login is valid.
	*/
	$result = mysqli_query($connection, 'create database db;');
	if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
    echo "created database db\n";
	
	$result = mysqli_query($connection, 'create table db.logins (username varchar(255), password varchar(255), email text, loggedIn boolean, loginIP varchar(255), sessionID text);');
	if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
	  echo "created login table\n";


	//mysqli_query($connection, 'create database groupMemberDB;');
	$result = mysqli_query($connection, 'create table db.groupMembers (username varchar(255), groupname varchar(255), admin boolean);');
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
    echo "created groupMembers table\n";

	//mysqli_query($connection, 'create database fileDB;');
	$result = mysqli_query($connection, 'create table db.files (username varchar(255), groupname varchar(255), filename text, postDateTime datetime, file longblob);');
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
    echo "created files table\n";

	//mysqli_query($connection, 'create database eventDB;');
	$result = mysqli_query($connection, "create table db.events (username varchar(255), 
	eventName varchar(255), 
	description text, 
	dateStart datetime, 
	dateStop datetime, 
	recurrence set('Mondays', 'Tuesdays', 'Wednesdays', 'Thursdays', 'Fridays', 'Saturdays', 'Sundays', 'Weekly', 'Monthly', 'Yearly') );");
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
    echo "created events table\n";
  
	//mysqli_query($connection, 'create database calendarDB;');
	$result = mysqli_query($connection, "create table db.calendar (eventName varchar(255), 
	groupName varchar(255), 
	description text,
	dateStart datetime, 
	dateStop datetime, 
	recurrence set('Mondays', 'Tuesdays', 'Wednesdays', 'Thursdays', 'Fridays', 'Saturdays', 'Sundays', 'Weekly', 'Monthly', 'Yearly'));");
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else 
    echo "created calendar table\n";

  //mysqli_query($connection, 'insert into login (user, pw, loggedIn, loginIP) in loginDB values ('root', 'toor', 'true', '127.0.0.1'); ');
	//echo "loginDB insert query completed";
/*	
	$result = mysqli_query($connection, 'SELECT * FROM group1 in groupMembersDB;');
  echo "loginDB select query completed\n";

	while ($row = mysqli_fetch_array($result) )
	{ 
	echo( '<p>' . $row['user'] . ' ' . $row['logged_in'] . '</p>');
	}
*/
/*
	if(!$connection) //mysqli_connect_errno() )
	{
		echo "ERR: could not connect to MySQL: " . mysqli_connect_error() . "\n";
	}
	else
	{
		echo "Connection Established $connection\n";
	}
*/
	echo "Database setup completed\n";

//	return $connection;
//}

//echo "sql connection test \n";
//connect();

//$result = mysqli_query
?>

