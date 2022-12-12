<?php

require_once("/opt/lampp/htdocs/catsmvc/models/allUsersModel.php");

$updateInfoUser= new allUsersModel();

$user= $updateInfoUser->updateUser();


require_once("/opt/lampp/htdocs/catsmvc/views/admin/editUser.php");

