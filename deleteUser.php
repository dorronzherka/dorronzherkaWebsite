<?php
$id = $_GET['id'];
require_once 'inc/dbConn.php'; 
session_start();
if(isset($_SESSION['username'])){
	$db = new dbConn('localhost','',"","");
	$db->deleteUser($id);
	header("Location:editUsers.php");
}else{
	header("Location:login.php");
}

 ?>