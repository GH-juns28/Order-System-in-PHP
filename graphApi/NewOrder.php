<?php
include_once('../class/class.ManageUser.php');
include_once('../class/class.Products.php');
include_once('../class/class.SessionCheck.php');

$sessionCheck = new SessionCheck();
$sessionCheck->checkSession($_SESSION);
$users = new ManageUsers();

$checkUserInfo = $users->CheckUserInfo($_SESSION['email'],$_SESSION['password']);
//var_dump($checkUserInfo[0]['User_Id']);
header('Content-Type: application/json'); 
$Quantity = $_GET['ProductQuantity'];
$Product_Id = $_GET['ProductId'];




$NewOrder = new Products();
$User_Id = $_SESSION['User_Id'];
$NewOrder = $NewOrder->NewOrder($User_Id,$Quantity,$Product_Id);
//var_dump($NewOrder);

if($NewOrder == null){
	$array = array(
		    "output" => "1",
		    "message" => "Product Succeffully ordered"
		);	
		echo json_encode($array);
}
if ($NewOrder == 1) {

		$array = array(
		    "output" => "2",
		    "message" => "Not enough stock available"
		);
		echo json_encode($array);	
}

?>
