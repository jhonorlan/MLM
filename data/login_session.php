<?php 
include '../database.php';

$username = $_POST['username'];
$password = $_POST['password'];
$errors = array();

if(empty($username)){
	array_push($errors, "Please Enter your Username");
}
if(empty($password)){
	array_push($errors, "Please Enter your Password");
}
if(count($errors) == ""){
	$password = md5($password);
	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	$stmt = $connect->prepare($query);
	$stmt->execute();
	$result = $stmt->fetchall();
	foreach($result as $row){
		if($row['username']){
			session_start();
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id'] = $row['id'];
		if($row['profile_picture']){
			$_SESSION['profile_picture'] = "data:image;base64,".$row['profile_picture'];
		}else{
			$_SESSION['profile_picture'] = get_temporary_profile_picture($username,$connect);
		}
			
			header('Location: admin.php');
			add_to_login_activity($row['username'],$connect);
		}else{
			array_push($errors, "Incorrect Username,Email or Password");
		}
	}
}

errors($errors);
?>