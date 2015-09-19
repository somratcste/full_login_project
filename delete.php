<?php
require_once 'connectdb.php';

$delete_id = $_GET['del'];
$delete_query = "DELETE FROM users WHERE UId = '$delete_id'";
$result = mysqli_query($connection,$delete_query);
if($result){
	echo "<script>window.open('view_users.php?deleted=user has been deleted','_self')</script>";
}

?>