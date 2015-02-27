<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
session_start();
include_once('../class/class.ManageUser.php');
include_once('../class/class.Products.php');
header('Content-Type: application/json');
//var_dump($_SESSION);
$users = new ManageUsers();
$checkLogin = $users->LoginUser($_SESSION['email'],$_SESSION['password']);
$insertCustomerProduct = new Products();
$showProductInfo = new Products();
$deleteOrder = new Products();
$products = new Products();
if($checkLogin){
	$Products = new Products();
	$MakePayment = $Products->makePayment($_SESSION['User_Id']);
	//var_dump($MakePayment);
	for ($i=0; $i < count($MakePayment) ; $i++) { 
		$Product_Id = $MakePayment[$i]['Product_Id'];
		$Order_Id = $MakePayment[$i]['Order_Id'];
		$Quantity = $MakePayment[$i]['Quantity'];
		$insertCustomerProduct->makePaymentCustomerInfo($Product_Id,$Quantity,$_SESSION['User_Id']);
		//$deductQuantity = $products->deductQuantity($Product_Id,$Quantity);

		$deleteOrder->deleteOrder($_SESSION['User_Id']);
		if($deleteOrder){
			$array = array(
			    "output" => "1"
			);
			echo json_encode($array);
		}

	}

}

?>