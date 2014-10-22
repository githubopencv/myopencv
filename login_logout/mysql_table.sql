/* Savpreet Singh
   CSCI 430 - User Login MySQL
   Fall 2014
*/

/* How table is structured */

CREATE TABLE UserNameTable
(
	UserNameID int(9) NOT NULL auto_increment,
	UserName VARCHAR(40) NOT NULL,
	pass VARCHAR(40) NOT NULL,
	PRIMARY KEY(UserNameID),
	UNIQUE KEY UserNameID(UserNameID)
);
