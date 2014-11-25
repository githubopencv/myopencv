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
    $target_file = $target_dir . basename($safe_name);
    
    $hash_name = sha1_file( $_FILES["fileToUpload"]["tmp_name"] );
    $hash_file = $target_dir . $hash_name;
    
    echo "safe name " . $safe_name . "<br>";
    echo "file " . $target_file . "<br>";
    echo "hash name " . $hash_name . "<br>";
    echo "hash file: " . $hash_file . "<br>";
}
else
{
        die("submission failed"); 
}

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
 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $hash_file)) 
 {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
 } 
 else 
 {
        echo "Sorry, there was an error uploading your file. <br>";
        
 }
}

?> 

<a href="http://localhost/grouphomepage.html">Go to Group Home page</a>
</center>
</body>
</html>
