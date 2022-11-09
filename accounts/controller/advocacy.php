<?php
include('../controller/database.php');

if($_SESSION['role'] ==1){
	$advocacy = $mysqli->query("SELECT * from advocacy order by advocacy_id DESC");
} else {
	$chapter  = $_SESSION['chapter'];
	$advocacy = $mysqli->query("SELECT * from advocacy where advocacy_chapter='$chapter' order by advocacy_id DESC");
}

if(isset($_POST['submit-advocacy'])){
	
	$title       = $_POST['title'];
	$chapter     = $_POST['chapter'];
	$description = $_POST['description'];
	$date        = $_POST['date'];
	$name        = $_SESSION["name"];
	$date1       = date('F d,Y - H:i:s A', time());

	$mysqli->query("INSERT INTO advocacy (advocacy_title , advocacy_sub_title ,  advocacy_status,advocacy_chapter,advocacy_schedule_date,advocacy_date_up,advocacy_date_by) 
	VALUES ('$title','$description','0','$chapter','$date','$date1','$name')");

	$adid = $mysqli->insert_id;
	
	$mysqli->query("INSERT INTO committee (comm_ad , comm_chap, advocacy_id ) 
	VALUES ('$title','$chapter','$adid')");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Your Advocacy is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "advocacy.php";
							});
			</script>';
	
}

if(isset($_POST['delete-advocacy'])){
	
	$id       = $_POST['id'];
	$advocacy_title       = $_POST['advocacy_title'];

	$mysqli->query("DELETE FROM  advocacy where advocacy_id ='$id' ");
	$mysqli->query("DELETE FROM sponsor WHERE sponsor_advocacy ='$advocacy_title'");
	$mysqli->query("DELETE FROM committee WHERE advocacy_id ='$id'");
	
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: " Advocacy is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "advocacy.php";
							});
			</script>';
	
}

if(isset($_POST['update-advocacy'])){
	
	$id          = $_POST['id'];
	$title       = $_POST['title'];
	$chapter     = $_POST['chapter'];
	$description = $_POST['description'];
	$date        = $_POST['date'];
	$name        = $_SESSION["name"];
	$date1       = date('F d,Y - H:i:s A', time());

	$mysqli->query("UPDATE  advocacy SET advocacy_title ='$title', 
										 advocacy_sub_title ='$description' ,
										 advocacy_chapter ='$chapter',
										 advocacy_schedule_date='$date'
										 WHERE advocacy_id ='$id'
					");
				
	$mysqli->query("UPDATE  committee SET comm_ad ='$title', 
										 comm_chap ='$chapter'
										 WHERE advocacy_id ='$id'
					");
		
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Your Advocacy is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "advocacy.php";
							});
			</script>';
	
}