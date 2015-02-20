<?php

include_once('class.database.php');

class AddProducts{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function AddProducts($CustomerId,$Company_Division_Id,$ProductName,$ProductDescription,$ProductPrice){
		$query = $this->link->prepare("INSERT INTO product (Customer_Id,Company_Division_Id,Product_Name,Product_Description,Price) VALUES (?,?,?,?,?)");
		$values = array($CustomerId,$Company_Division_Id,$ProductName,$ProductDescription,$ProductPrice);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}

	function DeleteOrder($Order_Id){
		$query = $this->link->query("SELECT * from order where Order_Id = '".$Order_Id."'");
		$rowCount = $query->rowCount();
		return $rowCount;
	}
		

}

$AddProducts = new AddProducts();
for ($i = 1; $i <= 2000; $i++) {
    $AddProducts->AddProducts(1,1,$i,$i,$i);
    echo $i;
}







?>