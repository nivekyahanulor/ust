<?php

	ob_start();
	session_start();
	include('database.php');

	$username = mysqli_real_escape_string($mysqli,$_POST['username']);
	$password = mysqli_real_escape_string($mysqli,($_POST['password']));

	$sql      = "SELECT * FROM user_account WHERE username='$username' AND  password='$password' ";
	$result   = mysqli_query($mysqli, $sql);

	$row      = mysqli_fetch_assoc($result);
	$rows	  = mysqli_num_rows($result);
	
	if($rows==1){
		$_SESSION['name']  = $row['fname'] .' '. $row['mname'] .' '. $row['lname'];
		$_SESSION['type']  = $row['position'];
		$_SESSION['id']    = $row['u_id'];
		$_SESSION['position']    = $row['position'];
		$username    = $row['username'];
		$name    = $row['fname'] .' '. $row['mname'] .' '. $row['lname'];
		$_SESSION['role']  = 1;
		$mysqli->query("INSERT INTO history (user_name, name , status	) VALUES ('$username','$name','Login Success') ");
		$mysqli->query("INSERT INTO history (user_name, status, code	) VALUES ('$username','Login to System',1) ");
		header("location:../accounts/index.php");
	}
	else {
		$sql      = "SELECT * FROM users WHERE username='$username' AND BINARY password='$password' and is_confirm=1";
		$result   = mysqli_query($mysqli, $sql);

		$row      = mysqli_fetch_assoc($result);
		$rows	  = mysqli_num_rows($result);
		if($rows==1){
			$_SESSION['name']       = $row['fname'] .' '. $row['lname'];
			$_SESSION['fname'] 		= $row['fname'];
			$_SESSION['lname'] 		= $row['lname'];
			$_SESSION['email'] 		= $row['email'];
			$_SESSION['role'] 		= 2;
			$_SESSION['id']    		= $row['user_id'];
			$_SESSION['memberrole'] = $row['role'];
			header("location:../accounts/home.php");
		} else {
			$mysqli->query("INSERT INTO history (user_name, name , status	) VALUES ('$username','---','Login Failed') ");
			header("location:../login.php?error");
		}
	}
