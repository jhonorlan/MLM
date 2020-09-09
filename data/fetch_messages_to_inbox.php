<?php 
include '../database.php';
$username = $_SESSION['username'];
$select = "timestamp";
fetch_messages_to_inbox($username,$connect);

?>