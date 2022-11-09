<?php
include('../controller/database.php');

error_reporting(0);

$login_history = $mysqli->query("SELECT * from history where code = 0");
$login_history1 = $mysqli->query("SELECT * from history where code = 1");

