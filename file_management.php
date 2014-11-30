<!--Savpreet Singh-->
<!--CSCI 430 - Group Scheduler/Manager Project-->
<!--File Upload-->

<!DOCTYPE html>
<html>

	<style>
		header {
			background-color:black;
			color:white;
			text-align:center;
			padding:5px;	 
		}
	</style>

<body>

	<header>
	<h2>File Management</h2>
	</header>
	<center><h4>Use this page to manage all shared files.</h4></center>

	<center>
	<h>Choose file to upload</h>
	<br><br>
	<form action="file_upload.php" method="post" enctype="multipart/form-data">
            Select file to upload:
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <input type="submit" value="Upload File" name="submit">
        </form>
	</center>
	
	<br><br><br><br>
	<h4>Uploaded Files:</h4>
	
	<?php
	
        $connection = new mysqli('localhost','root','mysql','db');
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
        echo "<th>User</th>";
        echo "<th>Group</th>";
        echo "<th>Upload Date</th>";
        echo "<th>File Size</th></tr>";
        
        while ($row = mysqli_fetch_array($result) or die( mysqli_error($connection)) )
        {
                $filename = $row['filename'];
                
                //start a new row
                echo "<tr>";
                
                //row elements
                echo "<td>" . $filename . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['groupname'] . "</td>";
                echo "<td>" . $row['postDateTime'] . "</td>";
                echo "<td>" . $row['filesize'] . "</td>";
                echo "<td>" . "<a href='file_download.php?filename=$filename'>download</a>" . "</td>";
                echo "<td>" . "<a href='file_delete.php?filename=$filename'>delete</a>" . "</td>";
                
                //end a new row
                echo "</tr>"; 
        } //end loop
        
        echo "</table>";

       
	?>

</body>
</html>

