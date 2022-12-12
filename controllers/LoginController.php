<?php

require_once("../config/config.php");

require_once("../models/userModel.php");

$login=new userModel();

$user_login=$login->login();

require_once("../views/login.php");

?>