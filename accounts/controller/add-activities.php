<?php

	include('../../controller/database.php');

	error_reporting(0);


	$id             = $_POST['id'];
	$activity       = $_POST['activity'];
	
	$mysqli->query("UPDATE  advocacy  SET 
									activities = '$activity' ,
									advocacy_status ='75'
									where advocacy_id    = '$id'
									");
									
	
	echo '  <script>
				window.location.href="../schedule.php?added";
			</script>';
