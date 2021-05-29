<?php

include_once "app/header.php";

include "autoload.php";

$staff = new Staff;



?>

<div class="wrap-table ">
    <?php
	if (isset($msg)) {
		echo $msg;
	}
	?>

    <div class="row justify-content-between">
        <a class="btn btn-sm btn-primary" href="staff_add.php">Add new staff</a>
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

                        <div class="form-group mx-sm-1 mb-2">
                            <input type="text" class="form-control" name=searchData placeholder="Search..." id="get_search_data">
                        </div>
   
                </div>
            </div>

            <table class="table table-striped" id="staff_data">

            </table>
        </div>
    </div>
</div>




<?php
include_once 'app/footer.php'
?>