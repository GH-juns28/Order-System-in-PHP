<?php
include_once('../class/class.ManageUser.php');
$ManageUser = new ManageUsers();

$firstName = $_GET['First_Name'];
$lastName = $_GET['Last_Name'];
$username = $_GET['User_Name'];
$password = $_GET['Password'];
$confirmPassword = $_GET['Confirm_Password'];
$email = $_GET['Email'];
$mobileNumber = $_GET['Mobile_Number'];
$address = $_GET['Address'];
$gender = $_GET['Gender'];

$checkUsername = $ManageUser->CheckUsername($username);
if($confirmPassword !== $password){
	$array = array(
		    "output" => "1",
		    "message" => "Password did not match"
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
	
	
	$registerParameters = $ManageUser->registerUsers($username,$email,$password,1);
	
	$check = $ManageUser->CheckUserInfo($email,$password);
	
	$userInfo = $ManageUser->Userinfo($firstName,$lastName,$check[0]['User_Id'],$address,$mobileNumber,$gender);
	$array = array(
		    "output" => "0",
		    "message" => "Registered Successfully"
		);
		echo json_encode($array);
		

}



?>