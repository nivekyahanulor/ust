<?php
	include('../controller/database.php');

	error_reporting(0);

	$tickets0 = $mysqli->query("SELECT * from tickets where status = 0");
	$tickets1 = $mysqli->query("SELECT * from tickets where status = 1");
	$tickets2 = $mysqli->query("SELECT * from tickets where status = 2");
