Our MySQL database tables were set up as such:

/* Handles groups created by users */

	create table groups(
		ID int(30) not null auto_increment,
		username varchar(50) not null,
		groupname varchar(100) not null,
		password varchar(100) not null
	);

/* Handles all schedule info of users in their groups */

	create table calendar(
		id int(30) not null auto_increment,
		day varchar(30) not null,
		time varchar(30) not null,
		username varchar(30) not null
	);

/* File management */

	create table files(
		username varchar(255),
		groupname varchar(255),
		filename text
	);

/* Handles user registration, login */

	create table UserNameTable(
		UserNameID int(9) NOT NULL auto_increment,
		UserName VARCHAR(40) NOT NULL,
		Password VARCHAR(40) NOT NULL,
		email VARCHAR(80) NOT NULL,
		PRIMARY KEY(UserNameID),
		UNIQUE KEY UserNameID(UserNameID),
		UNIQUE KEY email(email)
	);
	
