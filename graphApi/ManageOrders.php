<?php
header('Content-Type: application/json');
include_once('../class/class.ManageOrders.php');
$CheckOrders = new ManageOrders();
$CheckOrders = $CheckOrders->CheckOrders(1);
echo json_encode($CheckOrders);
?>