<?php

session_start();

// GET CONNECTION

require_once("../../config/config.php");
$db = new Connection();
$database = $db->connect();

require_once("../../views/templates/header_user.php");

//require_once("../../controllers/UserController.php");


/* SQL SELECT */


$sql_select = "SELECT * FROM cats";
$result = $database->prepare($sql_select);
$result->execute();
//$count = $result->rowCount();
//return $result->fetchAll();

/* -------------------------------------------- PAGINATION CODE ------------------------------------------- */

$page = isset($_GET['page']) ? $_GET['page'] : '';

$size_page = 3; /* PAGINATION VARIABLE */

$countCats = $result->rowCount();


$pages = ceil($countCats / $size_page);

/* TO SHOW 3 CATS PER PAGE */

if (!$_GET) { // ALWAYS REDIRECT TO PAGE=1

  header("Location:cats?page=1");
}

if ($_GET['page'] > $size_page || $_GET['page'] <= 0 ) { // IF PAGE DOESN´T EXIST, REDIRECT TO PAGE=1

  header("Location:cats?page=1");
}

$beginToCount = ($_GET['page'] - 1) * $size_page;

$sql_cats = "SELECT * FROM cats LIMIT $beginToCount,$size_page";

$resultLimit = $database->prepare($sql_cats);

$resultLimit->execute();

$adultCountCats = $resultLimit->rowCount();



 /* ----------------------------------------- END PAGINATION CODE ---------------------------------------------- */


?>

<h3 class="text-center m-5" id="title">Cats for adoption</h3>

<!-- BOOTSTRAP PAGINATION -->

<nav aria-label="Page navigation example">

  <ul class="pagination justify-content-end me-5 mb-5">
    <li class="page-item <?php echo $_GET['page'] <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="cats?page=<?php echo $_GET['page'] - 1 ?>">Previous</a>
    </li>

    <?php for ($i = 0; $i < $pages; $i++) : ?>
      <li class="page-item <?php echo $_GET['page'] == $i + 1 ? 'active' : '' ?>">
        <a class="page-link" href="cats?page=<?php echo $i + 1 ?>">
          <?php echo $i + 1 ?>
        </a>
      </li>
    <?php endfor ?>

    <li class="page-item" <?php echo $_GET['page'] >= $pages ? 'disabled' : '' ?>>
      <a class="page-link" href="cats?page=<?php echo $_GET['page'] + 1 ?>">Next</a>
    </li>
  </ul>
</nav>






<?php




foreach ($resultLimit as $cats) {



?>


  <div class="container">

    <div class="card ms-4 mb-5" style="width: 18rem;float:left;width:30%;margin:auto;" id="catsforadoption">
      <img src="../../assets/images/<?php echo $cats['cat_image'] ?>" class="card-img-top text-center" alt="..." style=" width:  100%;
    height: 300px;">
      <div class="row h-100">
        <div class="col"  >
          <div class="card-body" >
            <h2 class=" text-center"><?php echo $cats['cat_name'] ?></h2>
          </div>
          <hr>
          <div class="col">
            <h5 class="text-center">Sex</h5>
            <p class="text-center"><?php echo $cats['cat_sex'] ?></p>
          </div>
          <hr>
          <div class="col">
            <h5 class="text-center">Age</h5>
            <p class="text-center"><?php echo $cats['cat_age'] ?></p>
          </div>
          <hr>
          <div class="col">
            <h5 class="text-center">Category</h5>
            <p class="text-center"><?php echo $cats['cat_category'] ?></p>
          </div>
          <hr>
          <div class="col">
            <h5 class="text-center">Description</h5>
            <p class="text-center"><?php echo $cats['cat_description'] ?></p>
          </div>
          <hr>

          <a href="adoptCat?id=<?php echo $cats['id'] ?>&name=<?php echo $cats['cat_name'] ?>" class="btn btn-success d-grid gap-2 btn-lg">Would you like to adopt me?</a>
          <br>
        </div>
      </div>
    </div>

  </div>



<?php

}
?>

<br>
<br>
<br>