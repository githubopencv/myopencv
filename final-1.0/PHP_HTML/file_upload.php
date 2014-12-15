<!DOCTYPE html>
<html>
<head>
	<title> File Upload </title>
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
<h2>File Upload</h2>
</header>
<center>
<?php
$targetDir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
$useHashes = false;
$debug = false;
//$target_file = $targetDir . basename($_FILES["fileToUpload"]["name"]);
//Sanitize inputs
if (isset($_POST["submit"])) 
{
    $safeName = addslashes ($_FILES["fileToUpload"]["name"]);
    $dest = $targetDir . basename($safeName);
    
    $hash = sha1_file( $_FILES["fileToUpload"]["tmp_name"] );
    $hashDest = $targetDir . $hash;
    
    if($useHashes == true)
    {
       $uploadDest = $hashDest;
    }
    else
    {
       $uploadDest = $dest;
    } 
    
    //debug outputs
    if ( !empty($debug))
    {
            echo "safe name: " . $safeName . "<br>";
            echo "file path: " . $dest . "<br>";
            echo "temp name: " . $_FILES["fileToUpload"]["tmp_name"] . "<br>";
            echo "temp file size: " . $_FILES["fileToUpload"]["size"] . "<br>";
            echo "hash name: " . $hash . "<br>";
            echo "hash path: " . $hashDest . "<br>";
            echo "uploadDest: " . $uploadDest . "<br>";
    } 
}
else
{
        die("POST submission failed"); 
}
//url, user, password, database
$connection = new mysqli('localhost','root','','user_login');
if(!$connection)
{
        die('<p> Unable to connect, database error. </p>');
}
// Check if file already exists
//something a bit more sophisticated should to be done to prevent name/hash collisions
if (file_exists($uploadDest)) 
{
        echo ("Sorry, file already exists.<br>");
        $allowUpload = 0;
}
else
{
        $allowUpload = 1;
}
//store file
if ($allowUpload)
{
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $uploadDest)) 
 {
        //format for mysql DateTime type
        date_default_timezone_set("America/Los_Angeles");
        $dateTime = date( "Y-m-d H:i:s", time());
        
        //get file size
        //$filesize = $_FILES["fileToUpload"]["size"];
        $filesize = filesize($uploadDest);
        
        if( !empty($debug))
        {
                //query with error and debug outputs
                mysqli_query($connection,"insert into files (username, groupname, filename, postDateTime, filesize, hash) values ('testUser', 'testGroup', '$safeName', '$dateTime', '$filesize','$hash');") or die(mysqli_error($connection));
                
                echo "date: " . $dateTime . "<br>";
                echo "File size " . $filesize . "<br>";
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        }
        else
        {
                //quiet query
                mysqli_query($connection,"insert into files (username, groupname, filename, postDateTime, filesize, hash) values ('testUser', 'testGroup', '$safeName', '$dateTime', '$filesize','$hash');");
                $fail = mysqli_error($connection);
                
                if( empty($fail) ) //$fail = "" if no errors
                        echo "<center>File upload successful</center>";
                else
                        echo "<center>Sorry, there was an error uploading your file.</center>";
        }
 } 
 else 
 {
        echo "<center>Sorry, there was an error uploading your file.</center>";
        
 }
}

?> 

<p><a href="http://localhost/index.php">Return Home</a></p>
<p><a href="http://localhost/file_management.php">Upload another file</a></p>
</center>
</body>
</html>