<?php

session_start();

/* Check to see if email was sent */
if(!isset( $_POST['email'], $_POST['form_token'])) 
{
	$message = 'Please enter an email address.';
}
/* Check for a valid email address */	
elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $message = 'This email address is invalid.';
}
/* Check for valid form token */
elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid form submission';
}
else /* Insert username and password to database */
{
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		
	$db_username = 'root';
	$db_password = '';
	$db_info = 'mysql:dbname=user_login;host=127.0.0.1';
	
	try 
	{
		
		$dbhandle = new PDO($db_info, $db_username, $db_password);
		$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
		$insert_user = $dbhandle->prepare("SELECT email FROM usernametable WHERE email = :email");
		
		 /* Bind parameters */
        $insert_user->bindParam(':email', $email, PDO::PARAM_STR);

		$insert_user->execute();
		
		/* Check to see if user exists */
		$user_email = $insert_user->fetchColumn();
		if($user_email == false)
		{
			$message = 'Email not found!';
		}
		else
		{
			/* Create temporary password, insert to DB and send to user */
			$temp_pass = substr(md5(uniqid(rand(),'')),0,10);
			
			$password = filter_var($temp_pass, FILTER_SANITIZE_STRING);
			$password = sha1($temp_pass);
			
			$dbhandle = new PDO($db_info, $db_username, $db_password);
			$dbhandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			$query = $dbhandle->prepare("SELECT email FROM usernametable WHERE email = :email");
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->execute();
			$user_email = $query->fetchColumn();
			
			$query = $dbhandle->prepare("UPDATE usernametable SET password = :password WHERE email = :email");
			$query->bindParam(':email', $email, PDO::PARAM_STR);
			$query->bindParam(':password', $password, PDO::PARAM_STR, 40);
			$query->execute();
			
			include('class.phpmailer.php');

			// Here sets data for email
			$from = 'teamandroid430@gmail.com';
			$from_name = 'Team Android';
			$to = $email;
			$toname = 'User';
			$subject = 'Password Recovery';
			$msg = 'Here is your temporary password for your account. Please change your password as soon as you log in.
					<br>
					<b>Temporary Password: </b>' . $temp_pass;

			$mail             = new PHPMailer();
			$mail->IsSMTP();                                // telling the class to use SMTP
			$mail->Host       = "smtp.gmail.com";           // SMTP server
			$mail->SMTPAuth   = true;                       // enable SMTP authentication
			$mail->SMTPSecure = "tls";                      // sets the prefix to the servier
			$mail->Host       = "smtp.gmail.com";           // sets GMAIL as the SMTP server
			$mail->Port       = 587;                        // set the SMTP port for the GMAIL server
			$mail->Username   = 'teamandroid430@gmail.com';           // your GMAIL account
			$mail->Password   = 'android430';                 // GMAIL password

			$mail->SetFrom($from, $from_name);
			$mail->AddReplyTo($from, $from_name);
			$mail->Subject = $subject;
			$mail->MsgHTML($msg);                 // to send with HTML tags

			$mail->AddAddress($to, $toname);


			if(!$mail->Send()) {
			  $message = 'Mailer Error: '. $mail->ErrorInfo;
			} else {
			  $message = 'Message sent!';
			}
						
			unset($_SESSION['form_token']);
		}
	}
	catch (Exception $excep)
	{
		/* Some error, couldn't recover password */
		//$message = 'Unable to recover password, please contact admin.';
		$message = $excep->getMessage();
	}
}

?>

<html>
<head>
	<title> Password Recovery </title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>

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
	<h2>Welcome to the Group Management Project!</h2>
	</header>
	<center><h4>Password Recovery</h4></center>
	
	<center>
		<body id="body_color">
		<div id="sign_in">
		<fieldset style="width:30%"><legend>Password Recovery</legend>
		<br>
		<p><?php echo $message; ?>
		<!--<p><?php print_r($result); ?>-->
		</fieldset>
		</div>
	</center>
</body>
</html>
	
