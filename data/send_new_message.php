<?php 
include '../database.php';
$sender = $_POST['from'];
$reciever = $_POST['to'];
$subject = $_POST['subject'];
$message = $_POST['message'];

send_message($sender,$reciever,$subject,$message,$connect);
?>