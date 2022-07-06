<?php

require_once './getDatabase.php';
$getDatabase = new GetDatabase();

$nameProduct = $_GET["name"];
$descProduct = $_GET["desc"];
$imgPathProduct = $_GET["imgPath"];
$isSaleProduct = $_GET["isSale"];
$isPopularProduct = $_GET["isPopular"];

$getDatabase-> addProduct($nameProduct, $descProduct, $imgPathProduct, $isSaleProduct, $isPopularProduct);
header("location: /");