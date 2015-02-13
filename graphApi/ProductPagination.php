<?php
include_once('../class/class.Pagination.php');
include_once('../class/class.Products.php');
header('Content-Type: application/json');

$page = $_GET['page'];
$itemPerPage = 10;
$ShowProduct = new Products();
$ShowProduct = $ShowProduct->ViewProducts($itemPerPage,$page);
echo json_encode($ShowProduct);
?>