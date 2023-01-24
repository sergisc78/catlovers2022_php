<?php

require_once("/opt/lampp/htdocs/catsmvc/config/config.php");

//session_start();

session_destroy();


header("Location:../?status=logout");



