<?php

	ob_start();
	session_start();
	include('database.php');

	$user_id = $_POST['user_id'];
	$survey1 = $_POST['survey1'];
	$survey2 = $_POST['survey2'];
	$survey3 = $_POST['survey3'];
	$survey4 = $_POST['survey4'];
	$survey5 = $_POST['survey5'];
	$improve = $_POST['improve'];

	$sql      = "INSERT INTO survey (survey1,survey2,survey3,survey4,survey5,improve,user_id)
					VALUES ('$survey1','$survey2','$survey3','$survey4','$survey5','$improve','$user_id')";
	$result   = mysqli_query($mysqli, $sql);
	
	echo "<script> 	alert('Survey submitted. Thank You!');window.location.href='../index.php?success';</script>";
	// header("location:../index.php?success");
