<?php

require_once("/opt/lampp/htdocs/php/catsmvc/models/allUsersModel.php");

$users = new allUsersModel();
$allUsers = $users->getUsers();

require_once("/opt/lampp/htdocs/php/catsmvc/views/admin/users.php");
