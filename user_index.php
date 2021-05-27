<?php

include_once "app/header.php";

include "autoload.php";

$user = new User;



?>

<div class="wrap-table ">
    <?php
	if (isset($msg)) {
		echo $msg;
	}
	?>

    <div class="row justify-content-between">
        <a class="btn btn-sm btn-primary" href="user_add.php">Add new user</a>
        <a class="btn btn-sm btn-primary" href="index.php">Logout</a>
    </div>


    <br>
    <br>
    <div class="card shadow">

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h2>All Data</h2>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <form method="POST" class="form-inline">
                        <div class="form-group mx-sm-1 mb-2">
                            <input type="search" class="form-control" name=searchData placeholder="Search...">
                        </div>
                        <button type="submit" name="search" class="btn btn-primary mb-2">Search</button>
                    </form>
                </div>
            </div>

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Cell</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php


					$data = $user->viewAll();

					if (isset($_POST['search'])) {
						$key = $_POST['searchData'];
						$data = $user->searchData($key);
					}

                    print_r($data);
					$i = 1;
					while ($d = $data->fetch_object()) :
                         
					?>
                    <tr>
                    dsds
                        <td><?php echo $i;
								$i++; ?></td>
                        <td><?php echo $d->name ?></td>
                        <td><?php echo $d->email ?></td>
                        <td><?php echo $d->cell ?></td>
                        <td><img src="<?php echo $d->photo ?>" alt=""></td>
                        <td>
                            <a class="btn btn-sm btn-info" href="user_view.php?id=<?php echo $d->id ?>">View</a>
                            <a class="btn btn-sm btn-warning" href="user_edit.php?id=<?php echo $d->id ?>">Edit</a>
                            <a class="btn btn-sm btn-danger delete_user" delete_user_id="<?php echo $d->id ?>"
                                delete_user_photo="<?php echo $d->photo ?>"
                                href="?delete_id=<?php echo $d->id ?>&photo=<?php echo $d->photo ?>">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>


<div id="add_user_modal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <h2>Add new user</h2>

                <hr>
                <form id="reg_user" action="" method="POST" enctype="multipart/form-data">
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
        </div>
    </div>
</div>


<?php
include_once 'app/footer.php'
?>