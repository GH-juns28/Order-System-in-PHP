<?php
include_once('../class/class.ManageUser.php');
$ManageUser = new ManageUsers();

$firstName = $_GET['First_Name'];
$lastName = $_GET['Last_Name'];
$userName = $_GET['User_Name'];
$password = $_GET['Password'];
$confirmPassword = $_GET['Confirm_Password'];
$email = $_GET['Email'];
$mobileNumber = $_GET['Mobile_Number'];
$address = $_GET['Address'];
$gender = $_GET['Gender'];

$checkUsername = $ManageUser->CheckUsername($email,$password);
if($confirmPassword !== $password){
	$array = array(
		    "output" => "1",
		    "message" => "Invalid Username"
		);
		echo json_encode($array);
		exit();
}



if($checkUsername){
	$array = array(
		    "output" => "1",
		    "message" => "Invalid Username"
		);
		echo json_encode($array);
}else{
	
	$registerParameters = $ManageUser->registerUsers($username,$email,$password,$User_type);
	if($registerParameters){
		var_dump($registerParameters);
	}


}



?>