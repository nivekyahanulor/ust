<?php
include('../controller/database.php');

error_reporting(0);

$survey = $mysqli->query("SELECT * from survey");

