<?php
require_once 'dblogin.php';
$connection = new mysqli($db_hostname,$db_username,$db_password,$db_database);
if($connection->connect_error)
	die($connection->connect_error)
?> 