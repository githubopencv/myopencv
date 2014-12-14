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
	$useHashes = false;
	$targetDir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
	
        $connection = new mysqli('localhost','root','','db');
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
        
        if ($useHashes == true)
        {
                $path = $targetDir . $safehash;
        }
        else
        {
                $path = $targetDir . $safefilename;
        }
        
        if ( !empty($debug) )
        {
                echo "<center>safehash: $safehash</center>";
                echo "<center>safefilename: $safefilename</center>";
                echo "<center>path: $path</center>";
        }
        
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
