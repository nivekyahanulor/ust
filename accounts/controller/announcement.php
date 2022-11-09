<?php
include('../controller/database.php');
error_reporting(0);
error_reporting(0);

$announcement = $mysqli->query("SELECT * from announcement");



if(isset($_POST['add-announcement'])){
	
	$title         = $_POST['title'];
	$content       = $_POST['content'];
	$username1     = $_SESSION['name'];
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/announcement/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	$mysqli->query("INSERT INTO announcement (title , description,image) 
					VALUES ('$title','$content','$location') ");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Add New Event $title',1) ");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Announcement is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "announcement.php";
							});
			</script>';
	
}

if(isset($_POST['update-announcement'])){
	
	$title         = $_POST['title'];
	$content       = $_POST['content'];
	$id            = $_POST['id'];	
	$letter        = $_POST['image1'];
	$username1     = $_SESSION['name'];
	if($letter ==""){
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/announcement/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else{
			if( $_FILES["image"]["name"] == ""){
					$location = $letter;
				} else {
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name = addslashes($_FILES['image']['name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "assets/announcement/" . $_FILES["image"]["name"]);
					$location   =  $_FILES["image"]["name"];
			}
	}
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Update Event $title',1) ");
	$mysqli->query("UPDATE  announcement  SET 
									title = '$title' , 
									description = '$content' ,  
									image = '$location'
									where announcement_id    = '$id'
									");
						
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Announcement is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "announcement.php";
							});
			</script>';
}


if(isset($_POST['delete-announcement'])){
	
	$id       = $_POST['id'];
	$username1     = $_SESSION['name'];
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Delete Event',1) ");
	$mysqli->query("DELETE FROM announcement where announcement_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Announcement Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "announcement.php";
							});
			</script>';
}