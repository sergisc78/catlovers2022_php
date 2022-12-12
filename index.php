<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cats</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./assets/css/styles.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark p-4">
        <div class="container-fluid bg-dark navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Catlovers <i class="fa-solid fa-cat"></i> </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="float-right " id="navbarSupportedContent">
                <ul class="navbar-nav me-4 mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary me-2 buttons" href="./views/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-success buttons" href="./views/register.php">Register</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <!-- LOGOUT MESSAGE -->

    <?php

    if (!empty($_GET['status'])) {
        echo '<div class="alert alert-success alert-dismissible fade show fixed-top" role="alert" style="margin-top:150px;width:370px;margin-left: auto;margin-right: 40px;">
        Logout sucessfully !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    ?>

    <div class="container">
        <div class="row">
            <p class="text-center p-5">Welcome catlover</p>
            <p class="text-center">Please login or register</p>
            <div class="d-grid gap-2 d-md-block text-center p-2">
                <a href="./views/login.php" class="btn btn-primary btn btn-lg" type="button">Login</a>
                <a href="./views/register.php" class="btn btn-success btn btn-lg" type="button">Register</a>
            </div>
        </div>
    </div>

    <?
    require_once("./views/templates/footer.php");

    ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

    <!-- DATATABLES AND JQUERY -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- LOGOUT MESSAGE TIMER -->

    <script>
        $(document).ready(function() {

            setTimeout(function() {
                $(".alert").alert('close');
            }, 5000);

        });
    </script>
</body>

</html>