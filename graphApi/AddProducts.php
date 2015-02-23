<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
session_start();
include_once('../class/class.AddProducts.php');	

$ProductName = $_GET['ProductName'];
$ProductDescription = $_GET['ProductDescription'];
$ProductPrice = $_GET['ProductPrice'];
$Company_Division_Id = $_GET['CompanyDivision'];
$Quantity = $_GET['Quantity'];

$AddProducts = new AddProducts();
$AddProducts->AddProducts($_SESSION['User_Id'],$Company_Division_Id,$ProductName,$ProductDescription,$ProductPrice,$Quantity);
if($AddProducts){
	$array = array(
		    "output" => "1"
		);
		echo json_encode($array);
}


?>