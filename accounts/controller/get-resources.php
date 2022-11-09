<?php
include('../../controller/database.php');


$advocacy = $_POST['advocacy'];
$chapter  = $mysqli->query("SELECT * from sponsor where sponsor_advocacy='$advocacy'");
while($val = $chapter->fetch_object()){

	$row[] = $val->sponsor_name;

}
echo json_encode($row);