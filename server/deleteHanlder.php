<?php

require_once 'getDatabase.php';
$getDatabase = new GetDatabase();
$_POST["deleteUserInfo"] = true;
if (isset($_POST["deleteUserInfo"])) {
    $getDatabase-> deleteUserInfo();
}
header("location: http://localhost:8000/");