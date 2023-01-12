<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    

<?php

session_start();

require_once("../../views/templates/header_admin.php");
require_once("../../controllers/allUsersController.php");



?>

<h4 class="text-center mt-4 mb-3" id="title">Users</h4>

    <div class="container" id="allusers">

        <div class="row">

            <div class="col-lg-12">
                <table id="table" class="table table-bordered display" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Userame</th>
                            <th>Role ID</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allUsers as $user) {
                        ?>
                            <tr>
                               <td><?php echo $user['id'] ?> </td>
                                <td><?php echo $user['username'] ?></td>
                                <td><?php echo $user['role_id'] ?> </td>
                                <td><?php echo $user['role'] ?> </td>
                                

                                <!-- EDIT USER -->
                                <td><a href=" editUser.php?id=<?php echo $user['id'] ?>&username=<?php echo $user['username'] ?>&roleId=<?php echo $user['role_id']?>&role=<?php echo $user['role'] ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square edit" title="Edit User Role"></i></a>

                                    
                                    <!-- DELETE USER  -->
                                <a href="deleteUser.php?id=<?php echo $user['id'] ?>" data-id="<?php echo $user['id'] ?>" class="btn btn-small btn-danger deleteButton" name="delete" id="delete"><i class="fa-solid fa-trash delete" title="Delete User"></i></button>
                                    
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>
        </div>

        <br>
        <br>
        <br>


        <script>
            $(document).ready(function() {

                $('.deleteButton').on('click', function(e) {

                    e.preventDefault();

                    var id = $(this).attr('data-id');

                    swal({
                        title: "Are you sure you want to delete this user?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "GET",
                                url: "deleteUser.php?id=" + id,
                                data: {
                                    id: id
                                },

                                success: function(data) {
                                    if (data != 1) {

                                        swal("User deleted sucessfully!", {
                                            icon: "success",
                                            timer: 3000
                                        }).then(function() {
                                            location.reload();
                                        });




                                    } else {
                                        swal("Error ! User can't be deleted !");
                                    }


                                }
                            });
                        }

                    });



                });


            })
        </script>

</body>
</html>