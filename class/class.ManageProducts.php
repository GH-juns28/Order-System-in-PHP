<?php
include_once('class.database.php');
class ManageProducts{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function ShowProducts(){
		$query = $this->link->query("SELECT * FROM product");
		return $result = $query->fetchAll();
	}

	function ShowProductInfo($Product_Id){
		$query = $this->link->query("SELECT * FROM product where Product_Id='".$Product_Id."'");
		return $result = $query->fetchAll();
	}

	function deductQuantity($Product_Id,$Quantity){
		$query = $this->link->query("UPDATE product SET Quantity = ".$Quantity."  WHERE Product_Id=".$Product_Id."");
		return $result = $query->fetchAll();
	}
}

/*
$ManageProducts = new ManageProducts();
$ManageProducts->deductQuantity();
var_dump($ManageProducts);
*/

?>