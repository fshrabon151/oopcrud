<?php

include_once "app/header.php";

include "autoload.php";


$staff = new Staff;


if (isset($_GET['delete_id'])) {

	$id = $_GET['delete_id'];
	$photo = $_GET['photo'];
	$staff->deleteData($id);
	unlink($photo);
	header("location:staff_index.php");
}


/**
 * Isseting Form
 */
if (isset($_POST['add'])) {
	// Get values
	$name = $_POST['name'];
	$email = $_POST['email'];
	$cell = $_POST['cell'];
	$uname = $_POST['uname'];

	if ($name == "" || $email == "" || $cell == "" || $uname == "") {

		$msg = '<div class="alert alert-danger w-25 mx-auto alert-dismissible fade show" role="alert">
		All field required!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	} else {

		//code for uploading photo
		$file_name = $_FILES['photo']['name'];
		$file_tmp_name = $_FILES['photo']['tmp_name'];

		$file_arr = explode('.', $file_name);
		$file_ext = end($file_arr);
		$unique_name = md5(time() . rand()) . '.' . $file_ext;
		$file_path = 'media/staffs/' . $unique_name;

		move_uploaded_file($file_tmp_name, $file_path);

		$staff->createData($name, $email, $cell, $uname, $file_path);
		$msg = '<div class="alert alert-success w-25 mx-auto alert-dismissible fade show" role="alert">
		Data added successfully!
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>';
	}
}


?>

<div class="wrap-table ">
	<?php
	if (isset($msg)) {
		echo $msg;
	}
	?>
	<div class="row justify-content-between">
		<a class="btn btn-sm btn-primary" data-toggle="modal" href="#add_staff_modal">Add new staff</a>
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


					$data = $staff->viewAll();

					if (isset($_POST['search'])) {
						$key = $_POST['searchData'];
						$data = $staff->searchData($key);
					}

					$i = 1;
					while ($d = $data->fetch_object()) :

					?>
						<tr>
							<td><?php echo $i;
								$i++; ?></td>
							<td><?php echo $d->name ?></td>
							<td><?php echo $d->email ?></td>
							<td><?php echo $d->cell ?></td>
							<td><img src="<?php echo $d->photo ?>" alt=""></td>
							<td>
								<a class="btn btn-sm btn-info" href="staff_view.php?id=<?php echo $d->id ?>">View</a>
								<a class="btn btn-sm btn-warning" href="staff_edit.php?id=<?php echo $d->id ?>">Edit</a>
								<a class="btn btn-sm btn-danger" href="?delete_id=<?php echo $d->id ?>&photo=<?php echo $d->photo ?>">Delete</a>
							</td>
						</tr>
					<?php endwhile; ?>

				</tbody>
			</table>
		</div>
	</div>
</div>


<div id="add_staff_modal" class="modal fade">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-body">
				<h2>Add new staff</h2>
				<hr>
				<form action="" method="POST" enctype="multipart/form-data">
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
						<input name="add" type="submit" value="Add" onclick="addData()" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>







<?php
include_once 'app/footer.php'
?>