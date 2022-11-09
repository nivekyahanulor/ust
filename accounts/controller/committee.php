<?php
include('../controller/database.php');

error_reporting(0);

if ($_SESSION['role'] == 1) {
	$committee = $mysqli->query("SELECT * from committee");
} else {
	$chapter = $_SESSION['chapter'];
	$committee = $mysqli->query("SELECT * from committee where comm_chap ='$chapter'");
}
$officer = $mysqli->query("SELECT * from user_account");
$user = $mysqli->query("SELECT * from users");

if (isset($_POST['update-officer'])) {

	$fname         = $_POST['fname'];
	$mname         = $_POST['mname'];
	$lname         = $_POST['lname'];
	$aadvocacy           = $_POST['aadvocacy'];
	$contactnumber = $_POST['contactnumber'];
	$email         = $_POST['email'];
	$password      = $_POST['password'];
	$address       = $_POST['address'];
	$id            = $_POST['id'];
	$letter        = $_POST['logo'];
	
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
	
		$mysqli->query("UPDATE  user_account  SET 
									fname = '$fname' , 
									mname = '$mname' ,  
									lname = '$lname',
									advocacy = '$aadvocacy',
									number = '$contactnumber',
									address = '$address',
									username = '$email',
									profile = '$location',
									password = '$password'
									where u_id   = '$id'
									");
									
								
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "User is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "profile.php";
							});
			</script>';
}
if (isset($_POST['update-member'])) {

	$ffname         = $_POST['ffname'];
	$mmname         = $_POST['mmname'];
	$llname         = $_POST['llname'];
	$aage           = $_POST['age'];
	$ccontactnumber = $_POST['ccontactnumber'];
	$eemail         = $_POST['eemail'];
	$ppassword      = $_POST['ppassword'];
	$aaddress       = $_POST['aaddress'];
	$iid            = $_POST['iid'];
	$advocacy       = $_POST['advocacy'];
	$lletter        = $_POST['llogo'];
	
	if($lletter ==""){
		$iimage = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$iimage_name = addslashes($_FILES['image']['name']);
		$iimage_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/profile/" . $_FILES["image"]["name"]);
		$llocation   =  $_FILES["image"]["name"];
	} else{
			if( $_FILES["image"]["name"] == ""){
					$llocation = $lletter;
				} else {
					$iimage = addslashes(file_get_contents($_FILES['image']['tmp_name']));
					$iimage_name = addslashes($_FILES['image']['name']);
					$iimage_size = getimagesize($_FILES['image']['tmp_name']);
					move_uploaded_file($_FILES["image"]["tmp_name"], "assets/profile/" . $_FILES["image"]["name"]);
					$llocation   =  $_FILES["image"]["name"];
			}
	}
	
		$mysqli->query("UPDATE  users  SET 
									fname = '$ffname' , 
									mname = '$mmname' ,  
									lname = '$llname',
									contact = '$ccontactnumber',
									address = '$aaddress',
									age = '$aage',
									advocacy = '$advocacy',
									email = '$eemail',
									profile_picture = '$llocation',
									password = '$ppassword'
									where user_id   = '$iid'
									");
									
								
	
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "User is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "profile.php";
							});
			</script>';
}

if (isset($_POST['submit-chapter'])) {

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

if (isset($_POST['update-chapter'])) {


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

if (isset($_POST['delete-chapter'])) {

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

if (isset($_POST['update-committee'])) {


	$id       = $_POST['committee_id'];
	$pc       = $_POST['pc'];
	$rc       = $_POST['rc'];
	$cl       = $_POST['cl'];
	$con      = $_POST['con'];
	$cfd      = $_POST['cfd'];
	$kc       = $_POST['kc'];
	$ccc      = $_POST['ccc'];
	$notes    = $_POST['notes'];
	$advocacy_id    = $_POST['advocacy_id'];


	$mysqli->query("UPDATE users set program_committee =1 WHERE CONCAT( fname,  ' ', lname ) = '$pc'");
	$mysqli->query("UPDATE users set program_committee =1 WHERE CONCAT( fname,  ' ', lname ) = '$rc'");
	$mysqli->query("UPDATE users set program_committee =1 WHERE CONCAT( fname,  ' ', lname ) = '$cl'");
	$mysqli->query("UPDATE users set program_committee =1 WHERE CONCAT( fname,  ' ', lname ) = '$con'");
	$mysqli->query("UPDATE users set program_committee =1 WHERE CONCAT( fname,  ' ', lname ) = '$cfd'");
	$mysqli->query("UPDATE users set program_committee =1 WHERE CONCAT( fname,  ' ', lname ) = '$kc'");
	$mysqli->query("UPDATE users set program_committee =1 WHERE CONCAT( fname,  ' ', lname ) = '$ccc'");


	$mysqli->query("UPDATE  committee  SET 
									comm_proj_comm = '$pc' ,
									comm_reg_comm = '$rc' ,
									comm_comm_log = '$cl' ,
									comm_comm_fac = '$con' ,
									comm_comm_doc = '$cfd' ,
									comm_kitc_comm = '$kc' ,
									comm_cro_con = '$ccc' ,
									comm_decrip = '$notes' ,
									comm_status = 'Active' 
									where committee_id    = '$id'
									");

	$mysqli->query("UPDATE  advocacy  SET 
									advocacy_status = '50'
									where advocacy_id    = '$advocacy_id'
									");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Program Committee is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "program-committee.php";
							});
			</script>';
}
