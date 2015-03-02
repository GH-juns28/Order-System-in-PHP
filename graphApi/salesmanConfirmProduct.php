<?php
include_once('../class/class.ManageUser.php');
include_once('../class/class.Products.php');
include_once('../class/class.SessionCheck.php');
include_once('../class/class.ManageProducts.php');


$sessionCheck = new SessionCheck();
$sessionCheck->checkSession($_SESSION);
$users = new ManageUsers();
$ManageProducts = new ManageProducts();

$checkUserInfo = $users->CheckUserInfo($_SESSION['email'],$_SESSION['password']);
//var_dump($checkUserInfo[0]['User_Id']);
header('Content-Type: application/json'); 
$Product_Id = $_GET['Product_Id'];
$Customer_Product_Id = $_GET['Customer_Product_Id'];

$salesmanDescription = $ManageProducts->salesmanConfirmProduct($Product_Id,$Customer_Product_Id);
if ($salesmanDescription = 1) {

		$array = array(
		    "code" => "200",
		    "message" => "ok"
		);
		echo json_encode($array);
}

?>
