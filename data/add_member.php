<?php 
include '../database.php';
$username = $_POST['username'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$gender = $_POST['gender'];

add_member($username,$email,$mobile,$password,$confirm_password,$gender,$connect);

?>