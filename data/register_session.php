<?php 
include '../database.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password= $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$errors = array();

if(empty($username)){
	array_push($errors, "Please Enter your Username");
}
if(empty($email)){
	array_push($errors, "Please Enter your Email");
}
if(empty($password)){
	array_push($errors, "Please Enter your Password");
}
if($confirm_password != $password){
	array_push($errors, "Password did'nt Matched");
}
check_if_user_exist($username,$connect);
if(count($errors) == ""){
	$password = md5($password);
	$query = "INSERT INTO user(username,email,password)VALUES('$username','$email','$password')";
	$stmt = $connect->prepare($query);
	$stmt->execute();
}
set_temporary_profile_picture($username,$connect);
errors($errors);

?>