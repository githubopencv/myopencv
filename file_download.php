<?php
//Tyler Parks
//CSCI 430 - Group Scheduler/Manager Project
//File Upload

//start buffering, so headers go out all at once
ob_start();

//this MUST be inside the php script, or it is impossible to send headers.
echo "<!DOCTYPE html>";
echo "<html>";
	echo "<style>";
		echo "header {";
			echo "background-color:black;";
			echo "color:white;";
			echo "text-align:center;";
			echo "padding:5px;";	 
		echo "}";
	echo "</style>";
echo "<body>";
echo "<center>";
	echo "<header>";
	echo "<h2>File Download</h2>";
	echo "</header>";
	

	//hard code $_GET for debug purposes ONLY
	$_GET['hash'] = "6516829a1e38e1f920be349e42691207a6295707";
	$_GET['filename'] = "cartoon-alligator-head-03.jpg";
	
        $connection = new mysqli('localhost','root','mysql','db');
        if(!$connection)
        {
                echo('<p> Unable to connect. Database error. </p>');
                $fail = 1;
        }
           
        //raw input, DO NOT trust
        if( empty($_GET['hash']) or empty($_GET['filename']) or !empty($fail) )
        {  
                header("HTTP/1.0 400 Bad Request");
                $fail = 1;
                exit(); //must exit or buffering errors
        } //end if
        else
        {       
                $hash = $_GET['hash'];
                $filename = $_GET['filename'];
        }
        
        //sanitize input
        $safehash = strip_tags($hash); //remove html tags
        $safehash = addslashes($safehash); //escape special chars
        $safefilename = strip_tags($filename);
        $safefilename = addslashes($safefilename);
        $path = "/var/www/html/uploads/" . $safehash;
        
        //find file's name and hash in db, to ensure GET passed a real file
        $result = mysqli_query($connection, "select * from db.files where hash='$safehash' limit 1") or die( mysqli_error($connection) );
        $row = mysqli_fetch_array($result);
        
        //prepare variables if file found else 404 error
        if( !empty($row) and empty($fail) )
        {
                //organize file metadata
                $downloadhash = $row['hash'];
                $downloadfilename = $row['filename'];
                $downloadpath = $path . $downloadhash;
                //$filesize = filesize($downloadpath); //throws "stat failed" error
                $filesize = $row['filesize'];
                $pathinfo = pathinfo($downloadfilename);
                $fileext = $pathinfo['extension'];
                
                
        } //end if !empty
        else
        {
                //file doesn't exist
                header("HTTP/1.0 404 Not Found");
                $fail = 1;
                exit();
        }
        
        //start download if file exists, else 404 error
        if ( file_exists($downloadhash) and empty($fail) )
        {
                $file = fopen($downloadpath, "rb");
                
                //prepare download if file opened successfully, else 500 error
                if ($file)
                {
                        //set headers
                        header("Pragma: public"); //IE compatability
                        header("Expires: -1");
                        header("Cache-Control: public, must-revalidate, post-check=0, pre-check=0");
                        header("Content-Disposition: attachment; filename=\"$downloadfilename\"");
                        
                        //set MIME type
                        $type_default = "application/octet-stream";
                        $content_types = array(
                                                "exe" => "application/octet-stream",
                                                "zip" => "application/zip",
                                                "mp3" => "audio/mpeg",
                                                "mpg" => "video/mpeg",
                                                "avi" => "video/x-msvideo",
                                                ); 
                        
                        //set MIME type to default if unknown file type                       
                        if ( isset($content_types[$fileext]) )
                                $type = $content_types;
                        else
                                $type = $type_default;
                                
                        //check if HTTP_RANGE set by browsers, serve the first range found
                        if( isset($_SERVER['HTTP_RANGE']) )
                        {
                                list($size_unit, $range_orig) = explode('=', $_SERVER['HTTP_RANGE'], 2);
                                if ($size_unit == 'bytes')
                                {
                                
                                }
                                else
                                {
                                        $range = '';
                                        header("HTTP/1.1 416 Requested Range Not Satisfiable");
                                        $fail = 1;
                                }
                        } //end if $_SERVER
                        else
                        {
                               $range = '';
                        }
                       
                        //find download start and end points from range
                        list($seek_start, $seek_end) = explode('-', $range, 2);
                       
                        //sanitizing and bounds checking on ranges
                        if ( empty($seek_start) or $seek_end < abs(intval($seek_start)))
                                $seek_start = 0;
                        else
                                max( abs(intval($seek_start)), 0 );
                                
                        if ( empty($seek_end))
                                $seek_end = ($filesize -1);
                        else
                                $seek_end = min( abs(intval($seek_end)), ($filesize -1) );
                                
                        //send partial content header if only downloading part of a file (IE work around)
                        if ($seek_start > 0 or $seek_end < ($filesize -1))
                        {
                                header("HTTP/1.1 206 Partial Content");
                                header('Content-Range: bytes '.$seek_start.'-'.$seek_end.'/'.$file_size);
			        header('Content-Length: '.($seek_end - $seek_start + 1));
                        }
                        else
                                header("Content-Length: $filesize");
                        
                        header("Accept-Ranges: bytes");
                       
                        //begin downloading
                        set_time_limit(0);
                        fseek($file, $seek_start);
                       
                        while(   !feof($file) ) //while not end of file
                        {
                                ob_start(); //nested output buffer
                                        print( @fread($file, 1024*8) );
                                ob_flush();
                                flush();
                                
                                if (connection_status() != 0)
                                {
                                        @fclose($file);
                                        $fail = 1;
                                        break;
                                }
                        } //end loop
                        
                        //file download finished
                        if (!empty($fail))
                        {
                                @fclose($file);
                        }
                }
                else
                {
                        //cannot access file
                        header("HTTP/1.0 500 Internal Server Error");
                        $fail = 1;                
                }
                
        } //end if file exists
        else 
        {
                //file doesn't exist
                header("HTTP/1.0 404 Not Found");
                $fail = 1;
        }
        
        //show warning if errors fall through
        if( !empty($fail) )
                header("HTTP/1.0 500 Internal Server Error");
 
echo "<p><a href='http://localhost/grouphomepage.html'>Go to Group Home page</a></p>";
echo "<p><a href='http://localhost/file_management.php'>Return to File Management</a></p>";
echo "</center>";
echo "</body>";
echo "</html>";
        
        //output buffer contents
        ob_end_flush();
?>
        

