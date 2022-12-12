<?php

require_once("../config/config.php");

require_once("../models/userModel.php");

/* REGISTER USER */

$register=new userModel();

$register_user=$register->register();

require_once("../views/register.php");


?>