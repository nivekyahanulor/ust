<?php
include('../controller/database.php');

error_reporting(0);

if($_SESSION['role'] == 1){
	if($_SESSION['position'] == 1){
		$presentations = $mysqli->query("SELECT * from presentations where status !=1");
	} else {
		$presentations = $mysqli->query("SELECT * from presentations");
	}
} else {
	
	$chapter = $_SESSION['chapter'];
	$presentations = $mysqli->query("SELECT * from presentations where presentations_chapter='$chapter'");
	
}



if(isset($_POST['add-presentation'])){
	
	$title       = $_POST['title'];
	$chapter     = $_POST['chapter'];
	$description = $_POST['description'];
	$status      = $_POST['status'];
	$name        = $_SESSION["name"];
	$date        = date('F d,Y - H:i:s A', time());
	
	$mysqli->query("INSERT INTO presentations (presentations_title , presentations_chapter ,  presentations_desc,presentations_updated_by,presentations_date,status) 
					VALUES ('$title','$chapter','$description','$name','$date','$status') ");
				
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "New Presentation is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "presentation.php";
							});
			</script>';
	
}

if(isset($_POST['update-presentation'])){
	
	
	$id          = $_POST['id'];
	$title       = $_POST['title'];
	$chapter     = $_POST['chapter'];
	$description = $_POST['description'];
	$status      = $_POST['status'];
	$name        = $_SESSION["name"];
	
	if($_SESSION['position'] ==1){
		
	$date      = $_POST['date'];
	$date1     = date('F d,Y - H:i:s A', time());
	
	$mysqli->query("INSERT INTO advocacy (advocacy_title , advocacy_sub_title ,  advocacy_status,advocacy_chapter,advocacy_schedule_date,advocacy_date_up,advocacy_date_by) 
	VALUES ('$title','$description','0','$chapter','$date','$date1','$name')");
	
	$adid = $mysqli->insert_id;
	
	$mysqli->query("INSERT INTO committee (comm_ad , comm_chap, advocacy_id ) 
	VALUES ('$title','$chapter','$adid')");
	
	$mysqli->query("UPDATE  presentations  SET 
									presentations_title = '$title' ,
									presentations_chapter = '$chapter' ,
									presentations_desc = '$description' ,
									presentations_updated_by = '$name' ,
									status =1
									where presentations_id    = '$id'
									");
									
	
									
	} else {
		
		$mysqli->query("UPDATE  presentations  SET 
									presentations_title = '$title' ,
									presentations_chapter = '$chapter' ,
									presentations_desc = '$description' ,
									presentations_updated_by = '$name' 
									where presentations_id    = '$id'
									");
									
	}					
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Presentation is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "presentation.php";
							});
			</script>';
}

if(isset($_POST['delete-presentation'])){
	
	$id       = $_POST['id'];

	
	$mysqli->query("DELETE FROM presentations where presentations_id  = '$id'");
								
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Chapter is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "presentation.php";
							});
			</script>';
}