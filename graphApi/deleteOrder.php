<?php
session_start();
include_once('../class/class.ManageOrders.php');
include_once('../class/class.ManageUser.php');
$ManageOrders = new ManageOrders();
$ManageUsers = new ManageUsers();
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$Product_Id = $_GET['Product_Id'];
if($ManageUsers->LoginUser($email,$password) > 0){
	if($ManageOrders->DeleteOrder($Product_Id) > 0){
		$array = array(
		    "output" => "1"
		);
		echo json_encode($array);
	}
	else{
		$array = array(
		    "output" => "0"
		);
		echo json_encode($array);
	}
}


?>