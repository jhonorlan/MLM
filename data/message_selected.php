<?php 
include '../database.php';

$code = $_POST['code'];
$selected = array();
if($code != ""){
	array_push($selected, $code);
}
if(count($selected) != ""){
	foreach($selected as $user_select){
		echo $user_select;
	}
}
?>