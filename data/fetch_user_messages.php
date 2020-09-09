<?php 
include '../database.php';
$sender = $_POST['sender'];
$reciever = $_POST['reciever'];
if($reciever == $_SESSION['username']){
	echo fetch_user_message($reciever,$sender,$connect);
}else{
	echo fetch_user_message($sender,$reciever,$connect);
}


?>