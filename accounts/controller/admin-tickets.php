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
	
	$id       = $_POST['id'];
	$username = $_SESSION['name'];

	$mysqli->query("UPDATE tickets set status = 2 WHERE ticket_id ='$id'");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username','Set Ticket to Solved',1) ");
	
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
