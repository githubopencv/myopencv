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
<h2>File Upload</h2>
</header>
<center>
<?php
$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

//Sanitize inputs
if (isset($_POST["submit"])) 
{
    $safe_name = addslashes ($_FILES["fileToUpload"]["name"]);
    $dest = $target_dir . basename($safe_name);
    
    $hash_name = sha1_file( $_FILES["fileToUpload"]["tmp_name"] );
    $hash_dest = $target_dir . $hash_name;
    
    echo "safe name " . $safe_name . "<br>";
    echo "file " . $dest . "<br>";
    echo "hash name " . $hash_name . "<br>";
    echo "hash file: " . $hash_dest . "<br>";
}
else
{
        die("submission failed"); 
}

//url, user, password, database
$connection = new mysqli('localhost','root','mysql','db');
if(!$connection)
{
        die('<p> Unable to connect. </p>');
}

// Check if file already exists
if (file_exists($target_file)) 
{
        die ("Sorry, file already exists.<br>");
        $allowUpload = 0;
}
else
{
        $allowUpload = 1;
}

//get file size
$filesize = $_FILES["fileToUpload"]["size"];
echo "File size " . $filesize . "<br>";

//store file
if ($allowUpload)
{
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $hash_dest)) 
 {
        date_default_timezone_set("America/Los_Angeles");
        $dateTime = date( "Y-m-d H:i:s", date()); //format is correct?
        echo "date: " . $dateTime . "<br>";
        
        mysqli_query($connection,"insert into db.files (username, groupname, filename, postDateTime, hash) values ('herp', 'derp', '$safename', '$dateTime', '$hash_name');") or die(mysqli_error($connection));
        
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
 } 
 else 
 {
        echo "Sorry, there was an error uploading your file. <br>";
        
 }
}

?> 

<p><a href="http://localhost/grouphomepage.html">Go to Group Home page</a></p>
<p><a href="http://localhost/file_upload.html">Upload another file</a></p>
</center>
</body>
</html>
