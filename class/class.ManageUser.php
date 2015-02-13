<?php
include_once('class.database.php');

class ManageUsers{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function registerUsers($username,$password,$firstname,$lastname,$email){

		$query = $this->link->prepare("INSERT INTO users (username,password,firstname,lastname,email) VALUES (?,?,?,?,?)");
		$values = array($username,$password,$firstname,$lastname,$email);
		$query->execute($values);
		$counts = $query->rowCount();
		return $counts;
	}

	function CheckUsername($username){
		$query = $this->link->query("SELECT * from users where username = '".$username."'");
		$rowCount = $query->rowCount();
		return $rowCount;

	}


	function LoginUser($email,$password){
		$query = $this->link->query("SELECT * from users where email = '".$email."' AND password = '".$password."'");
		$rowCount = $query->rowCount();
		if($rowCount > 0){
			$result = $query->fetchAll();
			return $result;
		}	
	}

	function CheckUserInfo($email,$password){
		$query = $this->link->query("SELECT * from users where email = '".$email."' AND password = '".$password."'");
		$rowCount = $query->rowCount();
		if($rowCount > 0){
			$result = $query->fetchAll();
			return $result;
		}
		else{
			return $rowCount;
		}
	}

	
}

?>