<?php 
include '../database.php';

$username = $_SESSION['username'];
$select = $_POST['select'];
select_messages($select,$username,$connect);
?>