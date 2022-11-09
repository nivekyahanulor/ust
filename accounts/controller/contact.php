<?php
// error_reporting(0);
include('../controller/database.php');

$contacts  = $mysqli->query("SELECT * from contact");	


if(isset($_POST['contact'])){
	
	$location  = $_POST['location'];
	$email     = $_POST['email'];
	$contact   = $_POST['contact'];
	$messenger = $_POST['messenger'];
	$map = $_POST['map'];
	
	$mysqli->query("UPDATE contact set location='$location' , email = '$email' , contact='$contact', Messenger = '$messenger', map = '$map'");
	

	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Contact is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "contact.php";
							});
			</script>';
	
	
}