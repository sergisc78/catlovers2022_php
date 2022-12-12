<?php


require_once("/opt/lampp/htdocs/catsmvc/models/users/usersModel.php");


//GET ALL CATS

$cats=new usersModel();

$allcats=$cats->getCats();

require_once("/opt/lampp/htdocs/catsmvc/views/users/cats.php");