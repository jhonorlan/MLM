<?php 
include '../database.php';

$username = $_SESSION['username'];
$number = $_POST['number'];
fetch_members_no_position($username,$number,$connect);
?>