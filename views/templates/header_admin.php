<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- STYLES -->
    <link rel="stylesheet" href="../../assets/css/styles.css">


    <!--DATATABLES CSS-->

    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <!-- FONT AWESOME -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

    <style>
        table thead {
            background: #373B44;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #4286f4, #373B44);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #4286f4, #373B44);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


            margin-top: 100px;
        }

        #table_filter {
            margin-bottom: 20px;
        }

        .sorting {
            width: 160px;
        }
    </style>

</head>

<body>

    <?php

    // GET CONNECTION AND SHOW USERNAME AFTER LOGIN

    require_once("../../config/config.php");
    $db = new Connection();
    $database = $db->connect();

    $sql_username = "SELECT username FROM users WHERE username=?";
    $result = $database->prepare($sql_username);
    $result->bindValue(1, $_SESSION['username']);
    $result->execute();

    ?>

    <nav class="navbar navbar-expand-lg bg-dark p-4">
        <div class="container-fluid bg-dark navbar-dark bg-dark">
            <a class="navbar-brand" href="../../index.php">Catlovers <i class="fa-solid fa-cat"></i> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="float-right " id="navbarSupportedContent">
                <ul class="navbar-nav me-4 mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <!-- <a class="nav-link active" aria-current="page" href="../../views/admin/dashboard.php">Home</a>-->
                        <a class="nav-link" href="#">User: <?php echo " " . $_SESSION["username"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/admin/dashboard">Cats</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link logout" href="../logout">Logout</a>
                    </li>


                </ul>

            </div>
        </div>
    </nav>





    <!-- DATATABLES AND JQUERY -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--ADATATABLES JS -->

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!--SWEET ALERT JS -->

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- ERRORS CONTROL ADDCAT-->

    <script src="../../assets/js/addCat.js"></script>



    <script>
        $(document).ready(function() {
            $('#table').DataTable();
            responsive: true;
        });
    </script>



</body>

</html>