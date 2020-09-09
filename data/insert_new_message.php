<?php 
include '../database.php';

$sender = $_SESSION['username'];
$reciever = $_POST['reciever'];
$message = $_POST['message'];
$subject = "Message";
if(!empty($message)){
	send_message($sender,$reciever,$subject,$message,$connect);
}
?>