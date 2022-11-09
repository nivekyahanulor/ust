<?php
include('../controller/database.php');
error_reporting(0);
error_reporting(0);

$announcement = $mysqli->query("SELECT * from donation");



if(isset($_POST['add-donation'])){
	
	$title         = $_POST['title'];
	$content       = $_POST['content'];
	$username1     = $_SESSION['name'];
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/donation/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	$mysqli->query("INSERT INTO donation (title , link_url,image) 
					VALUES ('$title','$content','$location') ");
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Add Details For Donation $title',1) ");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Details is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "donation.php";
							});
			</script>';
	
}

if(isset($_POST['update-donation'])){
	
	$title         = $_POST['title'];
	$content       = $_POST['content'];
	$id            = $_POST['id'];	
	$letter        = $_POST['image1'];
	$username1     = $_SESSION['name'];
	if($letter ==""){
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/donation/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else{
			if( $_FILES["image"]["name"] == ""){
					$location = $letter;
				} else {
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name = addslashes($_FILES['image']['name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "assets/donation/" . $_FILES["image"]["name"]);
					$location   =  $_FILES["image"]["name"];
			}
	}
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Update Details For Donation $title',1) ");
	$mysqli->query("UPDATE  donation  SET 
									title = '$title' , 
									link_url = '$content' ,  
									image = '$location'
									where donation_id    = '$id'
									");
						
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "donation.php";
							});
			</script>';
}


if(isset($_POST['delete-donation'])){
	
	$id       = $_POST['id'];
	$username1     = $_SESSION['name'];
	$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username1','Delete Donation Shop',1) ");
	$mysqli->query("DELETE FROM donation where donation_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "donation.php";
							});
			</script>';
}