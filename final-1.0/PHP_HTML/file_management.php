<!--Savpreet Singh-->
<!--CSCI 430 - Group Scheduler/Manager Project-->
<!--File Upload-->

<!DOCTYPE html>
<html>

<head>
	<title> File Management </title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>

	<style>
		header {
			background-color:lightgray;
			font: 12px "Helvetica Neue", Helvetica, Arial, sans-serif;
			color: #888;
			text-align:center;
			padding:5px;	 
		}
	</style>

<body>

	<header>
	<h2>File Management</h2>
	</header>

	<center>
	<br><br>
	<form action="file_upload.php" method="post" enctype="multipart/form-data" class="login_form">
            Use this page to upload any files you would like to share with your group.
			<br>
			<br>
			<label for="fileToUpload">Please select file to upload:</label>
			<br>
            <input class="button" type="file" name="fileToUpload" id="fileToUpload"><br>
			<br>
            <input class="button" type="submit" value="Upload File" name="submit">
			<br>
			<br>
			<a href='index.php'>Return Home</a>
        </form>
	</center>
	
	<br><br><br><br>
	<h4>Uploaded Files:</h4>
	
	<?php
	
        $connection = new mysqli('localhost','root','','user_login');
        if(!$connection)
        {
                echo('<p> Unable to connect. Database error. </p>');
                    exit();
        }
        //get a list of files in alphabetical order
        $result = mysqli_query($connection, "select * from files order by filename") or die( mysqli_error($connection) );
        
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
       
	?>

</body>
</html>
