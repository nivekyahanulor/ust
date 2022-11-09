<?php
include('../controller/database.php');


$partnership = $mysqli->query("SELECT * from partnership");

$moa = $mysqli->query("SELECT * from partnership where partnership_status='Approved' and is_moa=1");

$partnerslist = $mysqli->query("SELECT * from partnership where partnership_status='Approved' and is_partner=1");


if(isset($_POST['submit-invitation'])){
	
	$invited      = $_POST['invited'];
	$dateinvite   = $_POST['dateinvite'];
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name = addslashes($_FILES['image']['name']);
    $image_size = getimagesize($_FILES['image']['tmp_name']);
    move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	$mysqli->query("INSERT INTO partnership (partnership_name , partnership_file_inv ,  partnership_date_inv,partnership_status) VALUES ('$invited','$location','$dateinvite','Inviting')");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Your Invitation is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "partnership.php";
							});
			</script>';
	
}

if(isset($_POST['update-invitation'])){
	
	$invited        = $_POST['invited'];
	$dateinvite     = $_POST['dateinvite'];
	$letter         = $_POST['letter'];
	$responsedate   = $_POST['responsedate'];
	$status         = $_POST['status'];
	$id             = $_POST['id'];
	$name           = $_SESSION["name"];
	if($letter ==""){
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else{
			if( $_FILES["image"]["name"] == ""){
					$location = $letter;
				} else {
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name = addslashes($_FILES['image']['name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
					$location   =  $_FILES["image"]["name"];
			}
	}
	
	//** RESPONSE **//
	
	$image = addslashes(file_get_contents($_FILES['response']['tmp_name']));
	$image_name = addslashes($_FILES['response']['name']);
	$image_size = getimagesize($_FILES['response']['tmp_name']);
	move_uploaded_file($_FILES["response"]["tmp_name"], "assets/documents/" . $_FILES["response"]["name"]);
	$response   =  $_FILES["response"]["name"];
	
	
	$mysqli->query("UPDATE  partnership  SET 
									partnership_name = '$invited' , 
									partnership_file_inv = '$location' ,  
									partnership_date_inv = '$dateinvite',
									partnership_status = '$status',
									partnership_file_res = '$response',
									partnership_date_res = '$responsedate',
									partnership_update_by = '$name',
									is_moa = '1'
									where partnership_id  = '$id'
									");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Your Invitation is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "partnership.php";
							});
			</script>';
}

if(isset($_POST['update-moa'])){
	
	$dategiven    = $_POST['dategiven'];
	$id           = $_POST['id'];
	$name         = $_SESSION["name"];
	$letter       = $_POST["letter"];
	
	if($letter ==""){
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else{
			if( $_FILES["image"]["name"] == ""){
					$location = $letter;
				} else {
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name = addslashes($_FILES['image']['name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
					$location   =  $_FILES["image"]["name"];
			}
	}
	
	
	
	$mysqli->query("UPDATE  partnership  SET 
									moa_file = '$location' , 
									moa_date_given = '$dategiven' ,  
									moa_date_added = NOW(),
									moa_added_by = '$name',
									moa_updated_by = '$name',
									is_moa = '1',
									is_partners = '1',
									is_partner = '1'
									where partnership_id  = '$id'
									");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "MOA is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "moa.php";
							});
			</script>';
}

if(isset($_POST['update-status'])){
	
	$id       = $_POST['id'];
	$status   = $_POST['status'];

	
	$mysqli->query("UPDATE  partnership  SET 
									is_partners = '$status' 
									where partnership_id  = '$id'
									");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Status is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "partnerslist.php";
							});
			</script>';
}

if(isset($_POST['delete-invitation'])){
	
	$id       = $_POST['id'];

	
	$mysqli->query("DELETE FROM  partnership where partnership_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Invitation is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "partnership.php";
							});
			</script>';
}

if(isset($_POST['delete-moa'])){
	
	$id       = $_POST['id'];

	
	$mysqli->query("DELETE FROM  partnership where partnership_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Invitation is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "moa.php";
							});
			</script>';
}

if(isset($_POST['delete-partnership'])){
	
	$id       = $_POST['id'];

	
	$mysqli->query("DELETE FROM  partnership where partnership_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Invitation is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "partnerslist.php";
							});
			</script>';
}