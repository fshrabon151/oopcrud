<?php include_once "app/header.php";
include "autoload.php";
$user = new User;
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $data = $user->viewData($id);
    $d = $data->fetch_object();
}


?>

<div class="container">
    <div class="card w-50 mx-auto my-3">
        <div class="card-body">
            <h2 class="text-center">Edit user user</h2>
            <hr>
            <form action="" id="editUser" method="POST" enctype="multipart/form-data">
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
                    <label for="">Username</label>
                    <input name="uname" class="form-control" value="<?php echo $d->username ?>" type="text">
                </div>
                <div class="form-group">
                    <input type="file" name="photo" accept="image/*" class="form-control" id="userPhoto">
                    <img id="imagePreview" class="my-3" style="width: 150px;" src="<?php echo $d->photo ?>" alt="" />
                </div>
                <div class="form-group">
                    <input name="edit" type="submit" value="Update" class="btn btn-sm btn-success">
                    <input type="hidden" name="oldPhoto" value="<?php echo $d->photo?>">
                    <input type="hidden" name="id" value="<?php echo $d->id?>">
                </div>

            </form>

        </div>
        <div class=" card-footer">
            <a href="user_index.php" class="btn btn-primary btn-sm float-right">Back</a>
        </div>
    </div>
</div>


<?php include_once "app/footer.php" ?>