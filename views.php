<?php 
$con = require_once __DIR__ . "/Class/controller.php";
$notes = $con->getNote();
echo "<pre>";
var_dump($notes);
echo "</pre>";