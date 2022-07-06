<?php

require_once './getDatabase.php';
$getDatabase = new GetDatabase();

$productID = $_GET["id"];

$getDatabase-> deleteProduct($productID);
header("location: /");