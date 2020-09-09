<?php 
include '../database.php';
$username = $_SESSION['username'];
$title = $_POST['title'];
$note_content = $_POST['note_content'];
$state = $_POST['state'];
if(!empty($title)){
	insert_to_notes($username,$title,$note_content,$state,$connect);
}
?>