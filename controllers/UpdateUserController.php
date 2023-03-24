<?php

require_once("/opt/lampp/htdocs/php/catsmvc/models/allUsersModel.php");

$updateInfoUser= new allUsersModel();

$user= $updateInfoUser->updateUser();


require_once("/opt/lampp/htdocs/php/catsmvc/views/admin/editUser.php");

