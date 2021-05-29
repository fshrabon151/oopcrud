<?php 
include "../../autoload.php";

$staff = new Staff;

$id = $_POST['id'];
	$photo = $_POST['photo'];
	$staff->deleteData($id);
	unlink("../../$photo");
?>