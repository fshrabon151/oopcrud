(function ($) {
  $(document).ready(function () {
    /**User part start */
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

    $("#get_search_data").on("keyup", function () {
      var searchData = "";
      searchData = $(this).val();

      $.ajax({
        method: "POST",
        url: "inc/ajax_template/search_user.php",
        data: { searchData: searchData },
        success: function (response) {
          if (searchData !== "") {
            console.log(response);
            $("#user_data").html(response);
          } else {
            userData();
          }
        },
      });
    });

    userData();

    function userData() {
      $.ajax({
        url: "inc/ajax_template/view_user.php",
        success: function (data) {
          console.log("Viser  " + data);
          $("#user_data").html(data);
        },
      });
    }

    /**User part end */

    /**Staff part start */

    /**
     * for adding user
     */

    $("#reg_staff").submit(function (e) {
      e.preventDefault();

      let name = $('#reg_staff input[name="name"]').val();
      let email = $('#reg_staff input[name="email"]').val();
      let username = $('#reg_staff input[name="username"]').val();
      let cell = $('#reg_staff input[name="cell"]').val();
      let photo = $('#reg_staff input[name="photo"]').val();

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
          url: "inc/ajax_template/add_staff.php",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function (data) {
            setInterval(() => {
              window.location.replace("staff_index.php");
            }, 1500);
            $("#reg_staff")[0].reset();
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Staff added succesfully!",
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

    $(document).on("click", "a.delete_staff", function (e) {
      e.preventDefault();

      let id = $(this).attr("delete_staff_id");
      let photo = $(this).attr("delete_staff_photo");

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
            url: "inc/ajax_template/delete_staff.php",
            method: "POST",
            data: {
              id: id,
              photo: photo,
            },
            success: (data) => {
              Swal.fire("Deleted!", "Your file has been deleted.", "success");
              setInterval(() => {
                window.location.replace("staff_index.php");
              }, 1500);
            },
          });
        }
      });
    });

    /**
     * for editing staff
     */

    $("#editStaff").submit(function (e) {
      e.preventDefault();

      $.ajax({
        url: "inc/ajax_template/edit_staff.php",
        method: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (data) {
          $("#editStaff")[0].reset();

          setInterval(() => {
            window.location.replace("staff_index.php");
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

    $("#get_search_data").on("keyup", function () {
      var searchData = "";
      searchData = $(this).val();

      $.ajax({
        method: "POST",
        url: "inc/ajax_template/search_staff.php",
        data: { searchData: searchData },
        success: function (response) {
          if (searchData !== "") {
            console.log(response);
            $("#staff_data").html(response);
          } else {
            staffData();
          }
        },
      });
    });

    staffData();

    function staffData() {
      $.ajax({
        url: "inc/ajax_template/view_staff.php",
        success: function (data) {

          $("#staff_data").html(data);
        },
      });
    }

    /**Staff part end */

    // end
  });
})(jQuery);
