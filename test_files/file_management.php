<?php
session_start();

#can't test user-based code,
#if(!isset($_SESSION['user_id']))
#{
#        echo"<!DOCTYPE html>";
#        echo"<html>";
#	        echo"<style>";
#		        echo"header {background-color:black; color:white; text-align:center; padding:5px;}";
#	        echo"</style>";

#        echo"<body>";

#	        echo"<header>";
#	        echo"<h2>File Management</h2>";
#	        echo"</header>";
#        
#        $message = '<center>You must be logged in to access this page!</center>';
#        die($message);
#} //end if isset session 
#else
#{
echo"<!DOCTYPE html>";
echo"<html>";

	echo"<style>";
		echo"header {background-color:black; color:white; text-align:center; padding:5px;}";
	echo"</style>";

echo"<body>";

	echo"<header>";
	echo"<h2>File Management</h2>";
	echo"</header>";
	echo"<center><h4>Use this page to manage all shared files.</h4></center>";

	echo"<center>";
	echo"<h>Choose file to upload</h>";
	echo"<br><br>";
	echo"<form action='file_upload.php' method='post' enctype='multipart/form-data'>";
        echo"Select file to upload:";
            echo"<input type='file' name='fileToUpload' id='fileToUploa'><br>";
            echo"<input type='submit' value='Upload File' name='submit'>";
        echo"</form>";
	echo"</center>";
	
	echo"<br><br><br><br>";
	echo"<h4>Uploaded Files:</h4>";
	
	
	
        $connection = new mysqli('localhost','root','','db');
        if(!$connection)
        {
                echo('<p> Unable to connect. Database error. </p>');
                    exit();
        }

        //get a list of files in alphabetical order
        $result = mysqli_query($connection, "select * from db.files order by filename") or die( mysqli_error($connection) );

        
        //build a table of files for management
        echo "<style> th {text-align:left;} </style>"; 
        echo "<table style='width:100%' id='file_management'>";
        echo "<tr><th>File</th>";
        //echo "<th>User</th>";
        //echo "<th>Group</th>";
        echo "<th>Upload Date</th>";
        echo "<th>File Size</th></tr>";
        
        while ($row = mysqli_fetch_array($result) or die( mysqli_error($connection)) )
        {
                $filename = $row['filename'];
                $hash = $row['hash'];
                
                //start a new row
                echo "<tr>";
                
                //row elements
                echo "<td>" . $filename . "</td>";
                //echo "<td>" . $row['username'] . "</td>";
                //echo "<td>" . $row['groupname'] . "</td>";
                echo "<td>" . $row['postDateTime'] . "</td>";
                echo "<td>" . $row['filesize'] . "</td>";
                echo "<td>" . "<a href='file_download.php?hash=$hash&filename=$filename'>download</a>" . "</td>";
                echo "<td>" . "<a href='file_delete.php?hash=$hash&filename=$filename'>delete</a>" . "</td>";
                
                //end a new row
                echo "</tr>"; 
        } //end loop
        
        echo "</table>";

        echo"</body></html>";

#} //end else (session is set)       
	?>


