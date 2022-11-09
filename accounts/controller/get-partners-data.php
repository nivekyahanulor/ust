<?php
include('../../controller/database.php');


$partners = $_POST['partners'];
$chapter  = $mysqli->query("SELECT * from sponsor where sponsor_name='$partners'");
while($val = $chapter->fetch_object()){

	$row[] = $val;

}
echo json_encode($row);