<?php
session_start();
if(!empty($_SESSION['logged_in'])){ 

	require_once 'inc/dbConn.php';
	$id = $_GET['id'];
	$db = new dbConn('localhost','db',"user","password");
	$db->delete($id);
	$db->closeDb();
	header("Location:editPost.php");

 }else{
	header("Location:login.php");
} ?>