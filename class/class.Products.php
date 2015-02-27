<?php

include_once('class.database.php');

class Products{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function ViewProducts($itemPerPage,$page){

		if($page == 1){
			$index = 0;
			$Limit = $itemPerPage;
		}else{
			$index = ($page-1)*10;
			$Limit =  $page*10;
		}


		$query = $this->link->query("SELECT * from product LIMIT ".$index.",".$Limit."");
		$rowCount = $query->rowCount();
		if($rowCount > 0){
			$result = $query->fetchAll();
			return $result;
		}
		else{
			return $rowCount;
		}
	}

	function NewOrder($User_Id,$Quantity,$Product_Id){
		$queryGetProductInfo = $this->link->query("SELECT * from product where Product_Id = ".$Product_Id."");
		$getData = $queryGetProductInfo->fetchAll();
		$Price =  $getData[0]['Price'];
		$Total_Price = $Quantity*$Price;
		if($Quantity > $getData[0]['Quantity']){
			return $rowCount = $queryGetProductInfo->rowCount(); 
		}else{
			$query = $this->link->query("INSERT INTO `order` (`Order_Id`, `User_Id`, `Quantity`, `Total`, `Product_Id`,`Order_Date`) VALUES (NULL, '".$User_Id."', '".$Quantity."', '".$Total_Price."', '".$Product_Id."','".date("Y-m-d H:i:s")."');");
			
		}

		
		
	}

	function DeleteProduct($Product_Id){
		$queryDeleteOrder = $this->link->query("DELETE FROM `order` WHERE Product_Id = '".$Product_Id."'");
		$queryDeleteProduct = $this->link->query("DELETE FROM `product` WHERE Product_Id = '".$Product_Id."'");
		return $rowCount = $queryDeleteProduct->rowCount(); 
		 

		
	}

	function makePayment($User_Id){
		$queryOrders = $this->link->query("SELECT * FROM `order` WHERE User_Id = '".$User_Id."'");
		$rowCount = $queryOrders->rowCount();
		if($rowCount > 0){
			$result = $queryOrders->fetchAll();
			return $result;
		}
	}

	function makePaymentCustomerInfo($Product_Id,$Quantity,$User_Id){
		$queryOrders = $this->link->query("INSERT INTO `customer_product` (`Product_Id`,`Quantity`,`User_Id`,`Customer_Order_Date`) VALUES ('".$Product_Id."','".$Quantity."','".$User_Id."','".date("Y-m-d H:i:s")."');");	
		$rowCount = $queryOrders->rowCount();
		if($rowCount > 0){
			$result = $queryOrders->fetchAll();
			return $result;
		}

	

	}

	function deleteOrder($User_Id){
		$query = $this->link->query("DELETE FROM `order` WHERE User_Id = '".$User_Id."'");
		return $rowCount = $query->rowCount(); 
	}

	function deductQuantity($Product_Id,$Quantity){

		$query = $this->link->query("UPDATE product SET Quantity = ".$Quantity."  WHERE Product_Id=".$Product_Id."");
		return $result = $query->fetchAll();
	}
	function ShowProducts(){
		$query = $this->link->query("SELECT * FROM product");
		return $result = $query->fetchAll();
	}
	
}

/* View Products
$ShowProduct = new Products();
$ShowProduct = $ShowProduct->ViewProducts(10,1);
var_dump($ShowProduct);
*/

// Add new Order

/*
$NewOrder = new Products();
$ProductTitle = 'my title';
$ProductDescription = 'My description';
$ProductId = 50;
$ProductPrice = 22;
$ProductQuantity = 11;
$User_Id = 1;

$NewOrder = $NewOrder->NewOrder(1,1,32);
var_dump($NewOrder);
*/



?>