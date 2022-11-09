<?php
include('../../controller/database.php');


$advocacy = $_POST['advocacy'];
$chapter  = $mysqli->query("SELECT * from advocacy where advocacy_title='$advocacy'");
$row      = $chapter->fetch_assoc();

echo $row['advocacy_chapter'];

