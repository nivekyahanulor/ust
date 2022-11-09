<?php
session_start();
include('../controller/database.php');

error_reporting(0);

$user_account = $mysqli->query("SELECT * from user_account");



if(isset($_POST['add-members'])){
	
	$role          = $_POST['role'];
	$fname         = $_POST['fname'];
	$mname         = $_POST['mname'];
	$lname         = $_POST['lname'];
	$age           = $_POST['age'];
	$contactnumber = $_POST['contactnumber'];
	$email         = $_POST['email'];
	$username      = $_POST['username'];
	$password      = $_POST['password'];
	$address       = $_POST['address'];
	$username1     = $_SESSION['name'];
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/profile/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	$mysqli->query("INSERT INTO user_account (fname , mname ,  lname,position,number,address,profile,email,username,password) 
					VALUES ('$fname','$mname','$lname','$role','$contactnumber','$address','$location','$email','$username','$password') ");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Add New Account $username',1) ");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Member is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "accounts.php";
							});
			</script>';
	
}

if(isset($_POST['update-member'])){
	
	$fname         = $_POST['fname'];
	$mname         = $_POST['mname'];
	$lname         = $_POST['lname'];
	$contactnumber = $_POST['contactnumber'];
	$email         = $_POST['email'];
	$address       = $_POST['address'];
	$id            = $_POST['id'];	
	$username      = $_POST['username'];	
	$letter        = $_POST['logo'];
	$role          = $_POST['role'];
	$username1     = $_SESSION['name'];
	
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
		
	$mysqli->query("UPDATE  user_account  SET 
									fname = '$fname' , 
									mname = '$mname' ,  
									lname = '$lname',
									contact = '$contactnumber',
									address = '$address',
									email = '$email',
									username = '$username',
									profile = '$location',
									position = '$role'
									where u_id    = '$id'
									");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Update $fname $lname Account ',1) ");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "User Information is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "accounts.php";
							});
			</script>';
}


if(isset($_POST['delete-member'])){
	
	$id       = $_POST['id'];
	$username = $_SESSION['name'];
	
	$mysqli->query("DELETE FROM user_account where u_id  = '$id'");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username','Deleted Account',1) ");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Officer Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "accounts.php";
							});
			</script>';
}