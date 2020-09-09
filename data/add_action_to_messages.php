<?php 
include '../database.php';

$action = $_POST['action'];
if(isset($_POST['id'])){
	$id = $_POST['id'];
	add_action_messages($action,$id,$connect);
}else{
	$selected = $_POST['selected'];
	foreach($selected as $id){
		add_action_messages($action,$id,$connect);
	}
}

?>