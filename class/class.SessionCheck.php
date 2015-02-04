<?php
include_once('class.database.php');
session_start();
class SessionCheck{
	public $link;

	function __construct(){
		$db_connection = new dbConnection();
		$this->link = $db_connection->connect();
		return $this->link;
	}

	function checkSession($session){
		if($session){
			
		}else{
			header('Location: login.php');
		}
	}

	function loginSessionCheck($session){
		if($session){
			header('Location: index.php');
		}
		
	}

	function logoutSession(){
		session_destroy();
		header('Location: login.php');
	}

}
?>