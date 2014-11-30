<!--Tyler Parks-->
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
<center>
	<header>
	<h2>File Deletion</h2>
	</header>
	
	<?php
	
        $connection = new mysqli('localhost','root','mysql','db');
        if(!$connection)
        {
                echo('<p> Unable to connect. Database error. </p>');
                    exit();
        }
        
        //raw input, DO NOT trust
        $hash = $_GET['hash'];
        $filename = $_GET['filename'];
        
        //sanitize input
        $safehash = strip_tags($hash); //remove html tags
        $safehash = addslashes($safehash); //escape special chars
        $safefilename = strip_tags($filename);
        $safefilename = addslashes($safefilename);
        $path = "uploads/" . $safehash;
        
        //remove file from filesystem
        if( unlink($path) )
        {
                //remove file from db
                $result = mysqli_query($connection, "delete from db.files where hash='$safehash'") or die( mysqli_error($connection) );
                       
                if ($result) 
                {
                        echo "<center>Deleted file $safefilename</center>";
                }
                else
                {
                        echo "<center>Error: could not delete file $safefilename</center>";
                }
        }
        else
        {
                echo "<center>Error: could not delete file $safefilename</center>";
        }
        ?>
        
<p><a href="http://localhost/grouphomepage.html">Go to Group Home page</a></p>
<p><a href="http://localhost/file_management.php">Return to File Management</a></p>
</center>
</body>
</html>
