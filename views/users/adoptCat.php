<?php

session_start();

require_once("../templates/header_user.php");

//VARIABLES FROM CATS.PHP

$id = $_GET['id'];
$name = $_GET['name'];

?>


<div class="container text-center mt-5">
    <div class="row">
        <div class="col">
            Are you interested in adopting <strong> <?php echo $name ?></strong>?. Please write an email to catlovers@catlovers.com with the subject: <strong> <?php echo $name ?> adoption </strong>.
        </div>
        <p class="text-center mt-2">We'll answer you as soon as possible.
        </p>
</div>
<a href="cats.php"  class="btn btn-primary btn-lg">Back</a>