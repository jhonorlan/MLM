<?php 
include '../database.php';

$username = $_POST['username'];
$number = $_POST['number'];
$position = "";
if($number == 2){
		 $position = " Left";
	}else if($number == 1){
		$position = " Admin";
	}else if($number == 3){
	 	$position = " Right";
	}else if($number == 4){
	 	$position = " Left";
	}else if($number == 5){
	 	$position = " Left";
	}else if($number == 6){
	 	$position = " Right";
	}else if($number == 7){
	 	$position = " hw_Root()ight";
	}else if($number == 8){
	 	$position = " Left";
	}else if($number == 9){
	 	$position = " Left";
	}else if($number == 10){
	 	$position = " Right";
	}else if($number == 11){
	 	$position = " Right";
	}
	$position =  $number.$position;
remove_member_position($username,$position,$connect);
?>