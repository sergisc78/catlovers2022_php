<?php


require_once("../../models/adminModel.php");


//GET ALL CATS

$cats=new adminModel();

$allcats=$cats->getCats();

require_once("../../views/admin/dashboard.php");


/*ADD CAT

$insert_cat=new adminModel();

$cats=$insert_cat->addCat();

//require_once("../../views/admin/addCat.php");*/