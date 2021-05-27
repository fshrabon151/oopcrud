<?php include_once "app/header.php";
include "autoload.php";
$user = new User();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $user->viewData($id);
    $d = $data->fetch_object();
}


?>

<div class="container">


    <div class="card w-50 mx-auto my-5">
        <img style="
        width:150px;
        border-radius: 100%;
        height: 150px;" class="mx-auto shadow my-3 mt-5" src="<?php echo $d->photo ?>" alt="">
        <h3 class="text-center mt-3"><?php echo $d->name ?></h3>
        <p class="text-center">(<?php echo $d->username ?>)</p>

        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Name</td>
                    <td><?php echo $d->name ?></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><?php echo $d->email ?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?php echo $d->cell ?></td>
                </tr>

            </table>

            <a href="user_index.php" class="btn btn-primary btn-sm">Back</a>
        </div>
    </div>



</div>


<?php include_once "app/footer.php"; ?>