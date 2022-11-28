<?php
session_start();

include('../controller/database.php');

error_reporting(0);
$ids        = $_SESSION["id"];
$tickets = $mysqli->query("SELECT * from tickets where user_id = '$ids'");


if(isset($_POST['add-ticket'])){
	$alphabet = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
   
	$title     = $_POST['title'];
	$content   = $_POST['content'];
	$transcode =  implode($pass);
	$id        = $_SESSION["id"];
	$date      = date('F d,Y - H:i:s A', time());
	$username1     = $_SESSION['name'];
	$mysqli->query("INSERT INTO tickets (title , user_id ,  concern,status,transcode) 
					VALUES ('$title','$id','$content','0','$transcode') ");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Add New Ticket $title',1) ");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Tickets is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "tickets.php";
							});
			</script>';
	
}
