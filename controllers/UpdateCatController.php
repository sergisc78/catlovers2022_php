<?php


require_once("../../models/adminModel.php");


//UPDATE CAT

$update_cat=new adminModel();

$cats=$update_cat->updateCat();

require_once("../../views/admin/editCat.php");




?>