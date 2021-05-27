<?php include_once "app/header.php";
include "autoload.php";
$staff = new Staff;
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $data = $staff->viewData($id);
    $d = $data->fetch_object();
}
if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $cell = $_POST['cell'];
    $uname = $_POST['uname'];
    $oldPhoto = $d->photo;
    $newPhoto = "";



    //code for uploading photo
    $file_name = $_FILES['photo']['name'];

    if ($file_name == "") {
        $newPhoto = $oldPhoto;
        $staff->updateData($name, $email, $cell, $uname, $newPhoto, $id);
        header("location:staff_index.php");
    } else {

        $file_tmp_name = $_FILES['photo']['tmp_name'];

        $file_arr = explode('.', $file_name);
        $file_ext = end($file_arr);
        $unique_name = md5(time() . rand()) . '.' . $file_ext;
        $newPhoto = $file_path = 'media/staffs/' . $unique_name;


        move_uploaded_file($file_tmp_name, $file_path);

        $staff->updateData($name, $email, $cell, $uname, $newPhoto, $id);
        unlink($oldPhoto);
        header("location:staff_index.php");
    }
}

?>

<div class="container">
    <div class="card w-50 mx-auto my-3">
        <div class="card-body">
            <h2 class="text-center">Edit staff</h2>
            <hr>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" class="form-control" value="<?php echo $d->name ?>" type="text">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" class="form-control" value="<?php echo $d->email ?>" type="text">
                </div>
                <div class="form-group">
                    <label for="">Cell</label>
                    <input name="cell" class="form-control" value="<?php echo $d->cell ?>" type="text">
                </div>
                <div class="form-group">
                    <label for="">username</label>
                    <input name="uname" class="form-control" value="<?php echo $d->username ?>" type="text">
                </div>
                <div class="form-group">
                    <input type="file" name="photo" accept="image/*" class="form-control" id="staffPhoto">
                    <img id="imagePreview" class="my-3" style="width: 150px;" src="<?php echo $d->photo ?>" alt="" />
                </div>
                <div class="form-group">
                    <input name="edit" type="submit" value="Update" class="btn btn-sm btn-success">
                </div>

            </form>

        </div>
        <div class="card-footer">
            <a href="staff_index.php" class="btn btn-primary btn-sm float-right">Back</a>
        </div>
    </div>
</div>


<?php include_once "app/footer.php" ?>