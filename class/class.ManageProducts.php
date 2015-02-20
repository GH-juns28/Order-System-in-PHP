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
}

/*
$ManageProducts = new ManageProducts();
$ManageProducts->ShowProducts();
var_dump($ManageProducts);
*/

?>