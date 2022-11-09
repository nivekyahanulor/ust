<?php
include('../controller/database.php');

$id = $_GET['certificate_id'];
$certificate_file = $mysqli->query("SELECT * from certificate where certificate_id='$id'");


if(isset($_POST['submit-photo'])){
	
	$id       = $_POST['id'];
	$title    = $_POST['title'];
	
		
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	move_uploaded_file($_FILES["image"]["tmp_name"], "assets/advocacy/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	

	$mysqli->query("INSERT INTO advocacy_photo (advocacy_id , photo ) 
	VALUES ('$id','$location')");
	

	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Photo is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "advocacy-photo.php?advocacy='.$id.'&title='.$title.'";
							});
			</script>';
	
}

if(isset($_POST['delete-photo'])){
	
	$id       = $_POST['id'];
	$aid      = $_POST['aid'];
	$title    = $_POST['title'];

	$mysqli->query("DELETE FROM  advocacy_photo where id ='$id' ");
	
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Photo is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "advocacy-photo.php?advocacy='.$aid.'&title='.$title.'";
							});
			</script>';
	
}
