<?php
include('../controller/database.php');


$whatwedo = $mysqli->query("SELECT * from whatwedo");



if(isset($_POST['submit-whatwedo'])){

	$description    = $_POST['description'];
	$title          = $_POST['title'];
	
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	move_uploaded_file($_FILES["image"]["tmp_name"], "assets/whatwedo/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];
	
	
	$mysqli->query("INSERT INTO whatwedo (photo,description,title)
								VALUES ('$location','$description','$title')");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "whatwedo.php";
							});
			</script>';
	
}

if(isset($_POST['update-whatwedo'])){
	
	$id          = $_POST['id'];
	$letter      = $_POST['letter'];
	$description = $_POST['description'];
	$title       = $_POST['title'];

	if($letter ==""){
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/whatwedo/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else{
			if( $_FILES["image"]["name"] == ""){
					$location = $letter;
			} else {
					$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$image_name = addslashes($_FILES['image']['name']);
					$image_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "assets/whatwedo/" . $_FILES["image"]["name"]);
					$location   =  $_FILES["image"]["name"];
			}
	}
	
	$mysqli->query("UPDATE  whatwedo  set 
										photo = '$location' ,
										description = '$description' ,
										title = '$title' 
										where id   = '$id'
									");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "whatwedo.php";
							});
			</script>';
	
}

if(isset($_POST['delete-whatwedo'])){
	

	$id         = $_POST['id'];
	
	
	$mysqli->query("DELETE FROM  whatwedo  where id   = '$id'");
								
			echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "whatwedo.php";
							});
			</script>';
			
			
	
}