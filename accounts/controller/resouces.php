<?php
include('../controller/database.php');




if ($_SESSION['role'] == 1) {
	$resource = $mysqli->query("SELECT * from sponsor order by sponsor_id asc");
} else {
	$chapter  = $_SESSION['chapter'];
	$resource = $mysqli->query("SELECT * from sponsor where sponsor_chapter='$chapter' order by sponsor_id asc");
}

$resource1 = $mysqli->query("SELECT * from resource");

$released = $mysqli->query("SELECT * from released");

$schapter  = $_SESSION['chapter'];
$creport = $mysqli->query("SELECT * from committee_report where chapter='$schapter'");

$moa = $mysqli->query("SELECT * from partnership where partnership_status='Approved' and is_moa=1");

$partnerslist = $mysqli->query("SELECT * from partnership where partnership_status='Approved' and is_partner=1");

$advo_id = $mysqli->query("SELECT advocacy from committee_report");

$comm = $mysqli->query("SELECT * from committee_report");

if (isset($_POST['delete-committee-report'])) {


	$id        = $_POST['id'];
	$advo_name        = $_POST['advo_name'];


	$mysqli->query("DELETE FROM committee_report
							WHERE report_id='$id'");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "committee-report.php";
							});
			</script>';
}
if (isset($_POST['update-committee-report'])) {

	$new_name  = $_POST['new_name'];
	$report    = $_POST['report'];
	$date      = $_POST['date'];
	$id        = $_POST['id'];



	$mysqli->query("UPDATE committee_report SET  
							report_by = '$new_name',
							report = '$report',
							report_date = '$date'
							WHERE report_id='$id'");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "committee-report.php";
							});
			</script>';
}

if (isset($_POST['verif-committee-report'])) {

	$new_new_name  = $_POST['new_new_name'];
	$new_report    = $_POST['new_report'];
	$new_date      = $_POST['new_date'];
	$new_id        = $_POST['new_id'];
	$status        = $_POST['status'];
	$note        = $_POST['note'];
	$ad          = $_POST['ad'];




	$mysqli->query("UPDATE committee_report SET  
							report_verified_by = '$new_new_name',
							report = '$new_report',
							report_date = '$new_date',
							rep_note = '$note',
							rep_status = '$status'
							WHERE report_id='$new_id'");

	if (($_POST['status'] == 'Approved')) {
		$mysqli->query("UPDATE advocacy set advocacy_status ='100' where advocacy_title='$ad'");
	}

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "committee-report.php";
							});
			</script>';
}

if (isset($_POST['submit-committee-report'])) {

	$advocacy  = $_POST['advocacy'];
	$chapter   = $_POST['chapter'];
	$report    = $_POST['report'];
	$date      = $_POST['date'];
	$name      = $_SESSION["name"];


	$mysqli->query("INSERT INTO committee_report (report_by , chapter ,  advocacy,report,report_date, rep_note, rep_status, report_verified_by) 
							VALUES ('$name','$chapter','$advocacy','$report','$date', '', 'For Checking', '')");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "committee-report.php";
							});
			</script>';
}

if (isset($_POST['submit-resources'])) {

	$advocacy  = $_POST['advocacy'];
	$chapter   = $_POST['chapter'];
	$sponsor   = $_POST['sponsor'];
	$resources = $_POST['resources'];
	$qty       = $_POST['qty'];
	$date      = date('F d,Y - H:i:s A', time());
	$name      = $_SESSION["name"];
								


	$mysqli->query("INSERT INTO sponsor (sponsor_advocacy , sponsor_name ,  sponsor_chapter,sponsor_supplies,sponsor_qty,sponsor_date,sponsor_added_by,sponsor_status) 
							VALUES ('$advocacy','$sponsor','$chapter','$resources','$qty','$date','$name','0')");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources.php";
							});
			</script>';
}

if (isset($_POST['submit-assigned-resources'])) {

	$advocacy    = $_POST['advocacy'];
	$resouces    = $_POST['resouces'];
	$qty         = $_POST['qty'];
	$partner     = $_POST['partner'];
	$description = $_POST['description'];
	$date        = date('F d,Y - H:i:s A', time());
	$name        = $_SESSION["name"];


	$mysqli->query("INSERT INTO resource (resource_advo , resource_desc ,  resource_needed,resource_qty,resource_partners,resource_status,resource_user,resource_date) 
							VALUES ('$advocacy','$description','$resouces','$qty','$partner','For Checking','$name','$date')");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "assigned-resources.php";
							});
			</script>';
}

