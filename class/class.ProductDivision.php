<?php
include_once('class.database.php');

class ProductDivision{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function GetCompanyInfo($CompanyId){

		$query = $this->link->query("SELECT * from company_division where Company_Division_Id = '".$CompanyId."'");
		$rowCount = $query->rowCount();
		if($rowCount > 0){
			
			$result = $query->fetchAll();
			return $result;
		}
	}

	function GetallCompany(){
		$query = $this->link->query("SELECT * from company_division ");
		$rowCount = $query->rowCount();
		if($rowCount > 0){
			
			$result = $query->fetchAll();
			return $result;
		}
	}

}

?>