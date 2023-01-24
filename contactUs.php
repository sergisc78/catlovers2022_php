<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catlovers</title>

    <!-- BOOTSTRAP CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- AJAX-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS STYLESHEET-->
    <link rel="stylesheet" href="./assets/css/styles.css">

    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
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
                        <a class="nav-link active" aria-current="page" href="/catsmvc">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary me-2 buttons" href="./views/login">Login</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <div class="container" id="formContact">
        <h2 class="text-center">Contact Us</h2>
        <form action="" method="post" class="formlabels">
            <label for="name" id="forminput">Name</label>
            <input type="text" name="name" id="name" >
            <br>
            <label for="email" id="forminput">Email</label>
            <input type="email" name="email" id="email">
            <br>
            <div class="mb-3">
              <label for="" class="form-label">Type a message</label>
              <textarea class="form-control" name="" id="forminput" rows="3"></textarea>
            </div>
            <button class="btn btn-primary send" type="submit">Send</button>
        </form>
    </div>
</body>

</html>