<?php
session_start();
include('../controller/database.php');
error_reporting(0);

if($_GET['status'] == 'New'){
	$atickets = $mysqli->query("SELECT * from tickets where status = 0");
} else if($_GET['status'] == 'Pending'){
	$atickets = $mysqli->query("SELECT * from tickets where status = 1");
} else if($_GET['status'] == 'Solved'){
	$atickets = $mysqli->query("SELECT * from tickets where status = 2");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php';
	
	
if(isset($_POST['approve-ticket'])){
	
	$id       = $_POST['id'];
	$status   = $_POST['status'];
	$username = $_SESSION['name'];

	$mysqli->query("UPDATE tickets set status = 1 WHERE ticket_id ='$id'");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username','Approved Ticket',1) ");
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Ticket is Successfully Approved",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "ticket.php?status='.$status.'";
							});
			</script>';
	
}


if(isset($_POST['solved-ticket'])){
	
	$id        = $_POST['id'];
	$name      = $_POST['user'];
	$user_id   = $_POST['user_id'];
	$email     = $_POST['email'];
	$username = $_SESSION['name'];

	$mysqli->query("UPDATE tickets set status = 2 WHERE ticket_id ='$id'");
	$mysqli->query("INSERT INTO history (user_name, status, code) VALUES ('$username','Set Ticket to Solved',1) ");
	
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
			$mail->Subject = 'Survey Form';
			$mail->isHTML(true);


			$mail->Body = "<html>
								<body>
									<h1>Hello , " .$name ." </h1>
									<p> Kindly take survey for system improvements.  </p>
									<p> <a href='http://earthust.com/survey.php?name=$name&id=$user_id'> Link Here </a> </p>
								</body>
							</html>";

			if ($mail->send()) {
				$message = 'success';
			} else {
				$message = 'failed';
			}
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Ticket is Successfully Solved",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "ticket-view.php?id='.$id.'";
							});
			</script>';
	
}

if(isset($_POST['publish-comment'])){
	
	$id          = $_POST['id'];
	$content     = $_POST['content'];
	$responseby  = $_POST['responseby'];
	$username = $_SESSION['name'];
	$mysqli->query("INSERT INTO tickets_response (ticket_id,content,response_by) VALUES ('$id' , '$content', '$responseby')");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username','Publish New Comments',1) ");
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Response is Successfully Posted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "ticket-view.php?id='.$id.'";
							});
			</script>';
	
}
