<?php
include_once('class.database.php');

class ManageOrders{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function CheckOrders($User_Id){
		$query = $this->link->query("SELECT * FROM `order` WHERE User_Id = '".$User_Id."'");
		return $result = $query->fetchAll();
		
	}

	function ProductData($Product_Id){
		$query = $this->link->query("SELECT * FROM `product` WHERE Product_Id = '".$Product_Id."'");
		$rowCount = $query->rowCount();
		if($rowCount > 0){
			
			$result = $query->fetchAll();
			return $result;
		}
	}

	function ManageOrderTotalPrice($User_Id){
		$query = $this->link->query("SELECT Total_Price FROM `order` WHERE User_Id = '".$User_Id."'");
		return $query->fetchAll();
	}
	
}

/*
$CheckOrders = new ManageOrders();
$CheckOrders = $CheckOrders->ProductData(50);
var_dump($CheckOrders);
*/

?>