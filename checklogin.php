<?php 
	require_once 'inc/dbConn.php';
	ob_start();
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user = new User($username,$password,"");
	$db = new dbConn('localhost','db',"user","password");
	$data = $db->checkUser($user);
	$db->closeDb();

	if($data['counter'] == 1){
		session_start();
		 $_SESSION['logged_in'] = TRUE;
        $_SESSION['username'] 	= $data['username'];
        $_SESSION['name'] 	= $data['name'];
       
		header("Location:admin.php");

	}else{
		header("Location:login.php");		
	}
 ?>