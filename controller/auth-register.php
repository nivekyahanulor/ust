<?php

	ob_start();
	session_start();
	include('database.php');
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require '../accounts/controller/phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
	require '../accounts/controller/phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require '../accounts/controller/phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
		

	$firstname = mysqli_real_escape_string($mysqli,$_POST['firstname']);
	$lastname  = mysqli_real_escape_string($mysqli,$_POST['lastname']);
	$role      = mysqli_real_escape_string($mysqli,$_POST['role']);
	$email     = mysqli_real_escape_string($mysqli,$_POST['email']);
	$username  = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password  = mysqli_real_escape_string($mysqli,md5($_POST['password']));
	
	$check    = $mysqli->query("SELECT * from users where email='$email'");
	$count    = $check->num_rows;
		
	if($count !=0){
		echo "<script> window.location.href='../register.php?duplicate'; </script>";
	} else {
			$mail = new PHPMailer();
			$mail->isSMTP();
			$mail->Host     = 'smtp.hostinger.com';
			$mail->SMTPAuth = true;
			$mail->Username = 'admin@earthust.com';
			$mail->Password = '@Adminust2022';
			$mail->SMTPSecure = 'ssl'; // tls
			$mail->Port     = 465; // 587
			$mail->setFrom('admin@earthust.com', 'EARTH-UST');
			$mail->addAddress($email);
			$mail->Subject = 'Account Confirmation';
			$mail->isHTML(true);



			$mail->Body = "<html>
								<body>
									<h1>Hello , " .$firstname . ' '. $lastname ." </h1>
									<p> Thank you for registering to EARTH-UST</p>
									<p> Kindly confirm your email address via the link below in order to start using your profile</p>
									<p> <a href='https://earthust.com/confirm.php?name=$name&email=$email'> Link Here </a> </p>
								</body>
							</html>";

			if ($mail->send()) {
				$message = 'success';
			} else {
				$message = 'failed';
			}
	

	$sql      = "INSERT INTO users (fname,lname,role,email,username,password,status)
					VALUES ('$firstname','$lastname','$role','$email','$username','$password',1)";
	$result   = mysqli_query($mysqli, $sql);

	
	header("location:../login.php?success");
	}
