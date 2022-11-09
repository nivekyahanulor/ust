<?php

	ob_start();
	session_start();
	include('database.php');

	$firstname = mysqli_real_escape_string($mysqli,$_POST['firstname']);
	$lastname  = mysqli_real_escape_string($mysqli,$_POST['lastname']);
	$role      = mysqli_real_escape_string($mysqli,$_POST['role']);
	$email     = mysqli_real_escape_string($mysqli,$_POST['email']);
	$username  = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password  = mysqli_real_escape_string($mysqli,$_POST['password']);


	

	$sql      = "INSERT INTO users (fname,lname,role,email,username,password,status)
					VALUES ('$firstname','$lastname','$role','$email','$username','$password',1)";
	$result   = mysqli_query($mysqli, $sql);

	
	header("location:../login.php?success");
