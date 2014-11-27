
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

//	$connection = new mysqli('db.ecst.csuchico.edu', 'jvillanueva, 'H5msvMGK', 'jvillanueva', '5551');  
        $connection = new mysqli('localhost','root','mysql');
	//mysqli_query($connection, 'use mysql;');
	
	$result = mysqli_query($connection, 'create database db;');
	if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
    echo "created database db\n";
	
		/*
	every user's login data is stored in db.login
	
	username, password, and email are self-explanitory.
	loggedIn is for tracking which users are logged in.
	loginIP is the last IP from which a user logged in from.
	sessionID is checking that a user's current login is valid.
	*/
	
	$result = mysqli_query($connection, 'create table db.logins (username varchar(255), password varchar(255), email text, loggedIn boolean, loginIP varchar(255), sessionID text);');
	if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
	  echo "created login table\n";


	/*
	Create multiple entries if a user is a member of multiple groups.
	
	username and groupname are the user and the group they are a member of.
	admin is whether a user has admin rights over a group.
	*/
	$result = mysqli_query($connection, 'create table db.groupMembers (username varchar(255), groupname varchar(255), admin boolean);');
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
    echo "created groupMembers table\n";

	/*
	Store files for each group.
	
	username is the OP.
	groupname is the group that can see the file.
	filename is the name of the file.
	postDateTime is the date & time of upload.
	file blob is the file itself.
	*/
	$result = mysqli_query($connection, 'create table db.files (username varchar(255), groupname varchar(255), filename text, postDateTime datetime, hash text);');
  if (!$result)
  {
    $err = mysqli_error($connection);
    echo($err . "\n");
  }
  else
    echo "created files table\n";

	/*
	Store each group's events in db.events
	
	*/
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
  
	/*
	Store each user's calendar in db.calendar
	Each user's calendar has an entry for every calendar event.

	*/
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

	echo "Database setup completed\n";

?>

