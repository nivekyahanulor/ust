<?php
include('../controller/database.php');

error_reporting(0);

$chapter = $mysqli->query("SELECT * from chapter");



if(isset($_POST['submit-chapter'])){
	
	$chapter   = $_POST['chapter'];
	$name      = $_SESSION["name"];
	$date      = date('F d,Y - H:i:s A', time());
	
	$mysqli->query("INSERT INTO chapter (chapter_name , chapter_date_by ,  chapter_added_by) 
					VALUES ('$chapter','$date','$name') ");
				
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Chapter is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "chapter.php";
							});
			</script>';
	
}

if(isset($_POST['update-chapter'])){
	
	
	$id             = $_POST['id'];
	$chapters       = $_POST['chapter'];
	
	$mysqli->query("UPDATE  chapter  SET 
									chapter_name = '$chapters' 
									where chapter_id   = '$id'
									");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Chapter is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "chapter.php";
							});
			</script>';
}

if(isset($_POST['delete-chapter'])){
	
	$id       = $_POST['id'];

	
	$mysqli->query("DELETE FROM chapter where chapter_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Chapter is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "chapter.php";
							});
			</script>';
}