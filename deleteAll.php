<?php 
session_start();
if(!empty($_SESSION['logged_in'])){ 
	require_once 'inc/dbConn.php';
	$db = new dbConn('localhost','',"","");
	$db->deleteAll();
	$db->closeDb();
	header("Location:editPost.php");
	
}else{
	header("Location:login.php");
}
?>