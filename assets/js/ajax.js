/**
 * for adding user
 */

$("#reg_user").submit(function (e) {
  e.preventDefault();

  let name = $('#reg_user input[name="name"]').val();
  let email = $('#reg_user input[name="email"]').val();
  let username = $('#reg_user input[name="username"]').val();
  let cell = $('#reg_user input[name="cell"]').val();
  let photo = $('#reg_user input[name="photo"]').val();

  if (
    name == "" ||
    email == "" ||
    username == "" ||
    cell == "" ||
    photo == ""
  ) {
    Swal.fire("All fields required");
  } else {
    $.ajax({
      url: "inc/ajax_template/add_user.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        setInterval(() => {
          window.location.replace("user_index.php");
        }, 1500);
        $("#reg_user")[0].reset();
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "User added succesfully!",
          showConfirmButton: false,
          timer: 1500,
        });
      },
    });
  }
});

/**
 * For deleting user
 */

$(document).on("click", "a.delete_user", function (e) {
  e.preventDefault();

  let id = $(this).attr("delete_user_id");
  let photo = $(this).attr("delete_user_photo");

  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        url: "inc/ajax_template/delete_user.php",
        method: "POST",
        data: {
          id: id,
          photo: photo,
        },
        success: (data) => {
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
          setInterval(() => {
            window.location.replace("user_index.php");
          }, 1500);
        },
      });
    }
  });
});


/**
 * for editing user
 */

 $("#editUser").submit(function (e) {
  e.preventDefault();

    $.ajax({
      url: "inc/ajax_template/edit_user.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      success: function (data) {
        $("#editUser")[0].reset();

        setInterval(() => {
          window.location.replace("user_index.php");
        }, 1500);
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Data updated successfully!",
          showConfirmButton: false,
          timer: 1500,
        });
      },
    });

});
