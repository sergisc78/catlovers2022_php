<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- JS VALIDATIONS 

    <script src="../../assets/js/deleteCat.js"></script>-->

    <!-- JQUERY -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
    <!-- SWEET ALERT -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>


    <?php

    session_start();

    if (!isset($_SESSION['username'])) { // IF USER IS NOT LOGGED IN 

        header("location:../login.php");
    }


    require_once("../../views/templates/header_admin.php");

    require_once("../../controllers/AdminController.php");


    ?>




    <h4 class="text-center mt-4" id="title">All cats</h4>

    <div class="container" id="allcats">

        <a href="addCat" class="btn btn-primary mb-5 add">Add new cat</a>

        <div class="row">

            <div class="col-lg-12">
                <table id="table" class="table table-bordered display" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Sex</th>
                            <th>Age</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($allcats as $cats) {
                        ?>
                            <tr>
                                <td><?php echo $cats['id'] ?> </td>
                                <td><img src="../../assets/images/<?php echo $cats['cat_image'] ?>" alt="" width="140"></td>
                                <td><?php echo $cats['cat_name'] ?> </td>
                                <td><?php echo $cats['cat_sex'] ?> </td>
                                <td><?php echo $cats['cat_age'] ?> </td>
                                <td><?php echo $cats['cat_category'] ?> </td>

                                <!-- EDIT CAT -->
                                <td><a href=" editCat?id=<?php echo $cats['id'] ?>&image=<?php echo $cats['cat_image'] ?>&name=<?php echo $cats['cat_name'] ?>&sex=<?php echo $cats['cat_sex'] ?>&age=<?php echo $cats['cat_age'] ?>&category=<?php echo $cats['cat_category'] ?>&descr=<?php echo $cats['cat_description'] ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square edit" title="View / Edit Cat"></i></a>

                                    <!-- DELETE CAT -->
                                    <a href="deleteCat?id=<?php echo $cats['id'] ?>" data-id="<?php echo $cats['id'] ?>" class="btn btn-small btn-danger deleteButton" name="delete" id="delete"><i class="fa-solid fa-trash delete" title="Delete Cat"></i></button>

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
                        title: "Are you sure you want to delete this cat?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "GET",
                                url: "deleteCat.php?id=" + id,
                                data: {
                                    id: id
                                },

                                success: function(data) {
                                    if (data != 1) {

                                        swal("Cat deleted sucessfully!", {
                                            icon: "success",
                                            timer: 3000
                                        }).then(function() {
                                            location.reload();
                                        });
                                    } else {
                                        swal("Error ! Cat can't be deleted !");
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