if (isset($_POST['submit-released-resources'])) {

	$advocacy    = $_POST['advocacy'];
	$resouces    = $_POST['resouces'];
	$qty         = $_POST['qty'];
	$partner     = $_POST['partner'];
	$description = $_POST['description'];
	$date        = $_POST['date'];
	$date1       = date('F d,Y - H:i:s A', time());
	$name        = $_SESSION["name"];


	$mysqli->query("INSERT INTO released (released_advo , released_desc ,  released_reso,released_qty,released_partner,released_status,released_added_by,released_date,released_update) 
							VALUES ('$advocacy','$description','$resouces','$qty','$partner','For Checking','$name','$date','$date1')");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "released-resources.php";
							});
			</script>';
}

if (isset($_POST['update-assigned-resources'])) {

	$advocacy    = $_POST['advocacy'];
	$resouces    = $_POST['resouces'];
	$qty         = $_POST['qty'];
	$partner     = $_POST['partner'];
	$description = $_POST['description'];
	$id          = $_POST['id'];
	$date        = date('F d,Y - H:i:s A', time());
	$name        = $_SESSION['name'];
	$rnote       = $_POST['note'];
	$status      = $_POST['status'];
	$verdict_from= $_SESSION['name'];

	if ($_SESSION['position'] == 1) {
		//$mysqli->query("UPDATE resource SET
		//	resource_status = '$status'
		//	WHERE resource_id = '$id'");
		$mysqli->query("UPDATE resource SET resource_advo = '$advocacy' , 
										resource_desc = '$description', 
										resource_needed = '$resouces',
										resource_qty = '$qty',
										resource_partners = '$partner',
										resource_user = '$name',
										resource_date = '$date'
										WHERE resource_id = '$id'");
	} else {
		$mysqli->query("UPDATE resource SET resource_advo = '$advocacy' , 
										resource_desc = '$description', 
										resource_needed = '$resouces',
										resource_qty = '$qty',
										resource_partners = '$partner',
										resource_status = '$status',
										resource_date = '$date',
										resource_note  = '$rnote',
										resource_verified_by = '$verdict_from'
										WHERE resource_id = '$id'");
	}
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "assigned-resources.php";
							});
			</script>';
}
if (isset($_POST['update-released-resources'])) {

	$advocacy    = $_POST['advocacy'];
	$resouces    = $_POST['resouces'];
	$qty         = $_POST['qty'];
	$partner     = $_POST['partner'];
	$description = $_POST['description'];
	$id          = $_POST['id'];
	$date        = $_POST['date'];
	$date1       = date('F d,Y - H:i:s A', time());
	$name        = $_SESSION["name"];
	$status = $_POST['status'];
	$rrnote      = $_POST['rrnote'];
	$verdict_by  = $_SESSION['name'];

	if ($_SESSION['position'] == 1) {

		$mysqli->query("UPDATE released SET
										released_advo = '$advocacy' , 
										released_desc = '$description', 
										released_reso = '$resouces',
										released_qty = '$qty',
										released_partner = '$partner',
										released_date = '$date',
										released_note = '$rrnote',
										released_verdict_by = '$verdict_by',
										released_status = '$status'
										WHERE released_id  = '$id'");
	} else {
		$mysqli->query("UPDATE released SET released_advo = '$advocacy' , 
										released_desc = '$description', 
										released_reso = '$resouces',
										released_qty = '$qty',
										released_partner = '$partner',
										released_status = 'For Checking',
										released_added_by = '$name',
										released_date = '$date',
										released_update = '$date1'
										WHERE released_id = '$id'");
	}
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "released-resources.php";
							});
			</script>';
}

if (isset($_POST['delete-assigned-resources'])) {

	$id          = $_POST['id'];


	$mysqli->query("DELETE FROM resource WHERE resource_id = '$id'");
	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "assigned-resources.php";
							});
			</script>';
}

