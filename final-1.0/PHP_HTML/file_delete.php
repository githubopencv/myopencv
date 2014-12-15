<!--Tyler Parks-->
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
<center>
	<header>
	<h2>File Deletion</h2>
	</header>
	
	<?php
	
        $useHashes = false;
	$targetDir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
	
        $connection = new mysqli('localhost','root','','user_login');
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
                $result = mysqli_query($connection, "delete from files where hash='$safehash'") or die( mysqli_error($connection) );
                       
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
        
<p><a href="http://localhost/index.php">Return Home</a></p>
<p><a href="http://localhost/file_management.php">Return to File Management</a></p>
</center>
</body>
</html>