<?php
include('../controller/database.php');

$certificate = $mysqli->query("SELECT * from certificate");

$creport = $mysqli->query("SELECT * from committee_report");

$moa = $mysqli->query("SELECT * from partnership where partnership_status='Approved' and is_moa=1");

$partnerslist = $mysqli->query("SELECT * from partnership where partnership_status='Approved' and is_partner=1");


if (isset($_POST['submit-certificate'])) {

	$name      = $_POST['name'];
	$advocacy  = $_POST['advocacy'];
	$chapter   = $_POST['chapter'];
	$role      = $_POST['role'];
	$date      = $_POST['date'];
	$by        = $_SESSION['name'];

	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);
	move_uploaded_file($_FILES["image"]["tmp_name"], "assets/documents/" . $_FILES["image"]["name"]);
	$location   =  $_FILES["image"]["name"];

	$image1 = addslashes(file_get_contents($_FILES['image1']['tmp_name']));
	$image_name = addslashes($_FILES['image1']['name']);
	$image_size = getimagesize($_FILES['image1']['tmp_name']);
	move_uploaded_file($_FILES["image1"]["tmp_name"], "assets/documents/" . $_FILES["image1"]["name"]);
	$location1   =  $_FILES["image1"]["name"];

	$image2 = addslashes(file_get_contents($_FILES['image2']['tmp_name']));
	$image_name = addslashes($_FILES['image2']['name']);
	$image_size = getimagesize($_FILES['image2']['tmp_name']);
	move_uploaded_file($_FILES["image2"]["tmp_name"], "assets/documents/" . $_FILES["image2"]["name"]);
	$location2   =  $_FILES["image2"]["name"];

	$image3 = addslashes(file_get_contents($_FILES['image3']['tmp_name']));
	$image_name = addslashes($_FILES['image3']['name']);
	$image_size = getimagesize($_FILES['image3']['tmp_name']);
	move_uploaded_file($_FILES["image3"]["tmp_name"], "assets/documents/" . $_FILES["image3"]["name"]);
	$location3   =  $_FILES["image3"]["name"];

	$image4 = addslashes(file_get_contents($_FILES['image4']['tmp_name']));
	$image_name = addslashes($_FILES['image4']['name']);
	$image_size = getimagesize($_FILES['image4']['tmp_name']);
	move_uploaded_file($_FILES["image4"]["tmp_name"], "assets/documents/" . $_FILES["image4"]["name"]);
	$location4   =  $_FILES["image4"]["name"];

	$image5 = addslashes(file_get_contents($_FILES['image5']['tmp_name']));
	$image_name = addslashes($_FILES['image5']['name']);
	$image_size = getimagesize($_FILES['image5']['tmp_name']);
	move_uploaded_file($_FILES["image5"]["tmp_name"], "assets/documents/" . $_FILES["image5"]["name"]);
	$location5   =  $_FILES["image5"]["name"];

	$image6 = addslashes(file_get_contents($_FILES['image6']['tmp_name']));
	$image_name = addslashes($_FILES['image6']['name']);
	$image_size = getimagesize($_FILES['image6']['tmp_name']);
	move_uploaded_file($_FILES["image6"]["tmp_name"], "assets/documents/" . $_FILES["image6"]["name"]);
	$location6   =  $_FILES["image6"]["name"];


	$mysqli->query("INSERT INTO certificate (certificate_name,certificate_chapter , certificate_advo,certificate_role,
											certificate_cert,certificate_cert1,certificate_cert2,certificate_cert3,certificate_cert4,certificate_cert5,certificate_cert6,certificate_date,certificate_by)
								VALUES ('$name','$chapter','$advocacy','$role'
										,'$location','$location1','$location2','$location3','$location4','$location5','$location6','$date','$by')");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Added",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "certification.php";
							});
			</script>';
}

if (isset($_POST['update-certificate'])) {

	$id        = $_POST['id'];
	$letter    = $_POST['letter'];

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

	$mysqli->query("UPDATE  certificate  set 
										certificate_cert = '$location' 
										where certificate_id   = '$id'
									");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Updated",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "certification.php";
							});
			</script>';
}

if (isset($_POST['delete-certificate'])) {


	$id         = $_POST['id'];


	$mysqli->query("DELETE FROM  certificate  where certificate_id   = '$id'");

	echo '  <script>
					Swal.fire({
							title: "Success! ",
							text: "Data is Successfully Deleted",
							icon: "success",
							type: "success"
							}).then(function(){
								window.location = "certification.php";
							});
			</script>';
}
