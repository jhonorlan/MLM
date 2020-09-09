<?php 
include '../database.php';
$username = $_POST['search'];
$where = $_POST['where'];
search_in_database($username,$where,$connect);

?>