if (isset($_POST['update-advocacy'])) {

	$sponsor   = $_POST['sponsor'];
	$resources = $_POST['resources'];
	$qty       = $_POST['qty'];
	$id        = $_POST['id'];


	$mysqli->query("UPDATE  sponsor  SET 
										sponsor_name = '$sponsor' , 
										sponsor_supplies = '$resources' ,  
										sponsor_qty = '$qty'
										where sponsor_id   = '$id'
									");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources.php";
							});
			</script>';
}


if (isset($_POST['delete-resources'])) {

	$id       = $_POST['id'];


	$mysqli->query("DELETE FROM  sponsor where sponsor_id  = '$id'");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources.php";
							});
			</script>';
}

if (isset($_POST['delete-released-resources'])) {

	$id       = $_POST['id'];


	$mysqli->query("DELETE FROM  released where released_id  = '$id'");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Resources is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "released-resources.php";
							});
			</script>';
}

if (isset($_POST['update-step1'])) {

	$resources = $_POST['resources'];
	$qty       = $_POST['qty'];
	$mot       = $_POST['mot'];
	$dot       = $_POST['dot'];
	$id        = $_POST['id'];
	$updatedby = $_SESSION['name'];
	$letter    = $_POST['pot'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}

	$mysqli->query("UPDATE  sponsor  SET 
										sponsor_supplies = '$resources' , 
										sponsor_qty = '$qty',
										sponsor_pot = '$location',
										mot = '$mot',
										transaction_date = '$dot',
										sponsor_status = '33',
										sponsor_added_by = '$updatedby'
										where sponsor_id   = '$id'
									");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources-reports.php";
							});
			</script>';
}

if (isset($_POST['update-step2'])) {

	$recieve_via   = $_POST['recieve_via'];
	$date_received = $_POST['date_received'];
	$resources = $_POST['resources'];
	$qty       = $_POST['qty'];
	$id        = $_POST['id'];
	$upby     = $_SESSION['name'];
	$letter    = $_POST['pot'];

	if ($letter == "") {
		$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name = addslashes($_FILES['image']['name']);
		$image_size = getimagesize($_FILES['image']['tmp_name']);
		move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
		$location   =  $_FILES["image"]["name"];
	} else {
		if ($_FILES["image"]["name"] == "") {
			$location = $letter;
		} else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
			$location   =  $_FILES["image"]["name"];
		}
	}

	$mysqli->query("UPDATE  sponsor  SET 
										sponsor_supplies = '$resources' , 
										sponsor_qty = '$qty',
										recieve_via = '$recieve_via',
										date_received = '$date_received',
										sponsor_pot = '$location',
										sponsor_status = '66',
										sponsor_added_by = '$upby'
										where sponsor_id   = '$id'
									");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources-reports.php";
							});
			</script>';
}

if (isset($_POST['update-step3'])) {

	$personel   = $_POST['personel3'];
	$notes      = $_POST['notes'];
	$status     = $_POST['status'];
	$id         = $_POST['id'];
	$sponsor_advocacy  = $_POST['sponsor_advocacy'];

	if ($status == 'Pending') {
		$mysqli->query("UPDATE  sponsor  SET 
										verdict_from = '$personel',
										notes = '$notes',
										status = '$status',
										sponsor_status ='67'
										where sponsor_id   = '$id'
									");
		echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources-reports.php";
							});
			</script>';
	} else if ($status == 'Disapprove') {

		$mysqli->query("UPDATE  sponsor  SET 
										sponsor_status = '0'
										where sponsor_id   = '$id'
									");

		echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources-reports.php";
							});
			</script>';
	} else {

		$mysqli->query("UPDATE  sponsor  SET 
										verdict_from = '$personel',
										notes = '$notes',
										status = '$status',
										sponsor_status = '100'
										where sponsor_id   = '$id'
									");

		$mysqli->query("UPDATE  advocacy  SET 
										advocacy_status = '25'
										where advocacy_title   = '$sponsor_advocacy'
									");

		echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources-reports.php";
							});
			</script>';
	}
}

if (isset($_POST['delete-reports'])) {


	$id         = $_POST['id'];


	$mysqli->query("DELETE FROM  sponsor  where sponsor_id   = '$id'");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "resources-reports.php";
							});
			</script>';
}
