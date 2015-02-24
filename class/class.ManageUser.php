<?php
include_once('class.database.php');

class ManageUsers{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function registerUsers($username,$email,$password,$User_type){

		$query = $this->link->prepare("INSERT INTO users (username,email,password,User_type) VALUES (?,?,?,?)");
		$values = array($username,$email,$password,$User_type);
		$query->execute($values);
		$rowCount = $query->rowCount();
		return $rowCount;
	

		
	}

	function Userinfo($firstName,$lastName,$user_id,$address,$mobileNumber,$gender){

		$queryInsertUserinfo = $this->link->prepare("INSERT INTO user_info (First_Name,Last_Name,User_id,Address,Contact_Number,Gender_Type) VALUES (?,?,?,?,?,?)");
		$InsertUsefinoValues = array($firstName,$lastName,$user_id,$address,$mobileNumber,$gender);
		$queryInsertUserinfo->execute($InsertUsefinoValues);
		$counts = $queryInsertUserinfo->rowCount();
		return $counts;

	}

	

	function CheckUsername($username){
		$query = $this->link->query("SELECT * from `users` where username = '".$username."'");
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

	function CheckUserType($User_Id){
		
		$query = $this->link->query("SELECT `User_type` from users where User_id = '".$User_Id."'");
		$rowCount = $query->rowCount();
		if($rowCount > 0){
			$result = $query->fetchAll();
			return $result;
		}
		else{
			return $rowCount;
		}

	}

	function CheckIfSalesman($user_type){
		if($user_type == 1){
			header('Location: index.php');
		}
			
		
	}

	function CheckIfCustomer(){

	}
	
}

/*
$ManageUsers = new ManageUsers();
$username = 'a';
$email = 'a@a.com';
$password = 'a';
$User_type = 1;
$ManageUsers->registerUsers($username,$email,$password,$User_type);
var_dump($ManageUsers);
*/

?>