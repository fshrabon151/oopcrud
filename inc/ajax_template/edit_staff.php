<?php 
    include "../../autoload.php";



    $staff = new Staff;

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $uname = $_POST['uname'];
    $oldPhoto = $_POST['oldPhoto'];
    $newPhoto = "";



    //code for uploading photo
    $file_name = $_FILES['photo']['name'];

    if ($file_name == "") {
        $newPhoto = $oldPhoto;
        $staff->updateData($name, $email, $cell, $uname, $newPhoto, $id);
    } else {

        $file_tmp_name = $_FILES['photo']['tmp_name'];

        $file_arr = explode('.', $file_name);
        $file_ext = end($file_arr);
        $unique_name = md5(time() . rand()) . '.' . $file_ext;
		$file_path1 = '../../media/staffs/' . $unique_name;
        $newPhoto = $file_path = 'media/staffs/' . $unique_name;


        move_uploaded_file($file_tmp_name, $file_path1);

        $staff->updateData($name, $email, $cell, $uname, $newPhoto, $id);
        unlink("../../$oldPhoto");

    }


?>