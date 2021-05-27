<?php 
    include "../../autoload.php";


    $user = new User;

    $name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$uname = $_POST['uname'];


		//code for uploading photo
		$file_name = $_FILES['photo']['name'];
		$file_tmp_name = $_FILES['photo']['tmp_name'];

		$file_arr = explode('.', $file_name);
		$file_ext = end($file_arr);
		$unique_name = md5(time() . rand()) . '.' . $file_ext;
		$file_path1 = '../../media/users/' . $unique_name;
		$file_path = 'media/users/' . $unique_name;

		move_uploaded_file($file_tmp_name, $file_path1);

		$user->createData($name, $email, $cell, $uname, $file_path);


?>