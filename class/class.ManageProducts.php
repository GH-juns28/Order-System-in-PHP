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

	function salesmanDescription($salesmanId){
		$query = $this->link->query("SELECT * FROM salesman_status_order where salesman_status_order_id='".$salesmanId."'");
		return $result = $query->fetchAll();
	}

	function salesmanConfirmProduct($Product_Id,$Customer_Product_Id){
		$query = $this->link->query("UPDATE customer_product SET salesman_status_order = 4  WHERE Product_Id=".$Product_Id." AND Customer_Product_Id=".$Customer_Product_Id."");
		return $result = $query->fetchAll();
	}

	function adminConfirmProduct($Product_Id,$Customer_Product_Id){
		$query = $this->link->query("UPDATE customer_product SET salesman_status_order = 2  WHERE Product_Id=".$Product_Id." AND Customer_Product_Id=".$Customer_Product_Id."");
		$querys = $this->link->query("UPDATE customer_product SET admin_status_order = 2  WHERE Product_Id=".$Product_Id." AND Customer_Product_Id=".$Customer_Product_Id."");
		
		return $result = $query->fetchAll();
	}
}




?>