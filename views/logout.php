<?php

require_once("/opt/lampp/htdocs/php/catsmvc/config/config.php");

//session_start();

session_destroy();


header("Location:../?status=logout");



