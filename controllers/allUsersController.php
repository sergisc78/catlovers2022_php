<?php

require_once("/opt/lampp/htdocs/catsmvc/models/allUsersModel.php");

$users = new allUsersModel();
$allUsers = $users->getUsers();

require_once("/opt/lampp/htdocs/catsmvc/views/admin/users.php");
