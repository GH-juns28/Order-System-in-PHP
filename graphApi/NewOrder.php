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
if($NewOrder == null){
	$array = array(
		    "output" => "1"
		);
		echo json_encode($array);
}

?>
