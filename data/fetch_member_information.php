<?php 
include '../database.php';

$username = $_SESSION['username'];
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
	 	$position = " Right";
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
load_member_information($username,$position,$connect);

?>