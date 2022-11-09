<?php
include('../controller/database.php');

error_reporting(0);

$user_account = $mysqli->query("SELECT * from users");



if(isset($_POST['add-members'])){
	
	$role          = $_POST['role'];
	$fname         = $_POST['fname'];
	$mname         = $_POST['mname'];
	$lname         = $_POST['lname'];
	$age           = $_POST['age'];
	$contactnumber = $_POST['contactnumber'];
	$email         = $_POST['email'];
	$password      = $_POST['password'];
	$address       = $_POST['address'];
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/profile/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	$mysqli->query("INSERT INTO user_account (fname , mname ,  lname,position,number,address,profile,username,password) 
					VALUES ('$fname','$mname','$lname','$role','$contactnumber','$address','$location','$email','$password') ");
				

	// ** Send Email **//
	$to = $email;
	$subject = "User Account Details";

	$message = "
	<html>
	<head>
	<title>Account Details</title>
	</head>
	<body>
	<p>
		Good day ". $fname .' '. $lname." Your account for the Humanitarian Order of Sierra Falconès, Inc. <br> 
		have been created and you can log in to your account using this " . $email. " and password ". $password." in sierrafalcones.org
		<br>
		If there any error loggin in, please contact an officer in your chapter. Thank you and welcome!
	</p>
	
	</body>
	</html>
	";

	// More headers
	$headers .= 'From: aliciajane.peji@cvsu.edu.ph' . "\r\n";
	$headers .= 'Cc: aliciapeji3@gmail.com' . "\r\n";

	mail($to,$subject,$message,$headers);	
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Member is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "user.php";
							});
			</script>';
	
}

if(isset($_POST['updateprofile'])){
	
	$fname         = $_POST['fname'];
	$mname         = $_POST['mname'];
	$lname         = $_POST['lname'];
	$contactnumber = $_POST['contactnumber'];
	$email         = $_POST['email'];
	$address       = $_POST['address'];
	$id            = $_POST['id'];	
	$advocacy      = $_POST['advocacy'];
	$letter        = $_POST['image'];
	
	if($letter ==""){
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/profile/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else{
			if( $_FILES["image"]["name"] == ""){
					$location = $letter;
				} else {
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name = addslashes($_FILES['image']['name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "assets/profile/" . $_FILES["image"]["name"]);
					$location   =  $_FILES["image"]["name"];
			}
	}
		
	$mysqli->query("UPDATE  users  SET 
									fname = '$fname' , 
									mname = '$mname' ,  
									lname = '$lname',
									contact = '$contactnumber',
									address = '$address',
									advocacy = '$advocacy',
									email = '$email',
									profile_picture = '$location'
									where user_id   = '$id'
									");
						
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Profile is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "profile-settings.php";
							});
			</script>';
}


if(isset($_POST['delete-member'])){
	
	$id       = $_POST['u_id'];

	
	$mysqli->query("DELETE FROM user_account where u_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Officer Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "user.php";
							});
			</script>';
}