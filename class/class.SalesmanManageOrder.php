<?php
include_once('class.database.php');


class salesmanManageOrder{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}


?>