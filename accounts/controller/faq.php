<?php
include('../controller/database.php');

error_reporting(0);

$announcement = $mysqli->query("SELECT * from faq");



if(isset($_POST['add-faq'])){
	
	$title         = $_POST['title'];
	$content       = $_POST['content'];
	
	$mysqli->query("INSERT INTO faq (title , content) 
					VALUES ('$title','$content') ");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New FAQ is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "faq.php";
							});
			</script>';
	
}

if(isset($_POST['update-faq'])){
	
	$title         = $_POST['title'];
	$content       = $_POST['content'];
	$id            = $_POST['faq_id'];	
	
	
	$mysqli->query("UPDATE  faq  SET 
									title = '$title' , 
									content = '$content' 
									where faq_id    = '$id'
									");
						
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "FAQ is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "faq.php";
							});
			</script>';
}


if(isset($_POST['delete-faq'])){
	
	$id       = $_POST['id'];

	
	$mysqli->query("DELETE FROM faq where faq_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "FAQ Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "faq.php";
							});
			</script>';
}