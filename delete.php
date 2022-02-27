<?php
$con = require_once __DIR__ . "/Class/controller.php";
$con->deleteNote($_POST['id']);
header("Location: views.php");