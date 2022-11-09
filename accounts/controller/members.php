<?php
include('../controller/database.php');

error_reporting(0);

if($_SESSION['role'] ==1){
	$chaptername =  $_GET['chapter'];
	$memberlist = $mysqli->query("SELECT * from users where chapter='$chaptername'");
} else {
	$chaptername = $_SESSION['chapter'];
	$memberlist = $mysqli->query("SELECT * from users where chapter='$chaptername' and status='0'");
}



if(isset($_POST['add-members'])){
	
	$role          = $_POST['role'];
	$chapter       = $_POST['chapter'];
	$chapterid     = $_POST['chapterid'];
	$fname         = $_POST['fname'];
	$mname         = $_POST['mname'];
	$lname         = $_POST['lname'];
	$age           = $_POST['age'];
	$contactnumber = $_POST['contactnumber'];
	$email         = $_POST['email'];
	$password      = $_POST['password'];
	$advocacy      = $_POST['advocacy'];
	$address       = $_POST['address'];
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/profile/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	if($_SESSION['role'] ==1){
		$status = 0;
	} else {
		$status = 1;
	}
	$mysqli->query("INSERT INTO users (fname , mname ,  lname,role,age,contact,address,chapter,advocacy,profile_picture,email,password, status) 
					VALUES ('$fname','$mname','$lname','$role','$age','$contactnumber','$address','$chapter','$advocacy','$location','$email','$password','$status') ");
	
	
	
	if($_SESSION['role'] ==1){
	
			echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Member is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "member-list.php?chapter='.$chapter.'&id='.$chapterid.'";
							});
			</script>';
	} else {
		
			echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Member is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "member-list.php";
							});
			</script>';
	}
	
}

if(isset($_POST['update-member'])){
	
	$role          = $_POST['role'];
	$chapter       = $_POST['chapter'];
	$chapterid     = $_POST['chapterid'];
	$fname         = $_POST['fname'];
	$mname         = $_POST['mname'];
	$lname         = $_POST['lname'];
	$age           = $_POST['age'];
	$contactnumber = $_POST['contactnumber'];
	$email         = $_POST['email'];
	$password      = $_POST['password'];
	$advocacy      = $_POST['advocacy'];
	$address       = $_POST['address'];
	$letter        = $_POST['logo'];
	$id            = $_POST['id'];
	
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
									role = '$role',
									age = '$age',
									contact = '$contactnumber',
									address = '$address',
									advocacy = '$advocacy',
									profile_picture = '$location',
									email = '$email',
									password = '$password'
									where user_id   = '$id'
									");
						
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "member-list.php?chapter='.$chapter.'&id='.$chapterid.'";
							});
			</script>';
}


if(isset($_POST['delete-member'])){
	
	$id        = $_POST['id'];
	$chapter   = $_POST['chapter'];
	$chapterid = $_POST['chapterid'];
	
	$mysqli->query("DELETE FROM users where user_id   = '$id'");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Member is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "member-list.php?chapter='.$chapter.'&id='.$chapterid.'";
							});
			</script>';
}

if(isset($_POST['approve-member'])){
	
	$id        = $_POST['id'];
	$chapter   = $_POST['chapter'];
	$chapterid = $_POST['chapterid'];
	$name      = $_POST['name'];
	$email     = $_POST['email'];
	$password  = $_POST['password'];
	
	$mysqli->query("UPDATE users set status=0 where user_id   = '$id'");
	
	
	$to = $email;
	$subject = "User Account Details";

	$message = "
	<html>
	<head>
	<title>Account Details</title>
	</head>
	<body>
	<p>
		Good day ". $name ." Your account for the Humanitarian Order of Sierra Falconès, Inc. <br> 
		have been created and you can log in to your account using this " . $email. " and password ". $password." in sierrafalcones.org
		<br>
		If there any error loggin in, please contact an officer in your chapter. Thank you and welcome!
	</p>
	
	</body>
	</html>
	";

	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: <sierrafalcones@gmail.com>' . "\r\n";

	mail($to,$subject,$message,$headers);	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Member is Successfully Approved",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "member-list.php?chapter='.$chapter.'&id='.$chapterid.'";
							});
			</script>';
}