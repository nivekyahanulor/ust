<?php
error_reporting(0);
include('database.php');

if($_SESSION['role'] ==1){
	$advocacy  = $mysqli->query("SELECT * from advocacy");	
} else {
	$chapter   = $_SESSION['chapter'];
	$advocacy  = $mysqli->query("SELECT * from advocacy where advocacy_chapter='$chapter'");	

}

								