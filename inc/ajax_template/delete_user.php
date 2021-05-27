<?php 
include "../../autoload.php";

$user = new User;

$id = $_POST['id'];
	$photo = $_POST['photo'];
	$user->deleteData($id);
	unlink("../../$photo");
?>