<?php include_once "app/header.php";
include "autoload.php";
?>


<div class="container">
    <div class="card w-50 mx-auto my-3">
        <div class="card-body">
            <h2>Add new staff</h2>

            <hr>
            <form id="reg_staff" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input name="name" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input name="email" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">Cell</label>
                    <input name="cell" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input name="uname" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <input type="file" name="photo" accept="image/*" class="form-control" id="userPhoto">
                    <img id="imagePreview" class="my-3" style="width: 150px;" src="" alt="" />
                </div>
                <div class="form-group">
                    <input name="add" type="submit" value="Add" class="btn btn-primary">
                </div>
            </form>

        </div>
        <div class="card-footer">
            <a href="staff_index.php" class="btn btn-primary btn-sm float-right">Back</a>
        </div>
    </div>
</div>


<?php include_once "app/footer.php" ?>