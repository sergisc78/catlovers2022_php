<?php


require_once("../../models/adminModel.php");


//ADD CAT

$insert_cat=new adminModel();

$cats=$insert_cat->addCat();

require_once("../../views/admin/addCat.php");