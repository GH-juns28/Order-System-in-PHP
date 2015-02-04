<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
session_start();
include_once('../class/class.ManageUser.php');
header('Content-Type: application/json');
$users = new ManageUsers();

$email = $_GET['email'];
$password = $_GET['password'];

$checkLogin = $users->LoginUser($email,$password);

if(empty($email) || empty($password)){
		$array = array(
		    "output" => "All fields are required"
		);
		echo json_encode($array);
}else{
	if($checkLogin == 1){
	$array = array(
		    "output" => "1"
		);
		echo json_encode($array);
		$_SESSION['email'] = $email;
		$_SESSION['password'] = $password;


}else{
	$array = array(
		    "output" => "Invalid Password"
		);
		echo json_encode($array);
}
}


?>