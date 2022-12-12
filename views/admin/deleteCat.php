<?php
// GET CONNECTION

require_once("../../config/config.php");
$db = new Connection();
$database = $db->connect();



// VARIABLE ID

$id = isset($_GET['id']) ? $_GET['id'] : '';


// SQL STATEMENT

$sql_delete = "DELETE FROM cats WHERE id=:id";
$result = $database->prepare($sql_delete);
$result->bindParam(':id', $id);
$result->execute();

